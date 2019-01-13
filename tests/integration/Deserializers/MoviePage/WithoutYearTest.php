<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePage;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePageDeserializerBase;

class WithoutYearTest extends MoviePageDeserializerBase
{
    public function __construct() {
        $id             = 176672;
        $url            = 'https://port.hu/adatlap/film/tv/-/movie-176672';
        $imdbURL        = 'http://www.imdb.com/title/tt5595168/';
        $hungarianTitle = 'Kingsglaive: Final Fantasy XV';
        $originalTitle  = 'Kingsglaive: Final Fantasy XV';
        $hasYear        = false;
        $year           = -1;
        $poster         = '';

        $model = new PortMovie( $id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster );
        parent::__construct( 'kingsglaive_15', $model );
    }
}
