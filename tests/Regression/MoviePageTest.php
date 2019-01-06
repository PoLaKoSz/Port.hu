<?php

namespace PoLaKoSz\PortHu\Tests\Regression;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\Models\PortMovie;
use PoLaKoSz\PortHu\MoviePage;

class MoviePageTest extends TestCase
{
    private $result;



    public function __construct() {
        $page = new MoviePage();
        $this->result = $page->get( 202073 );
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf( PortMovie::class, $this->result );
    }
    
    public function testCanExtractMovieId()
    {
        $this->assertEquals( 202073, $this->result->getID() );
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertEquals( 'https://port.hu/adatlap/film/tv/-/movie-202073', $this->result->getURL() );
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertEquals( 'A kém, aki dobott engem',  $this->result->getHungarianTitle() );
    }

    public function testCanExtractMovieYear()
    {
        $this->assertEquals( 2018, $this->result->getYear() );
    }

    public function testCanExtractMoviePoster()
    {
        $this->assertEquals( 'https://media.port.hu/images/001/074/350x510/093.jpg', $this->result->getPoster() );
    }
}
