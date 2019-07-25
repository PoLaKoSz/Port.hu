<?php

namespace PoLaKoSz\PortHu\Tests\Regression\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\WithoutPoster;
use PoLaKoSz\PortHu\Tests\Regression\MoviePageTestBase;

class WithoutPosterTest extends MoviePageTestBase
{
    public function __construct()
    {
        $expectedModel = new WithoutPoster();
        
        parent::__construct($expectedModel);
    }
}
