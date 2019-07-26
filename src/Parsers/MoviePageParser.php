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
    public function convert(int $movieID, string $html) : PortMovie
    {
        $url            = MoviePageParser::BASE_URL . MoviePageParser::ENDPOINT_URL . $movieID;
        $imdbURL        = $this->getIMDbURL($html);
        $hungarianTitle = $this->getHungarianTitle($html);
        $originalTitle  = $this->getOriginalTitle($html);
        $year           = $this->getYear($html);
        $hasYear        = $year != -1;
        $poster         = $this->getPoster($html);

        return new PortMovie($movieID, $url, $imdbURL, $hungarianTitle, $originalTitle, $hasYear, $year, $poster);
    }


    private function getIMDbURL(string $html) : string
    {
        $anchorNode = $this->getNode($html, '//a[@class="logo-imdb pull-right"]');

        return $anchorNode->attributes->getNamedItem('href')->value;
    }

    private function getHungarianTitle(string $html) : string
    {
        $headNode = $this->getNode($html, '//div[@class="title"]/h1');

        return trim($headNode->textContent);
    }

    private function getOriginalTitle(string $html) : string
    {
        $dom = new Document($html);
        $shouldWrapNode = false;
        $titleNode = $dom->xpath('/html/body/div[2]/div/div[2]/div[2]/div/small', $shouldWrapNode);

        if (count($titleNode) == 0 || $titleNode == null) {
            return $this->getHungarianTitle($html);
        }

        $title = trim($titleNode[0]->textContent);

        return $title;
    }

    private function getYear(string $html) : int
    {
        $yearNode = $this->getNode(
            $html,
            '/html/head/meta[@property="video:release_date"]/@content'
        );

        if (!isset($yearNode)) {
            return -1;
        } else {
            return (int) $yearNode->textContent;
        }
    }

    private function getPoster(string $html) : string
    {
        $posterNode = $this->getNode($html, '//a[@class="row cover open-gallery"]/img');

        if ($posterNode == null) {
            return '';
        }

        return $posterNode->attributes->getNamedItem('src')->value;
    }

    private function getNode(string $html, string $xPath)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        $domXPath = new \DOMXPath($dom);

        $node = $domXPath->query($xPath)->item(0);
        
        return $node;
    }
}
