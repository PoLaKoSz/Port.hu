<?php

namespace PoLaKoSz\PortHu\Tests\Regression\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\WithoutYear;
use PoLaKoSz\PortHu\Tests\Regression\MoviePageTestBase;

class WithoutYearTest extends MoviePageTestBase
{
    public function __construct()
    {
        $expectedModel = new WithoutYear();
        
        parent::__construct($expectedModel);
    }
}
