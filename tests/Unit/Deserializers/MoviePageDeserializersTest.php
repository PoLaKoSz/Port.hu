<?php

namespace PoLaKoSz\PortHu\Tests\Unit\Deserializers;

use PoLaKoSz\PortHu\Deserializers\MoviePageDeserializer;

use PHPUnit\Framework\TestCase;

class MoviePageDeserializersTest extends TestCase
{
    public function testBaseUrl()
    {
        $this->assertEquals('https://port.hu/', MoviePageDeserializer::BASE_URL);
    }

    public function testEndpointUrl()
    {
        $this->assertEquals('adatlap/film/tv/-/movie-', MoviePageDeserializer::ENDPOINT_URL);
    }
}
