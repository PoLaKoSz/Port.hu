<?php

namespace PoLaKoSz\PortHu\Models;

class PortMovie implements \JsonSerializable
{
    private $id;
    private $url;
    private $imdbURL;
    private $hungarianTitle;
    private $originalTitle;
    private $hasYear;
    private $year;
    private $poster;



    // phpcs:ignore
    public function __construct(string $id, string $url, string $imdbURL, string $hungarianTitle, string $originalTitle, bool $hasYear, int $year, string $poster)
    {
        $this->id = $id;
        $this->url = $url;
        $this->imdbURL = $imdbURL;
        $this->hungarianTitle = $hungarianTitle;
        $this->originalTitle = $originalTitle;
        $this->hasYear        = $hasYear;
        $this->year = $year;
        $this->poster = $poster;
    }



    public function getID() : string
    {
        return $this->id;
    }

    public function getURL() : string
    {
        return $this->url;
    }

    public function getIMDbURL() : string
    {
        return $this->imdbURL;
    }

    public function getHungarianTitle() : string
    {
        return $this->hungarianTitle;
    }

    public function getOriginalTitle() : string
    {
        return $this->originalTitle;
    }

    /**
     * This method recomennded to use when You want to work with the getYear() method.
     * There are cases when no year provided for a movie, in that case the getYear()
     * method will return -1.
     */
    public function hasYear() : bool
    {
        return $this->hasYear;
    }
    
    /**
     * @return int  -1 if no year found, or the actual year.
     */
    public function getYear() : int
    {
        return $this->year;
    }

    public function hasPoster() : bool
    {
        $length = strlen($this->getPoster());
        
        return ($length != 0);
    }

    public function getPoster() : string
    {
        return $this->poster;
    }


    public function jsonSerialize()
    {
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
