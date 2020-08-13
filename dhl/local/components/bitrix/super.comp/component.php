<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (isset($arParams["COMPONENT_ENABLE"]) && $arParams["COMPONENT_ENABLE"] === false)
	return;

// Режим разработки под админом
$bDesignMode = $GLOBALS["APPLICATION"]->GetShowIncludeAreas() && is_object($GLOBALS["USER"]) && $GLOBALS["USER"]->IsAdmin();

CPageOption::SetOptionString("main", "nav_page_in_session", "N");

$arNavParams = CDBResult::GetNavParams($arParams['PAGE_ELEMENT_COUNT'] > 0 ? $arParams['PAGE_ELEMENT_COUNT'] : 0);

// Дополнительно кешируем текущую страницу
$ADDITIONAL_CACHE_ID[] = $arNavParams["PAGEN"];
$ADDITIONAL_CACHE_ID[] = $arNavParams["SIZEN"];
$ADDITIONAL_CACHE_ID[] = $arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups();

$arParams["ADDITIONAL_CACHE_ID"] = $ADDITIONAL_CACHE_ID;

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 36000000;

$CACHE_PATH = "/".SITE_ID."/".$this->__relativePath.'/'.$this->__templateName;
$arParams["CACHE_PATH"] = $CACHE_PATH;

// Подключается файл result-modifier.php
if($this->StartResultCache($arParams["CACHE_TIME"], $ADDITIONAL_CACHE_ID, $CACHE_PATH))
{
	$this->IncludeComponentTemplate();
}

// Подключаем файл без кеширования
$modifier_path = $_SERVER["DOCUMENT_ROOT"].$arResult["__TEMPLATE_FOLDER"]."/result_modifier_nc.php";
$modifier_short_path = $_SERVER["DOCUMENT_ROOT"].$arResult["__TEMPLATE_FOLDER"]."/nc.php";

if (file_exists($modifier_short_path))
{
	require_once($modifier_short_path);
	$mod_name = "nc.php";
}
elseif (file_exists($modifier_path))
{
	require_once($modifier_path);
	$mod_name = "result_modifier_nc.php";
}


// Подключаем шаблон без кеширования

$nocahe_template_path = $_SERVER["DOCUMENT_ROOT"].$arResult["__TEMPLATE_FOLDER"]."/template_nc.php";
if (file_exists($nocahe_template_path))
{
    if (!empty($arParams['FORCE_REQUIRE']) && $arParams['FORCE_REQUIRE'] == 'Y') { // костылец, если нужно дважды один компонент вывести на странице
        require($nocahe_template_path);
    } else {
        require_once($nocahe_template_path);
    }
}


if($GLOBALS["APPLICATION"]->GetShowIncludeAreas() && $USER->isAdmin())
{

	if(file_exists($_SERVER["DOCUMENT_ROOT"].$arResult["__TEMPLATE_FOLDER"]."/template_nc.php"))
	{
		$arIcons = array(
			'URL' => 'javascript:'.$APPLICATION->GetPopupLink(array(
					'URL' => "/bitrix/admin/public_file_edit_src.php?site=".SITE_ID."&".'path='.urlencode($arResult["__TEMPLATE_FOLDER"]."/template_nc.php")."&back_url=".urlencode($_SERVER["REQUEST_URI"])."&lang=".LANGUAGE_ID,
					'PARAMS' => array(
						'width' => 770,
						'height' => 470,
						'resize' => true
					)
				)
			),
			'TITLE' => 'Редактировать файл template_nc.php',
			'IN_MENU' => true,
			'SRC'   => $this->GetPath().'/images/edit.gif'
		);

		$this->AddIncludeAreaIcon($arIcons);
	}

	if(file_exists($_SERVER["DOCUMENT_ROOT"].$arResult["__TEMPLATE_FOLDER"]."/.parameters.php"))
	{
		$arIcons = array(
			'URL' => 'javascript:'.$APPLICATION->GetPopupLink(array(
					'URL' => "/bitrix/admin/public_file_edit_src.php?site=".SITE_ID."&".'path='.urlencode($arResult["__TEMPLATE_FOLDER"]."/.parameters.php")."&back_url=".urlencode($_SERVER["REQUEST_URI"])."&lang=".LANGUAGE_ID,
					'PARAMS' => array(
						'width' => 770,
						'height' => 470,
						'resize' => true
					)
				)
			),
			'TITLE' => 'Редактировать файл .parameters.php',
			'IN_MENU' => true,
			'SRC'   => $this->GetPath().'/images/edit.gif'
		);

		$this->AddIncludeAreaIcon($arIcons);
	}

	if(strlen($mod_name) > 0)
	{
		$arIcons = array(
			'URL' => 'javascript:'.$APPLICATION->GetPopupLink(array(
					'URL' => "/bitrix/admin/public_file_edit_src.php?site=".SITE_ID."&".'path='.urlencode($arResult["__TEMPLATE_FOLDER"]."/result_modifier_nc.php")."&back_url=".urlencode($_SERVER["REQUEST_URI"])."&lang=".LANGUAGE_ID,
					'PARAMS' => array(
						'width' => 770,
						'height' => 470,
						'resize' => true
					)
				)
			),
			'TITLE' => 'Редактировать файл result_modifier_nc.php',
			'IN_MENU' => true,
			'SRC'   => $this->GetPath().'/images/edit.gif'
		);

		$this->AddIncludeAreaIcon($arIcons);
	}

	if(file_exists($_SERVER["DOCUMENT_ROOT"].$arResult["__TEMPLATE_FOLDER"]."/template_nc.php"))
	{
		$arIcons = array(
			'URL' => 'javascript:'.$APPLICATION->GetPopupLink(array(
					'URL' => "/bitrix/admin/public_file_edit_src.php?site=".SITE_ID."&".'path='.urlencode($arResult["__TEMPLATE_FOLDER"]."/template_nc.php")."&back_url=".urlencode($_SERVER["REQUEST_URI"])."&lang=".LANGUAGE_ID,
					'PARAMS' => array(
						'width' => 770,
						'height' => 470,
						'resize' => true
					)
				)
			),
			'TITLE' => 'Редактировать файл template_nc.php',
			'IN_MENU' => true,
			'SRC'   => $this->GetPath().'/images/edit.gif'
		);

		$this->AddIncludeAreaIcon($arIcons);
	}

}

// Возвращаемое значение
if (!empty($arResult["__RETURN_VALUE"]))
	return $arResult["__RETURN_VALUE"];
?>
