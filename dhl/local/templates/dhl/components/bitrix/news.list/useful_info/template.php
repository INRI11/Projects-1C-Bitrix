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

<div class="useful-info_tabs">
    <div class="useful-info_tabs_links">
        <? $count = 0;
        foreach ( $arResult["LIST"] as $NameSection => $arItems ) { $count++; ?>
            <span class="<?= ( $count == 1 ? "active" : NULL ) ?>"><?= $NameSection ?></span>
        <? } ?>
    </div>
    <div class="useful-info_tabs_contents">
        <? $count = 0;
        foreach ( $arResult["LIST"] as $NameSection => $arItems ) { $count++; ?>
             <div class="useful-info_tabs_content <?= ( $count == 1 ? "active" : NULL ) ?>">
                <div class="useful-info_items">
                    <? // print_r($arItems);
                    foreach ( $arItems as $arKeyItem => $arItem ) { ?>
                        <div class="useful-info_item">
                            <div class="useful-info_item_btn"><span class="icon-plus"></span></div>
                            <div class="useful-info_item_content">
                                <div class="useful-info_item_title"><?= $arItem["NAME"] ?></div>

                                <? if ( !empty( $arItem["FILES"] ) ) { ?>
                                    <div class="useful-info_item_value">
                                        <div class="useful-info_item_files">
                                            <? foreach ( $arItem["FILES"] as $KeyFiles => $File ) { ?>
                                                <a class="useful-info_item_file" href="<?= $File['SRC'] ?>" target="_blank">
                                                    <div class="useful-info_item_file_title"><?= $File['ORIGINAL_NAME'] ?></div>
                                                    <div class="useful-info_item_file_info"><? /* PDF, */ ?>
                                                        <?
                                                        $strKb = $File['FILE_SIZE']/1024;
                                                        echo round($strKb);
                                                        ?> Kb
                                                    </div>
                                                </a>
                                            <? } ?>
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