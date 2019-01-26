<?php

namespace PoLaKoSz\PortHu\Deserializers;

use PoLaKoSz\PortHu\Models\PortMovie;
use PHPHtmlParser\Dom;

class MoviePageDeserializer
{
    public const BASE_URL = 'https://port.hu/';
    public const ENDPOINT_URL = 'adatlap/film/tv/-/movie-';



    /**
     * Convert the raw HTML string into a PortMovie object
     *
     * @return  PortMovie
     */
    public static function convert(int $movieID, string $html) : PortMovie
    {
        $url            = MoviePageDeserializer::BASE_URL . MoviePageDeserializer::ENDPOINT_URL . $movieID;
        $imdbURL        = static::getIMDbURL($html);
        $hungarianTitle = static::getHungarianTitle($html);
        $originalTitle  = static::getOriginalTitle($html);
        $year           = static::getYear($html);
        $hasYear        = $year != -1;
        $poster         = static::getPoster($html);

        return new PortMovie($movieID, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster);
    }


    private static function getIMDbURL(string $html) : string
    {
        $anchorNode = static::getNode($html, '//a[@class="logo-imdb pull-right"]');

        return $anchorNode->attributes->getNamedItem('href')->value;
    }

    private static function getHungarianTitle(string $html) : string
    {
        $headNode = static::getNode($html, '//div[@class="title"]/h1');

        return trim($headNode->textContent);
    }

    private static function getOriginalTitle(string $html) : string
    {
        $smallNode = static::getNode($html, '//div[@class="title"]/small');

        if ($smallNode == null) {
            return static::getHungarianTitle($html);
        }

        $trimmed = trim($smallNode->textContent);

        return substr($trimmed, 1, -1);
    }

    private static function getYear(string $html) : int
    {
        $yearNode = static::getNode(
            $html,
            '//div[@class="row main-container"]/section[@class="row no-hr details-box"]/div'
        );

        $details = trim($yearNode->textContent);

        preg_match_all('/\d{4}/', $details, $matches);

        if (!isset($matches[0][0])) {
            return -1;
        } else {
            return (int) $matches[0][0];
        }
    }

    private static function getPoster(string $html) : string
    {
        $posterNode = static::getNode($html, '//a[@class="row cover open-gallery"]/img');

        if ($posterNode == null) {
            return '';
        }

        return $posterNode->attributes->getNamedItem('src')->value;
    }

    private static function getNode(string $html, string $xPath)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        $domXPath = new \DOMXPath($dom);

        $node = $domXPath->query($xPath)->item(0);
        
        return $node;
    }
}
