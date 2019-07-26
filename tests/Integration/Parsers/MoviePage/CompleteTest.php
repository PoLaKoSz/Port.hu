<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Parsers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage\CompleteModel;
use PoLaKoSz\PortHu\Tests\Integration\Parsers\MoviePageParserBase;

class CompleteTest extends MoviePageParserBase
{
    public function __construct()
    {
        $expectedModel = new CompleteModel();
        
        parent::__construct('avatar', $expectedModel);
    }
}
