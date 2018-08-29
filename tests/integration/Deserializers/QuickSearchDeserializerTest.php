<?php

namespace PoLaKoSz\PortHu\Tests\Deserializers;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\Deserializers\QuickSearchDeserializer;
use PoLaKoSz\PortHu\Models\PortMovie;

class QuickSearchDeserializerTest extends TestCase
{
    private $results;



    public function __construct() {
        $json = $this->loadStaticFile( 'quicksearch' );

        $class = new QuickSearchDeserializer();
        $this->results = $class->convert( $json );
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf( PortMovie::class, $this->results[0] );
        $this->assertInstanceOf( PortMovie::class, $this->results[1] );
        $this->assertInstanceOf( PortMovie::class, $this->results[2] );
    }
    
    public function testCanExtractMovieId()
    {
        $this->assertEquals( 202073, $this->results[0]->getID(),      "A kém, aki dobott engem ID does not match!" );
        $this->assertEquals( 194376, $this->results[1]->getID(), "Mamma Mia! Sose hagyjuk abba ID does not match!" );
        $this->assertEquals( 179655, $this->results[2]->getID(),               "A Védelmező 2. ID does not match!" );
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertEquals( 'https://port.hu/adatlap/film/mozi/a-kem-aki-dobott-engem-the-spy-who-dumped-me/movie-202073',           $this->results[0]->getURL(),      "A kém, aki dobott engem URL does not match!" );
        $this->assertEquals( 'https://port.hu/adatlap/film/mozi/mamma-mia-sose-hagyjuk-abba-mamma-mia-here-we-go-again/movie-194376', $this->results[1]->getURL(), "Mamma Mia! Sose hagyjuk abba URL does not match!" );
        $this->assertEquals( 'https://port.hu/adatlap/film/mozi/a-vedelmezo-2-the-equalizer-2/movie-179655',                          $this->results[2]->getURL(),               "A Védelmező 2. URL does not match!" );
    }

    public function testCanExtractMovieImdbUrl()
    {
        $this->assertEquals( '', $this->results[0]->getIMDbURL(),      "A kém, aki dobott engem IMDb URL does not match!" );
        $this->assertEquals( '', $this->results[1]->getIMDbURL(), "Mamma Mia! Sose hagyjuk abba IMDb URL does not match!" );
        $this->assertEquals( '', $this->results[2]->getIMDbURL(),               "A Védelmező 2. IMDb URL does not match!" );
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertEquals( 'A kém, aki dobott engem',      $this->results[0]->getHungarianTitle(),      "A kém, aki dobott engem HungarianTitle does not match!" );
        $this->assertEquals( 'Mamma Mia! Sose hagyjuk abba', $this->results[1]->getHungarianTitle(), "Mamma Mia! Sose hagyjuk abba HungarianTitle does not match!" );
        $this->assertEquals( 'A Védelmező 2.',               $this->results[2]->getHungarianTitle(),               "A Védelmező 2. HungarianTitle does not match!" );
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $this->assertEquals( '', $this->results[0]->getOriginalTitle(),      "A kém, aki dobott engem OriginalTitle does not match!" );
        $this->assertEquals( '', $this->results[1]->getOriginalTitle(), "Mamma Mia! Sose hagyjuk abba OriginalTitle does not match!" );
        $this->assertEquals( '', $this->results[2]->getOriginalTitle(),               "A Védelmező 2. OriginalTitle does not match!" );
    }

    public function testCanExtractMovieYear()
    {
        $this->assertEquals( 2018, $this->results[0]->getYear(),      "A kém, aki dobott engem Year does not match!" );
        $this->assertEquals( 2018, $this->results[1]->getYear(), "Mamma Mia! Sose hagyjuk abba Year does not match!" );
        $this->assertEquals( 2018, $this->results[2]->getYear(),               "A Védelmező 2. Year does not match!" );
    }

    public function testCanExtractMoviePoster()
    {
        $this->assertEquals( 'https://media.port.hu/images/001/069/100x100/705.jpg', $this->results[0]->getPoster(),      "A kém, aki dobott engem Poster does not match!" );
        $this->assertEquals( 'https://media.port.hu/images/001/066/100x100/118.jpg', $this->results[1]->getPoster(), "Mamma Mia! Sose hagyjuk abba Poster does not match!" );
        $this->assertEquals( 'https://media.port.hu/images/001/070/100x100/525.jpg', $this->results[2]->getPoster(),               "A Védelmező 2. Poster does not match!" );
    }


    /**
     * @param   $fileName   File name withouth .html extension
     * 
     * @return  string      File content
     */
    private function loadStaticFile(string $fileName) : string {        
        $filePath = 'tests/integration/StaticResources/' . $fileName . '.html';

        $file = fopen( $filePath, "r");
        $fileContent = fread( $file, filesize( $filePath ));
        fclose( $file );

        return $fileContent;
    }
}
