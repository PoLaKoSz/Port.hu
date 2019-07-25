<?php

namespace PoLaKoSz\PortHu\Tests\Regression\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\CompleteModel;
use PoLaKoSz\PortHu\Tests\Regression\MoviePageTestBase;

class CompleteTest extends MoviePageTestBase
{
    public function __construct()
    {
        $expectedModel = new CompleteModel();

        parent::__construct($expectedModel);
    }
}
