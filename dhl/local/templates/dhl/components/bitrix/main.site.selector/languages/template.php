<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="site-header_lang">
    <?foreach ($arResult["SITES"] as $key => $arSite): ?>
        <?if ($arSite["CURRENT"] == "Y"):?>
            <div class="site-header_lang_item site-header_lang_item_current">
                <? if ( $arSite["LID"] == "s1" ) { ?>
                    <div class="site-header_lang_item_flag"><img src="<?= SITE_TEMPLATE_PATH.TEMPLATE_PATH_IMG?>/rus.png" alt=""></div>
                    <div class="site-header_lang_item_name"><?= GetMessage("HEADER_LANG_RUSSIAN")?></div>
                <? } ?>
                <? if ( $arSite["LID"] == "s2" ) { ?>
                    <div class="site-header_lang_item_flag"><img src="<?= SITE_TEMPLATE_PATH.TEMPLATE_PATH_IMG?>/eng.png" alt=""></div>
                    <div class="site-header_lang_item_name"><?= GetMessage("HEADER_LANG_ENGLISH")?></div>
                <? } ?>
            </div>
        <?endif?>
    <?endforeach;?>
    <div class="site-header_lang_list">
        <?foreach ($arResult["SITES"] as $key => $arSite): ?>
            <? if ( $arSite["LID"] == "s1" ) { ?>
                <? /* <a href="<?if(is_array($arSite['DOMAINS']) && strlen($arSite['DOMAINS'][0]) > 0 || strlen($arSite['DOMAINS']) > 0):?>http://<?endif?><?=(is_array($arSite["DOMAINS"]) ? $arSite["DOMAINS"][0] : $arSite["DOMAINS"])?><?=$arSite["DIR"]?>" > */ ?>
                <a href="<?=$arSite["DIR"]?>" >
                    <div class="site-header_lang_item site-header_lang_item_list">
                        <div class="site-header_lang_item_flag"><img src="<?= SITE_TEMPLATE_PATH.TEMPLATE_PATH_IMG?>/rus.png" alt=""></div>
                        <div class="site-header_lang_item_name"><?= GetMessage("HEADER_LANG_RUSSIAN")?></div>
                    </div>
                </a>
            <? } ?>
            <? if ( $arSite["LID"] == "s2" ) { ?>
                <? /* <a href="<?if(is_array($arSite['DOMAINS']) && strlen($arSite['DOMAINS'][0]) > 0 || strlen($arSite['DOMAINS']) > 0):?>http://<?endif?><?=(is_array($arSite["DOMAINS"]) ? $arSite["DOMAINS"][0] : $arSite["DOMAINS"])?><?=$arSite["DIR"]?>" > */ ?>
                <a href="<?=$arSite["DIR"]?>" >
                    <div class="site-header_lang_item site-header_lang_item_list">
                        <div class="site-header_lang_item_flag"><img src="<?= SITE_TEMPLATE_PATH.TEMPLATE_PATH_IMG?>/eng.png" alt=""></div>
                        <div class="site-header_lang_item_name"><?= GetMessage("HEADER_LANG_ENGLISH")?></div>
                    </div>
                </a>
            <? } ?>
        <?endforeach;?>
    </div>
</div>