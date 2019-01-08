<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\Deserializers\MoviePageDeserializer;
use PoLaKoSz\PortHu\Models\PortMovie;

abstract class MoviePageDeserializerBase extends TestCase
{
    private $actualModel;
    private $expectedModel;



    public function __construct( string $resourceName, PortMovie $model ) {
        $class = new MoviePageDeserializer();

        $html = $this->loadStaticFile( $resourceName );
        $this->actualModel = $class->convert( $model->getID(), $html );

        $this->expectedModel = $model;
    }



    public function testReturnValidObjectType() {
        $this->assertInstanceOf( PortMovie::class, $this->actualModel );
    }

    public function testCanExtractMovieId() {
        $this->assertEquals( $this->expectedModel->getID(), $this->actualModel->getID() );
    }

    public function testCanExtractMovieUrl() {
        $this->assertEquals( $this->expectedModel->getURL(), $this->actualModel->getURL() );
    }

    public function testCanExtractMovieImdbUrl() {
        $this->assertEquals( $this->expectedModel->getIMDbURL(), $this->actualModel->getIMDbURL() );
    }

    public function testCanExtractMovieHungarianTitle() {
        $this->assertEquals( $this->expectedModel->getHungarianTitle(), $this->actualModel->getHungarianTitle() );
    }

    public function testCanExtractMovieOriginalTitle() {
        $this->assertEquals( $this->expectedModel->getOriginalTitle(), $this->actualModel->getOriginalTitle() );
    }

    public function testHasYear() {
        $this->assertEquals( $this->expectedModel->hasYear(), $this->actualModel->hasYear() );
    }

    public function testCanExtractMovieYear() {
        $this->assertEquals( $this->expectedModel->getYear(), $this->actualModel->getYear() );
    }

    public function testCanExtractMoviePoster() {        
        $this->assertEquals( $this->expectedModel->getPoster(), $this->actualModel->getPoster() );
    }


    /**
     * @param   $fileName   File name withouth .html extension
     * 
     * @return  string      File content
     */
    private function loadStaticFile(string $fileName) : string {        
        $filePath = 'tests/Integration/StaticResources/' . $fileName . '.html';

        $file = fopen( $filePath, "r");
        $fileContent = fread( $file, filesize( $filePath ));
        fclose( $file );

        return $fileContent;
    }
}
