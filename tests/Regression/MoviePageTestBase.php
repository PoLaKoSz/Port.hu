<?php

namespace PoLaKoSz\PortHu\Tests\Regression;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\Models\PortMovie;
use PoLaKoSz\PortHu\MoviePage;

abstract class MoviePageTestBase extends TestCase
{
    private $expected;
    private $result;



    public function __construct(PortMovie $expected)
    {
        $page           = new MoviePage();
        $this->expected = $expected;
        $this->result   = $page->get($expected->getID());
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf(PortMovie::class, $this->result);
    }
    
    public function testCanExtractMovieId()
    {
        $this->assertEquals($this->expected->getID(), $this->result->getID());
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertEquals($this->expected->getURL(), $this->result->getURL());
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertEquals($this->expected->getHungarianTitle(), $this->result->getHungarianTitle());
    }

    public function testHasYear()
    {
        $this->assertEquals($this->expected->hasYear(), $this->result->hasYear());
    }

    public function testCanExtractMovieYear()
    {
        $this->assertEquals($this->expected->getYear(), $this->result->getYear());
    }

    public function testCanExtractMoviePoster()
    {
        $this->assertEquals($this->expected->getPoster(), $this->result->getPoster());
    }
}
