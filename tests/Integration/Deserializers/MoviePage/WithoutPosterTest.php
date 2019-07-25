<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\WithoutPoster;
use PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePageDeserializerBase;

class WithoutPosterTest extends MoviePageDeserializerBase
{
    public function __construct()
    {        
        $expectedModel = new WithoutPoster();
        
        parent::__construct('visko', $expectedModel);
    }
}
