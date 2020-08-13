<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Magnezit\Finders\IBlockFinder;

$arSections = [];

$arFilter = [
    'IBLOCK_ID'     => IBlockFinder::sections(),
    'ACTIVE'        => 'Y',
    'GLOBAL_ACTIVE' => 'Y',
];
$rsSections = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter, true);

while ( $arItem = $rsSections->GetNext() )
{
    if ( $arResult["IBLOCK_SECTION_ID"] == $arItem['ID'] )
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
    $arSections[ $arItem['ID'] ] = $arItem;
}
unset($arItem);

$arResult['SECTIONS'] = $arSections;

$arElements = [];

$arSelect = ["ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_*"];
$arFilter = ["IBLOCK_ID" => IBlockFinder::sections(), "ACTIVE" => "Y", "IBLOCK_SECTION_ID" => $arResult["IBLOCK_SECTION_ID"]];
$rsElements = CIBlockElement::GetList(["SORT" => "ASC"], $arFilter, false, ["nTopCount"=>500], $arSelect);

while ( $arItem = $rsElements->GetNext() )
{
    if ($arResult['ID'] == $arItem['ID'])
    {
        $arResult['CURRENT'] = $arItem;
    }
    elseif ( !empty($arResult['CURRENT']) && empty($arResult['NEXT']) )
    {
        $arResult['NEXT'] = $arItem;
    }
    if(empty($arResult['CURRENT']))
    {
        $arResult['PREV'] = $arItem;
    }
    $arElements[$arItem['ID']] = $arItem;
}
unset($arItem);

$arResult['ELEMENTS'] = $arElements;
