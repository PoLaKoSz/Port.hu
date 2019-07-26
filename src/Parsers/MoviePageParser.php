<?php

namespace PoLaKoSz\PortHu\Parsers;

use DiDom\Document;
use PoLaKoSz\PortHu\Models\PortMovie;

class MoviePageParser
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
        $url            = MoviePageParser::BASE_URL . MoviePageParser::ENDPOINT_URL . $movieID;
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
        $dom = new Document($html);
        $shouldWrapNode = false;
        $titleNode = $dom->xpath('/html/body/div[2]/div/div[2]/div[2]/div/small', $shouldWrapNode);

        if (count($titleNode) == 0 || $titleNode == null) {
            return static::getHungarianTitle($html);
        }

        $title = trim($titleNode[0]->textContent);

        return $title;
    }

    private static function getYear(string $html) : int
    {
        $yearNode = static::getNode(
            $html,
            '/html/head/meta[@property="video:release_date"]/@content'
        );

        if (!isset($yearNode)) {
            return -1;
        } else {
            return (int) $yearNode->textContent;
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
