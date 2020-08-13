<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<table class="destination_table">
    <thead>
    <tr>
        <th>Услуги</th>
        <th>Информация про услуги</th>
        <th>Ссылки</th>
    </tr>
    </thead>
    <tbody>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    $link = $arItem["DETAIL_PAGE_URL"];
	?>

    <tr id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
        <td>
            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <?echo $arItem["NAME"]?>
            <?endif;?>
        </td>
        <td>
            <?echo $arItem["PREVIEW_TEXT"]?>
        </td>
        <td>
            <div class="destination_table_links">
                <a href="<?= $link ?>"><span class="icon-slider-next"></span><span>Подробнее</span></a>
                <a target="_blank" href="https://webshipping.dhl.com/wsi/SubmitCountryServlet?moduleKey=Login&countryCode=ru#b"><span class="icon-slider-next"></span><span>Отправить груз в режиме онлайн</span></a>
            </div>
        </td>
    </tr>
<?endforeach;?>
    </tbody>
</table>