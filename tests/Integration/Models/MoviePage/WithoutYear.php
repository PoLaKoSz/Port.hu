<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

class WithoutYear extends PortMovie
{
    public function __construct()
    {
        $id             = 219232;
        $url            = 'https://port.hu/adatlap/film/tv/-/movie-219232';
        $imdbURL        = 'http://www.imdb.com/title/tt3979300/';
        $hungarianTitle = 'Magic Camp';
        $originalTitle  = 'Magic Camp';
        $hasYear        = false;
        $year           = -1;
        $poster         = '';

        parent::__construct($id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster);
    }
}
