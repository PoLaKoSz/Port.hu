<?php

namespace PoLaKoSz\PortHu\Models;

class QuickSearchResult implements \JsonSerializable
{
    /**
     * {@internal This is the only type currently supported by the QuickSearch endpoint }}
     */
    public const CLS = "movie";


    private $id;
    private $url;
    private $hungarianTitle;
    private $year;
    private $poster;



    public function __construct( string $id, string $url, string $hungarianTitle, int $year, string $poster) {
        $this->id = $id;
        $this->url = $url;
        $this->hungarianTitle = $hungarianTitle;
        $this->year = $year;
        $this->poster = $poster;
    }



    public function getID() : string {
        return $this->id;
    }

    public function getURL() : string {
        return $this->url;
    }

    public function getHungarianTitle() : string {
        return $this->hungarianTitle;
    }
    
    public function getYear() : int {
        return $this->year;
    }

    public function hasPoster() : bool {
        $length = strlen( $this->getPoster() );
        
        return ( $length != 0 );
    }

    public function getPoster() : string {
        return $this->poster;
    }


    public function jsonSerialize() {
        return [
            'id'              => $this->getID(),
            'url'             => $this->getURL(),
            'hungarian_title' => $this->getHungarianTitle(),
            'year'            => $this->getYear(),
            'thumbnail_image' => $this->getposter(),
        ];
    }
}
