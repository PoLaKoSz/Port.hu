<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\Deserializers\QuickSearchDeserializer;
use PoLaKoSz\PortHu\Models\QuickSearchResult;

class QuickSearchDeserializerTest extends TestCase
{
    private $results;



    public function __construct() {
        $json          = $this->loadStaticFile( 'quicksearch' );

        $class         = new QuickSearchDeserializer();
        $this->results = $class->convert( $json );
    }



    public function testReturnValidObjectType() {
        $this->assertInstanceOf( QuickSearchResult::class, $this->results[0] );
    }
    
    public function testCanExtractMovieId() {
        $this->assertEquals( 202073, $this->results[0]->getID() );
    }

    public function testCanExtractMovieUrl() {
        $this->assertEquals(
            'https://port.hu/adatlap/film/mozi/a-kem-aki-dobott-engem-the-spy-who-dumped-me/movie-202073',
            $this->results[0]->getURL() );
    }

    public function testCanExtractMovieHungarianTitle() {
        $this->assertEquals( 'A kém, aki dobott engem',  $this->results[0]->getHungarianTitle() );
    }

    public function testCanExtractMovieYear() {
        $this->assertEquals( 2018, $this->results[0]->getYear() );
    }

    public function testCanExtractMoviePoster() {
        $this->assertEquals( 'https://media.port.hu/images/001/069/100x100/705.jpg', $this->results[0]->getPoster() );
    }


    /**
     * @param   $fileName   File name withouth .html extension
     * 
     * @return  string      File content
     */
    private function loadStaticFile( string $fileName ) : string {        
        $filePath    = 'tests/integration/StaticResources/' . $fileName . '.html';

        $file        = fopen( $filePath, "r");
        $fileContent = fread( $file, filesize( $filePath ) );
        fclose( $file );

        return $fileContent;
    }
}
