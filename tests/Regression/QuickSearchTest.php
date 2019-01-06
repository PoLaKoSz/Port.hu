<?php

namespace PoLaKoSz\PortHu\Tests\Regression;

use PHPUnit\Framework\TestCase;

use PoLaKoSz\PortHu\QuickSearch;

class QuickSearchTest extends TestCase
{
    private $search;



    public function __construct() {
        $this->search = new QuickSearch();
    }



    public function testSearchForTheSpyWhoDumpedMeShouldReturnResults()
    {
        $results = $this->search->get('A kém, aki dobott engem');

        $this->assertGreaterThan(0, count( $results ) );
    }
}
