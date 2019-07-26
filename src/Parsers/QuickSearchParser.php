<?php

namespace PoLaKoSz\PortHu\Parsers;

use PoLaKoSz\PortHu\Models\QuickSearchResult;
use PHPHtmlParser\Dom;

class QuickSearchParser
{
    private const BASE_URL = 'https://port.hu';


    /**
     * Convert the Json string into object(s).
     *
     * @return  Array   of QuickSearchResult
     */
    public function convert(string $json) : array
    {
        $objects = json_decode($json);

        $response = array();

        foreach ($objects as &$object) {
            if ($object->category->cls != QuickSearchResult::CLS) {
                continue;
            }
            
            $id             = $this->getID($object->url);
            $url            = QuickSearchParser::BASE_URL . $object->url;
            $hungarianTitle = $object->name;
            $year           = $this->getYear($object->subtitle);
            $hasYear        = $year != -1;
            $poster         = $object->thumbnail;

            array_push(
                $response,
                new QuickSearchResult($id, $url, $hungarianTitle, $hasYear, $year, $poster)
            );
        }

        return $response;
    }

    private function getID(string $input) : int
    {
        preg_match('/(\d+)(?!.*\d)/', $input, $match);

        return (int) $match[0];
    }

    private function getYear(string $input) : int
    {

        preg_match('/(\d+)(?!.*\d)/', $input, $match);

        if (!isset($match[0])) {
            return -1;
        } else {
            return (int) $match[0];
        }
    }
}
