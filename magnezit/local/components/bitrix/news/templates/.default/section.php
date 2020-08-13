<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Magnezit\Finders\IBlockFinder;
use Magnezit\Helpers\Server\Helper;

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arSelect = ["ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL"];
$arFilter = ["IBLOCK_ID" => IBlockFinder::sections(), "ACTIVE" => "Y", "IBLOCK_SECTION_ID" => $arResult['VARIABLES']['SECTION_ID']];
$rsElements = CIBlockElement::GetList(["SORT" => "ASC"], $arFilter, false, ["nTopCount"=>1], $arSelect);

if( $arItem = $rsElements->GetNext() )
{
    header("Location: " . Helper::getSiteUrl() . $arItem['DETAIL_PAGE_URL'] );
}