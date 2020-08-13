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

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<div class="declaration_list grid-x">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        $link = "";
        $link_ankor = "";

        if ( !empty( $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"] ) ) {
            $link = $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"];
            $link_ankor = $arItem["DISPLAY_PROPERTIES"]["LINK"]["DESCRIPTION"];
        } elseif ( !empty( $arItem["DETAIL_TEXT"]) ) {
            $link = $arItem["DETAIL_PAGE_URL"];
            if ( !empty( $arItem["DISPLAY_PROPERTIES"]["LINK"]["DESCRIPTION"] ) )
                $link_ankor = $arItem["DISPLAY_PROPERTIES"]["LINK"]["DESCRIPTION"];
            else
                $link_ankor = "Подробнее";
        }
        ?>
        <div class="declaration_list_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <a class="declaration_list_item_img" href="<?= $link ?>">
                    <img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
                </a>
            <?endif;?>
            <div class="declaration_list_item_info">
                <a class="declaration_list_item_title" href="<?= $link ?>"><?=$arItem["NAME"]?></a>
                <div class="declaration_list_item_text ">
                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div class="declaration_list_item_text_content declaration_list_item_list"><?echo $arItem["PREVIEW_TEXT"];?></div>
                    <?endif;?>
                    <? if ( !empty( $link ) ) { ?>
                        <a class="declaration_list_item_text_link site-link" href="<?= $link ?>"><?= $link_ankor ?></a>
                    <? } ?>
                </div>
            </div>
        </div>
    <?endforeach;?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

