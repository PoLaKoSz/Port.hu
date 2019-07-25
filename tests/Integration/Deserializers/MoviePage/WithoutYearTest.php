<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\WithoutYear;
use PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePageDeserializerBase;

class WithoutYearTest extends MoviePageDeserializerBase
{
    public function __construct()
    {
        $expectedModel = new WithoutYear();
        
        parent::__construct('kingsglaive_15', $expectedModel);
    }
}
