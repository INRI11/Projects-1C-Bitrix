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
<div class="destination destination_inner">
    <div class="site-text">
        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
            <img
                class="detail_picture"
                border="0"
                src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
        <?endif?>
        <?echo $arResult["DETAIL_TEXT"];?>

        <? if ( !empty( $arResult["TABS"] ) ) { ?>
            <div class="useful-info_tabs">
                <div class="useful-info_tabs_links">
                    <? $coutsection = 0;
                    foreach ( $arResult["TABS"] as $SectionName =>  $Tabs ) { $coutsection++; ?>
                        <span class="<?= ( $coutsection == 1 ? "active" : NULL ) ?>"><?= $SectionName ?></span>
                    <? } ?>
                </div>

                <div class="useful-info_tabs_contents">
                    <? $counttabs = 0;
                    foreach ( $arResult["TABS"] as $SectionName =>  $Tabs ) { $counttabs++; ?>
                        <div class="useful-info_tabs_content <?= ( $counttabs == 1 ? "active" : NULL ) ?>">
                            <div class="useful-info_items">
                                <? if ( count( $Tabs ) > 1 ) { ?>
                                    <? foreach ( $Tabs as $TabsKey => $TabItem ) { ?>
                                        <div class="useful-info_item">
                                            <div class="useful-info_item_btn"><span class="icon-plus"></span></div>
                                            <div class="useful-info_item_content">
                                                <div class="useful-info_item_title"><?= $TabItem["HEADER"] ?></div>
                                                <div class="useful-info_item_value">
                                                    <?= $TabItem["TEXT"] ?>
                                                    <? if ( !empty( $TabItem["LINKS"] ) ) { ?>
                                                        <div class="useful-info_item_files useful-info_item_files-p20">
                                                            <?= $TabItem["LINKS"] ?>
                                                        </div>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <? } ?>
                                <? } else { ?>
                                    <div class="useful-info_item">
                                        <div class="useful-info_item_content">
                                            <div class="useful-info_item_title"><?= $Tabs[0]["HEADER"] ?></div>
                                            <?= $Tabs[0]["TEXT"] ?>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        <? } ?>


    </div>
</div>