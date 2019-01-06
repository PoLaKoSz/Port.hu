<?php

namespace PoLaKoSz\PortHu\Deserializers;

use PoLaKoSz\PortHu\Models\QuickSearchResult;
use PHPHtmlParser\Dom;

class QuickSearchDeserializer
{
    private const BASE_URL = 'https://port.hu';


    /**
     * Convert the Json string into object(s).
     * 
     * @return  Array   of QuickSearchResult
     */
    public static function convert(string $json) : array {
        $objects = json_decode( $json );

        $response = array();

        foreach ($objects as &$object)
        {
            if ( $object->category->cls != QuickSearchResult::CLS )
                continue;
            
            $id             = static::getID( $object->url );
            $url            = QuickSearchDeserializer::BASE_URL . $object->url;
            $hungarianTitle = $object->name;
            $year           = static::getYear( $object->subtitle );
            $poster         = $object->thumbnail;

            array_push(
                $response,
                new QuickSearchResult( $id, $url, $hungarianTitle, $year, $poster )
            );
        }

        return $response;
    }

    private static function getID(string $input) : int {
        preg_match( '/(\d+)(?!.*\d)/', $input, $match );

        return (int) $match[0];
    }

    private static function getYear(string $input) : int {
        preg_match( '/(\d+)(?!.*\d)/', $input, $match );

        return (int) $match[0];
    }
}
