<?php

namespace PoLaKoSz\PortHu\Tests\Deserializers;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\Deserializers\MoviePageDeserializer;
use PoLaKoSz\PortHu\Models\PortMovie;

class MoviePageDeserializerTest extends TestCase
{
    private $avatarMovie;
    private $viskoMovie;



    public function __construct() {
        $class = new MoviePageDeserializer();

        $html = $this->loadStaticFile( 'avatar' );
        $this->avatarMovie = $class->convert( 104833, $html );

        $html = $this->loadStaticFile( 'visko' );
        $this->viskoMovie = $class->convert( 184111, $html );
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf( PortMovie::class, $this->avatarMovie );
        $this->assertInstanceOf( PortMovie::class, $this->viskoMovie );
    }

    public function testCanExtractMovieId()
    {
        $this->assertEquals( 104833, $this->avatarMovie->getID(), "Avatar ID does not match!" );
        $this->assertEquals( 184111, $this->viskoMovie->getID(),   "Viskó ID does not match!" );
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertEquals( 'https://port.hu/adatlap/film/tv/-/movie-104833', $this->avatarMovie->getURL(), "Avatar URL does not match!" );
        $this->assertEquals( 'https://port.hu/adatlap/film/tv/-/movie-184111', $this->viskoMovie->getURL(),   "Viskó URL does not match!" );
    }

    public function testCanExtractMovieImdbUrl()
    {
        $this->assertEquals( 'http://www.imdb.com/title/tt0499549/', $this->avatarMovie->getIMDbURL(), "Avatar IMDb URL does not match!" );
        $this->assertEquals( 'http://www.imdb.com/title/tt2872518/', $this->viskoMovie->getIMDbURL(),   "Viskó IMDb URL does not match!" );
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertEquals( 'Avatar',  $this->avatarMovie->getHungarianTitle(), "Avatar HungarianTitle does not match!" );
        $this->assertEquals( 'A viskó', $this->viskoMovie->getHungarianTitle(),   "Viskó HungarianTitle does not match!" );
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $this->assertEquals( 'Avatar',    $this->avatarMovie->getOriginalTitle(),  "Avatar OriginalTitle does not match!" );
        $this->assertEquals( 'The Shack', $this->viskoMovie->getOriginalTitle(),    "Viskó OriginalTitle does not match!" );
    }

    public function testCanExtractMovieYear()
    {
        $this->assertEquals( 2009, $this->avatarMovie->getYear(), "PortMovie Year does not match!" );
        $this->assertEquals( 2017, $this->viskoMovie->getYear(), "PortMovie Year does not match!" );
    }

    public function testCanExtractMoviePoster()
    {        
        $this->assertEquals( 'https://media.port.hu/images/000/523/350x510/107.jpg', $this->avatarMovie->getPoster(), "Avatar ThumbnailImage does not match!" );
        $this->assertEquals( '', $this->viskoMovie->getPoster(), "Viskó ThumbnailImage does not match!" );
    }

    public function testMovieWithoutPoster()
    {
        $this->assertFalse( $this->viskoMovie->hasPoster() );
        $this->assertEquals( '', $this->viskoMovie->getPoster() );
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