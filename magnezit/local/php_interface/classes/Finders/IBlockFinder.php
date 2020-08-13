<?php

namespace Magnezit\Finders;

use Bitrix\Iblock\IblockTable;
use Magnezit\Finders\Iblock;

class IBlockFinder extends Iblock
{
    protected function query($type, $code)
    {
        $q = IblockTable::query()
            ->addFilter('TYPE.ID', $type)
            ->setSelect(['CODE', 'ID', 'XML_ID']);

        $this->setQueryMetadata('CODE', $code, [$type]);

        return $q;
    }

    /**
     * Информационный раздел
     * @return mixed
     */
    public static function sections()
    {
        return self::getId('sections', 'sections');
    }

    /**
     * Справочник
     * @return mixed
     */
    public static function dictionary()
    {
        return self::getId('sections', 'dictionary');
    }

    /**
     * 3D Атлас
     * @return mixed
     */
    public static function atlas()
    {
        return self::getId('sections', 'atlas');
    }
}
