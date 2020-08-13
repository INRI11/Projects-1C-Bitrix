<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CDatabase $DB */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $this */

$arResult['IS_SHOW_POPUP'] = 'N';

global $USER;

if(!$USER->IsAuthorized())
{
    $arResult['IS_SHOW_POPUP'] = 'Y';
}

if($arParams["RETURN_ARRAY"]) return $arResult;

if( $arResult['IS_SHOW_POPUP'] == 'Y' )
    $this->IncludeComponentTemplate();
