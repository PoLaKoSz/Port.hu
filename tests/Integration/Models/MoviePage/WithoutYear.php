<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

class WithoutYear extends PortMovie
{
    public function __construct()
    {
        $id             = 176672;
        $url            = 'https://port.hu/adatlap/film/tv/-/movie-176672';
        $imdbURL        = 'http://www.imdb.com/title/tt5595168/';
        $hungarianTitle = 'Kingsglaive: Final Fantasy XV';
        $originalTitle  = 'Kingsglaive: Final Fantasy XV';
        $hasYear        = false;
        $year           = -1;
        $poster         = '';
        
        parent::__construct($id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster);
    }
}
