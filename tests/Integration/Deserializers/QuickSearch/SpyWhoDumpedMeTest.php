<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers\QuickSearch;

use PoLaKoSz\PortHu\Models\QuickSearchResult;
use PoLaKoSz\PortHu\Tests\Integration\Deserializers\QuickSearchDeserializerBase;

class SpyWhoDumpedMeTest extends QuickSearchDeserializerBase
{
    public function __construct()
    {
        $id             = 202073;
        $url            = 'https://port.hu/adatlap/film/mozi/a-kem-aki-dobott-engem-the-spy-who-dumped-me/movie-202073';
        $hungarianTitle = 'A kém, aki dobott engem';
        $hasYear        = true;
        $year           = 2018;
        $poster         = 'https://media.port.hu/images/001/069/100x100/705.jpg';

        $model = new QuickSearchResult($id, $url, $hungarianTitle, $hasYear, $year, $poster);

        $modelCollection = [ $model ];

        parent::__construct('spy_who_dumped_me', $modelCollection);
    }
}
