<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Parsers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\WithoutPoster;
use PoLaKoSz\PortHu\Tests\Integration\Parsers\MoviePageParserBase;

class WithoutPosterTest extends MoviePageParserBase
{
    public function __construct()
    {        
        $expectedModel = new WithoutPoster();
        
        parent::__construct('visko', $expectedModel);
    }
}
