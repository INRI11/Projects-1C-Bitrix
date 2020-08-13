<?php

namespace Magnezit\Finders;

use Magnezit\Finders\IblockProperty;

class IblockPropertyFinder extends IblockProperty
{
    /**
     * Идентификатор свойства "Документ" в инфоблоке Справочники
     * @return int ID
     */
    public static function dictionaryFileID(): int
    {
        return static::get(IBlockFinder::dictionary(), 'FILE')['ID'];
    }

    /**
     * Символьный код свойства "Документ" в инфоблоке Справочники
     * @return string CODE
     */
    public static function dictionaryFileCode()
    {
        return static::get(IBlockFinder::dictionary(), 'FILE')['CODE'];
    }
}
