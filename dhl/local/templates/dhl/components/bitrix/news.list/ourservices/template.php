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

<div class="main-services_list grid-x align-center">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="main-services_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
            <? if ( !empty( $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"] ) ) { ?>
                <div class="main-services_item_img">
                    <img border="0" src="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>" />
                </div>
            <? } ?>
            <div class="main-services_item_info">
                <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                    <div class="main-services_item_title"><?echo $arItem["NAME"]?></div>
                <?endif;?>
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <div class="main-services_item_desc">
                        <?echo $arItem["PREVIEW_TEXT"];?>
                    </div>
                <?endif;?>
                <? if ( !empty( $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"] ) ) { ?>
                <a class="main-services_item_link" href="<?= $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"] ?>"><?= $arItem["DISPLAY_PROPERTIES"]["LINK"]["DESCRIPTION"] ?></a>
                <? } ?>
            </div>
        </div>
    <?endforeach;?>
</div>
