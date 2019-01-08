<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers;

use PoLaKoSz\PortHu\Models\PortMovie;

use PoLaKoSz\PortHu\Tests\Integration\Deserializers\MoviePageDeserializerBase;

class CompleteMoviePageTest extends MoviePageDeserializerBase
{
    public function __construct() {
        $id             = 104833;
        $url            = 'https://port.hu/adatlap/film/tv/-/movie-104833';
        $imdbURL        = 'http://www.imdb.com/title/tt0499549/';
        $hungarianTitle = 'Avatar';
        $originalTitle  = 'Avatar';
        $hasYear        = true;     
        $year           = 2009;
        $poster         = 'https://media.port.hu/images/000/523/350x510/107.jpg';

        $model = new PortMovie( $id, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster );
        parent::__construct( 'avatar', $model );
    }
}
