<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Parsers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\WithoutYear;
use PoLaKoSz\PortHu\Tests\Integration\Parsers\MoviePageParserBase;

class WithoutYearTest extends MoviePageParserBase
{
    public function __construct()
    {
        $expectedModel = new WithoutYear();
        
        parent::__construct('kingsglaive_15', $expectedModel);
    }
}
