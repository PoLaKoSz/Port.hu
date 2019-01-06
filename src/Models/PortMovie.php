<?php

namespace PoLaKoSz\PortHu\Models;

class PortMovie implements \JsonSerializable
{
    public const CAT = "movie";


    private $id;
    private $url;
    private $imdbURL;
    private $hungarianTitle;
    private $originalTitle;
    private $year;
    private $poster;



    public function __construct( string $id, string $url, string $imdbURL, string $hungarianTitle, string $originalTitle, int $year, string $poster) {
        $this->id = $id;
        $this->url = $url;
        $this->imdbURL = $imdbURL;
        $this->hungarianTitle = $hungarianTitle;
        $this->originalTitle = $originalTitle;
        $this->year = $year;
        $this->poster = $poster;
    }



    public function getID() : string {
        return $this->id;
    }

    public function getURL() : string {
        return $this->url;
    }

    public function getIMDbURL() : string {
        return $this->imdbURL;
    }

    public function getHungarianTitle() : string {
        return $this->hungarianTitle;
    }

    public function getOriginalTitle() : string {
        return $this->originalTitle;
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
            'imdb_url'        => $this->getIMDbURL(),
            'hungarian_title' => $this->getHungarianTitle(),
            'original_title'  => $this->getOriginalTitle(),
            'year'            => $this->getYear(),
            'thumbnail_image' => $this->getposter(),
        ];
    }
}
