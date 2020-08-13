<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class MagnezitNewsComponent extends CBitrixComponent
{

    /**
     * @var int
     */
    protected static $iSectionID = 0;

    /**
     * @param int $iSectionID
     */
    public static function setSectionID($iSectionID)
    {
        self::$iSectionID = $iSectionID;
    }

    /**
     * @return int
     */
    public static function getSectionID()
    {
        return self::$iSectionID;
    }

    /**
     * @param int $iSectionID
     * @return bool
     */
    public static function getSection($iSectionID = 0)
    {
        if(!$iSectionID)
        {
            if(self::getSectionID())
                $iSectionID = self::getSectionID();
            else return false;
        }

        $rsResult = CIBlockSection::GetByID($iSectionID);
        if($arResult = $rsResult->GetNext()) {
            if($arResult['PICTURE'])
            {
                $arResult['PICTURE_URL'] = CFile::GetPath($arResult['PICTURE']);
            }
            return $arResult;
        }
    }

    public static function getSectionList( $iBlock = 0, $iSectionID = 0 )
    {
        if(!$iBlock)
        {
            return false;
        }

        $arResult = $arSections = [];

        $arFilter = [
            'IBLOCK_ID'     => $iBlock,
            'ACTIVE'        => 'Y',
            'GLOBAL_ACTIVE' => 'Y',
        ];
        $rsSections = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter, true);

        while ( $arItem = $rsSections->GetNext() )
        {
            if($arItem['PICTURE'])
            {
                $arItem['PICTURE_URL'] = CFile::GetPath($arItem['PICTURE']);
            }

            if( $iSectionID )
            {
                if ( $iSectionID == $arItem['ID'] )
                {
                    $arResult['SECTION_CURRENT'] = $arItem;
                }
                elseif ( !empty($arResult['SECTION_CURRENT']) && empty($arResult['SECTION_NEXT'] ))
                {
                    $arResult['SECTION_NEXT'] = $arItem;
                }
                if(empty($arResult['SECTION_CURRENT']))
                {
                    $arResult['SECTION_PREV'] = $arItem;
                }
            }
            $arSections[ $arItem['ID'] ] = $arItem;
        }
        unset($arItem);

        $arResult['SECTIONS'] = $arSections;

        return $arResult;
    }
}?>