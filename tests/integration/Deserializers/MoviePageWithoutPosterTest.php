<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePageDeserializerBase;

class MoviePageWithoutPosterTest extends MoviePageDeserializerBase
{
    public function __construct() {
        $id = 184111;
        $url = 'https://port.hu/adatlap/film/tv/-/movie-184111';
        $imdbURL = 'http://www.imdb.com/title/tt2872518/';
        $hungarianTitle = 'A viskó';
        $originalTitle = 'The Shack';
        $hasYear        = true;
        $year = 2017;
        $poster = '';
        
        $model = new PortMovie( $id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster );
        parent::__construct( 'visko', $model );
    }
}
