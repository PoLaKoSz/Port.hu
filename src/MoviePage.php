<?php

namespace PoLaKoSz\PortHu;

use PoLaKoSz\PortHu\Deserializers\MoviePageDeserializer;
use PoLaKoSz\PortHu\Models\PortMovie;

class MoviePage extends EndPoint
{
    public function __construct()
    {
        parent::__construct(MoviePageDeserializer::ENDPOINT_URL);
    }



    /**
     * Get movie details for the given movie ID.
     *
     * @return  PortMovie
     */
    public function get(int $movieID) : PortMovie
    {
        $result = parent::callAPI($movieID);

        return MoviePageDeserializer::convert($movieID, $result);
    }
}
