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

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <div class="main-shipping" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
            <img class="main-shipping_img" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
        <?endif?>
        <div class="main-shipping_inner centered-block">
            <div class="main-shipping_text">
                <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                    <h1 class="main-shipping_title"><?echo $arItem["NAME"]?></h1>
                <?endif;?>
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <div class="main-shipping_subtitle"><?echo $arItem["PREVIEW_TEXT"];?></div>
                <?endif;?>
                <div class="main-shipping_btns grid-x">
                    <? if ( !empty( $arItem["DISPLAY_PROPERTIES"]["LINK1"]["VALUE"] ) ) { ?>
                        <a class="main-shipping_btn main-shipping_btn_calc site-btn site-btn_base site-btn_red" href="<?= $arItem["DISPLAY_PROPERTIES"]["LINK1"]["VALUE"] ?>" target="_blank">
                            <span class="icon-btn-check"></span><span><?= $arItem["DISPLAY_PROPERTIES"]["LINK1"]["DESCRIPTION"] ?></span>
                        </a>
                    <? } ?>
                    <? if ( !empty( $arItem["DISPLAY_PROPERTIES"]["LINK2"]["VALUE"] ) ) { ?>
                        <a class="main-shipping_btn main-shipping_btn_tracking site-btn site-btn_base" href="<?= $arItem["DISPLAY_PROPERTIES"]["LINK2"]["VALUE"] ?>" target="_blank">
                            <span class="icon-search"></span><span><?= $arItem["DISPLAY_PROPERTIES"]["LINK2"]["DESCRIPTION"] ?></span>
                        </a>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
<?endforeach;?>

