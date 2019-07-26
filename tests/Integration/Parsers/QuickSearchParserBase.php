<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Parsers;

use PoLaKoSz\PortHu\Parsers\QuickSearchParser;
use PoLaKoSz\PortHu\Models\QuickSearchResult;

abstract class QuickSearchParserBase extends IntegrationBase
{
    private $actualCollection;
    private $expectedCollection;



    public function __construct(string $resourceName, array $collection)
    {
        $class                    = new QuickSearchParser();

        $html                     = $this->loadStaticFile('QuickSearch', $resourceName);
        $this->actualCollection   = $class->convert($html);
        
        $this->expectedCollection = $collection;
    }



    public function testReturnValidObjectType()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertInstanceOf(
                QuickSearchResult::class,
                $this->actualCollection[$i],
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }

    public function testHasTheSameCountResults()
    {
        $this->assertEquals(count($this->expectedCollection), count($this->actualCollection));
    }
    
    public function testCanExtractMovieId()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertEquals(
                $this->expectedCollection[$i]->getID(),
                $this->actualCollection[$i]->getID(),
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }

    public function testCanExtractMovieUrl()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertEquals(
                $this->expectedCollection[$i]->getURL(),
                $this->actualCollection[$i]->getURL(),
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }

    public function testCanExtractMovieHungarianTitle()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertEquals(
                $this->expectedCollection[$i]->getHungarianTitle(),
                $this->actualCollection[$i]->getHungarianTitle(),
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }

    public function testHasYearEquals()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertEquals(
                $this->expectedCollection[$i]->hasYear(),
                $this->actualCollection[$i]->hasYear(),
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }

    public function testCanExtractMovieYear()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertEquals(
                $this->expectedCollection[$i]->getYear(),
                $this->actualCollection[$i]->getYear(),
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }

    public function testCanExtractMoviePoster()
    {
        for ($i = 0; $i < count($this->actualCollection); $i++) {
            $this->assertEquals(
                $this->expectedCollection[$i]->getPoster(),
                $this->actualCollection[$i]->getPoster(),
                'Model at index ' . $i . ' is wrong!'
            );
        }
    }
}
