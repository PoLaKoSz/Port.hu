<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\CompleteModel;
use PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePageDeserializerBase;

class CompleteTest extends MoviePageDeserializerBase
{
    public function __construct()
    {
        $expectedModel = new CompleteModel();
        
        parent::__construct('avatar', $expectedModel);
    }
}
