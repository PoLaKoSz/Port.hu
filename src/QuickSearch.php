<?php

namespace PoLaKoSz\PortHu;

use PoLaKoSz\PortHu\Parsers\QuickSearchParser;
use PoLaKoSz\PortHu\Models\PortMovie;

class QuickSearch extends EndPoint
{
    private $parser;
    private const ENDPOINT_URL = 'search/suggest-list';



    public function __construct()
    {
        $this->parser = new QuickSearchParser();

        parent::__construct(QuickSearch::ENDPOINT_URL);
    }



    /**
     * Make a quick search with the given term.
     *
     * @return  Array   of QuickSearchResult
     */
    public function get(string $query) : array
    {
        $apiResult = parent::callAPI('?q=' . urlencode($query));

        return $this->parser->convert($apiResult);
    }
}
