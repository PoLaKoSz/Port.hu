<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Models\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

class CompleteModel extends PortMovie
{
    public function __construct()
    {
        $id             = 104833;
        $url            = 'https://port.hu/adatlap/film/tv/-/movie-104833';
        $imdbURL        = 'http://www.imdb.com/title/tt0499549/';
        $hungarianTitle = 'Avatar';
        $originalTitle  = 'Avatar';
        $hasYear        = true;
        $year           = 2009;
        $poster         = 'https://media.port.hu/images/000/523/350x510/107.jpg';
        
        parent::__construct($id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster);
    }
}
