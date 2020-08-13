<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Bitrix\Main\Page\Asset;

IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/local/templates/" . SITE_TEMPLATE_ID . "/header.php");
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
$requestedPage = Application::getInstance()->getContext()->getRequest()->getRequestedPage();

$bxAsset = Asset::getInstance();

$arJsAssets = [
    '/static/js/vendor.js',
    '/static/js/own.js',
];

foreach ($arJsAssets as $asset) {
    $bxAsset->addJs(SITE_TEMPLATE_PATH . $asset, true);
}

$arCssAssets = [
    '/static/css/styles.css',
    '/static/css/styles-more.css',
];
?>
<!DOCTYPE html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="<? $APPLICATION->ShowProperty('og:title'); ?>"/>
    <meta property="og:description" content="<? $APPLICATION->ShowProperty('og:description'); ?>"/>
    <meta property="og:image" content="<? $APPLICATION->ShowProperty('og:image'); ?>"/>
    <meta property="og:image:width" content="<? $APPLICATION->ShowProperty('og:image:width'); ?>"/>
    <meta property="og:image:height" content="<? $APPLICATION->ShowProperty('og:image:height'); ?>"/>
    <meta property="og:type" content="<? $APPLICATION->ShowProperty('og:type'); ?>"/>
    <meta property="og:url" content="<? $APPLICATION->ShowProperty('og:url'); ?>"/>

    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead(); ?>

    <link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/static/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.2/css/lightgallery.min.css">

    <?foreach ($arCssAssets as $asset):?>
        <?= $bxAsset->insertCss(\Magnezit\Helpers\File\Asset::obtainTimestamp(SITE_TEMPLATE_PATH . $asset), false);?>
    <?endforeach;?>

    <style type="text/css">
        .wrapper {
            opacity: 0;
            -webkit-transition: opacity 0.4s;
            transition: opacity 0.4s;
        }
        .page-loaded .wrapper {
            opacity: 1;
        }
    </style>
    <script>
        window.onload = function () {
            return document.querySelector('body').classList.add('page-loaded');
        }
        if (/(MacIntel|Mac|iPhone|iPod|iPad)/i.test(navigator.platform)) {
            document.querySelector('html').classList.add('ios')
        }
        if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > -1) {
            document.querySelector('html').classList.add('MSIE');
        }
    </script>
</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="wrapper <?=(IS_PAGE_SECTIONS == 'Y'?'wrapper--default-page':NULL)?>">
    <header class="header">
        <? \Magnezit\Helpers\File\Asset::includeFile('logo');?>
        <div class="header__right">
            <nav class="nav">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "N"
                    )
                );?>
            </nav>
            <ul class="header__actions">
                <li class="header__actions-item"><a class="header__actions-href header__actions-href--user" href="#">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#F4F4F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#F4F4F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
                <li class="header__actions-item">
                    <a class="header__actions-href header__actions-href--search js-toggle-search" href="#">
                        <svg class="search-ico" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 18C14.866 18 18 14.866 18 11C18 7.13401 14.866 4 11 4C7.13401 4 4 7.13401 4 11C4 14.866 7.13401 18 11 18Z" stroke="#F4F4F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 20L16 16" stroke="#F4F4F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg class="close-ico" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 6L6 18" stroke="#E9E9E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 6L18 18" stroke="#E9E9E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "",
            Array(
                "PAGE" => "#SITE_DIR#search/",
                "USE_SUGGEST" => "N"
            )
        );?>
    </header>
    <main class="main">
