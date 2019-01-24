<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers\QuickSearch;

use PoLaKoSz\PortHu\Models\QuickSearchResult;
use PoLaKoSz\PortHu\Tests\Integration\Deserializers\QuickSearchDeserializerBase;

class RampageTest extends QuickSearchDeserializerBase
{
    public function __construct() {
        $id             = 188865;
        $url            = 'https://port.hu/adatlap/film/mozi/rampage-tombolas-rampage/movie-188865';
        $hungarianTitle = 'Rampage - Tombolás';
        $hasYear        = true;
        $year           = 2018;
        $poster         = 'https://media.port.hu/images/000/984/100x100/737.jpg';

        $actionMovie = new QuickSearchResult( $id, $url, $hungarianTitle, $hasYear, $year, $poster );

        $id             = 94708;
        $url            = 'https://port.hu/adatlap/film/tv/orszaguti-tombolas-motoros-mutatvanyok-road-rage-moto-stunt-riding/movie-94708';
        $hungarianTitle = 'Országúti tombolás: Motoros mutatványok';
        $hasYear        = true;
        $year           = 2006;
        $poster         = '';

        $noName = new QuickSearchResult( $id, $url, $hungarianTitle, $hasYear, $year, $poster );

        $id             = 193302;
        $url            = 'https://port.hu/adatlap/film/tv/szuperhurrikanok-harvey-es-irma-tombolasa-super-hurricanes-inside-monster-storms/movie-193302';
        $hungarianTitle = 'Szuperhurrikánok - Harvey és Irma tombolása';
        $hasYear        = false;
        $year           = -1;
        $poster         = '';

        $docMovie1 = new QuickSearchResult( $id, $url, $hungarianTitle, $hasYear, $year, $poster );

        $id             = 82088;
        $url            = 'https://port.hu/adatlap/film/tv/tuleltek-az-elemek-tombolasat-surviving-extreme-weather/movie-82088';
        $hungarianTitle = 'Túlélték az elemek tombolását';
        $hasYear        = true;
        $year           = 2015;
        $poster         = 'https://media.port.hu/images/000/829/100x100/963.jpg';

        $docMovie2 = new QuickSearchResult( $id, $url, $hungarianTitle, $hasYear, $year, $poster );

        $modelCollection = [
            $actionMovie,
            $noName,
            $docMovie1,
            $docMovie2
        ];

        parent::__construct( 'rampage', $modelCollection );
    }
}
