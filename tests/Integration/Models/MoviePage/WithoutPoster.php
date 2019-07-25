<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

class WithoutPoster extends PortMovie
{
    public function __construct()
    {
        $id             = 184111;
        $url            = 'https://port.hu/adatlap/film/tv/-/movie-184111';
        $imdbURL        = 'http://www.imdb.com/title/tt2872518/';
        $hungarianTitle = 'A viskó';
        $originalTitle  = 'The Shack';
        $hasYear        = true;
        $year           = 2017;
        $poster         = '';
        
        parent::__construct($id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster);
    }
}
