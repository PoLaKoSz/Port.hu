<?php

namespace PoLaKoSz\PortHu;

use PoLaKoSz\PortHu\Parsers\MoviePageParser;
use PoLaKoSz\PortHu\Models\PortMovie;

class MoviePage extends EndPoint
{
    private $parser;



    public function __construct()
    {
        $this->parser = new MoviePageParser();
        
        parent::__construct(MoviePageParser::ENDPOINT_URL);
    }



    /**
     * Get movie details for the given movie ID.
     *
     * @return  PortMovie
     */
    public function get(int $movieID) : PortMovie
    {
        $result = parent::callAPI($movieID);

        return $this->parser->convert($movieID, $result);
    }
}
