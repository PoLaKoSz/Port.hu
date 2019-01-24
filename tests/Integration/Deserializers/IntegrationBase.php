<?php

namespace PoLaKoSz\PortHu\Tests\Integration\Deserializers;

use PHPUnit\Framework\TestCase;

abstract class IntegrationBase extends TestCase
{
    /**
     * @param   $folderName Name of the parent folder     * 
     * @param   $fileName   File name withouth .html extension
     * 
     * @return  string      File content
     */
    protected function loadStaticFile( string $folderName, string $fileName ) : string {        
        $filePath    = 'tests/Integration/StaticResources/' . $folderName . '/' . $fileName . '.html';

        $file        = fopen( $filePath, "r");
        $fileContent = fread( $file, filesize( $filePath ) );
        fclose( $file );

        return $fileContent;
    }
}
