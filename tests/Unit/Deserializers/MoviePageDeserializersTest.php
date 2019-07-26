<?php

namespace PoLaKoSz\PortHu\Tests\Unit\Parsers;

use PoLaKoSz\PortHu\Parsers\MoviePageParser;

use PHPUnit\Framework\TestCase;

class MoviePageParsersTest extends TestCase
{
    public function testBaseUrl()
    {
        $this->assertEquals('https://port.hu/', MoviePageParser::BASE_URL);
    }

    public function testEndpointUrl()
    {
        $this->assertEquals('adatlap/film/tv/-/movie-', MoviePageParser::ENDPOINT_URL);
    }
}
