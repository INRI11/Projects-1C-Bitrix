<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width">
    <meta name="yandex-verification" content="7097173016040990" />
    <meta name="google-site-verification" content="S-hDp_dleU2oCLGfJJdYWjpX0hITltjUDzogFdciC_Y" />
    <meta charset="utf-8">
    <script>
        var SITE_TEMPLATE_PATH = "<?= SITE_TEMPLATE_PATH ?>";
        var SITE_LANG = "<?= LANGUAGE_ID ?>";
    </script>
    <? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="/img/dhl-favicons/favicon_dhl.ico">
    <link rel="icon" sizes="16x16 32x32 64x64" href="/img/dhl-favicons/favicon_dhl.ico">
    <link rel="icon" type="image/png" sizes="196x196" href="/img/dhl-favicons/favicon-192-dhl.png">
    <link rel="icon" type="image/png" sizes="160x160" href="/img/dhl-favicons/favicon-160-dhl.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/dhl-favicons/favicon-96-dhl.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/img/dhl-favicons/favicon-64-dhl.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/dhl-favicons/favicon-32-dhl.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/dhl-favicons/favicon-16-dhl.png">
    <link rel="apple-touch-icon" href="/img/dhl-favicons/favicon-57-dhl.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/dhl-favicons/favicon-114-dhl.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/dhl-favicons/favicon-72-dhl.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/dhl-favicons/favicon-144-dhl.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/dhl-favicons/favicon-60-dhl.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/dhl-favicons/favicon-120-dhl.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/dhl-favicons/favicon-76-dhl.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/dhl-favicons/favicon-152-dhl.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/dhl-favicons/favicon-180-dhl.png">
    
    <!-- link(rel='stylesheet' href='assets/css/slick.css')-->
    <!-- link(rel='stylesheet' href='assets/css/slick-theme.css')-->
    <!-- link(rel='stylesheet' href='assets/css/fancybox.css')-->
    <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.TEMPLATE_PATH_CSS . "/screen.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.TEMPLATE_PATH_CSS . "/fancybox.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.TEMPLATE_PATH_CSS . "/slick.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.TEMPLATE_PATH_CSS . "/slick-theme.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.TEMPLATE_PATH_CSS . "/develop.css");
    ?>

    <script>
        $(function() {
            <?  $MODAL_COOKIE = @$_COOKIE["MODAL_COOKIE"];
            if ( $MODAL_COOKIE != "Y" ) {
                setcookie("MODAL_COOKIE", "Y", time()+3600, "/", SITE_SERVER_NAME); ?>
                $("#modcookie").show();
            <? } ?>
            var modalcookie = '<?= $MODAL_COOKIE ?>';
            console.log("modalcookie: "+ modalcookie);
        });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84596543-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-84596543-1');
    </script>

    <!-- calltouch code --><script type="text/javascript">(function (w, d, nv, ls) {
            var lwait = function (w, on, trf, dly, ma, orf, osf) {var pfx = "ct_await_", sfx = "_completed";if (!w[pfx + on + sfx]) {var ci = clearInterval, si = setInterval, st = setTimeout, cmld = function() {if (!w[pfx + on + sfx]) { w[pfx + on + sfx] = true;if ((w[pfx + on] && (w[pfx + on].timer))) { ci(w[pfx + on].timer);w[pfx + on] = null;}orf(w[on]);}};if (!w[on] || !osf) {if (trf(w[on])){cmld();} else {if (!w[pfx + on]) {w[pfx + on] = {timer: si(function () {if (trf(w[on]) || ma < ++w[pfx + on].attempt) {cmld();}}, dly), attempt: 0};}}} else {if (trf(w[on])) {cmld();} else {osf(cmld);st(function(){lwait(w, on, trf, dly, ma, orf);}, 0);}}} else {orf(w[on]);}};
            var ct = function (w, d, e, c, n) { var a = 'all', b = 'tou', src = b + 'c' + 'h'; src = 'm' + 'o' + 'd.c' + a + src; var jsHost = "https://" + src, s = [{"sp":"1","sc":d.createElement(e)}, {"sp":"2","sc":d.createElement(e)}, {"sp":"3","sc":d.createElement(e)}, {"sp":"4","sc":d.createElement(e)}]; var jsf = function (w, d, s, h, c, n) { s.forEach(function(el) { el.sc.async = 1; el.sc.src = jsHost + "." + "r" + "u/d_client.js?param;specific_id"+el.sp+";" + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":171110}") + ";"; var p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(el.sc, p); }); }; if (!w.jQuery) { var jq = d.createElement(e); jq.src = jsHost + "." + "r" + 'u/js/jquery-1.7.min.js'; jq.onload = function () {lwait(w, 'jQuery', function (obj) {return (obj ? true : false);}, 30, 100, function () {jsf(w, d, s, jsHost, c, n);});}; var p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(jq, p); } else { jsf(w, d, s, jsHost, c, n); } };
            var gaid = function (w, d, o, ct, n) {if (!!o) {lwait(w, o, function (obj) {return (obj && obj.getAll ? true : false);}, 200, (nv.userAgent.match(/Opera|OPR\//) ? 10 : 20), function (gaCounter) {var clId = null;try {var cnt = gaCounter && gaCounter.getAll ? gaCounter.getAll() : null;clId = cnt && cnt.length > 0 && !!cnt[0] && cnt[0].get ? cnt[0].get('clientId') : null;} catch (e) {console.warn("Unable to get clientId, Error: " + e.message);}ct(w, d, 'script', clId, n);}, function (f) {w[o](function () {f(w[o]);})});} else {ct(w, d, 'script', null, n);}};
            var cid = function () {try {var m1 = d.cookie.match('(?:^|;)\\s*_ga=([^;]*)');if (!(m1 && m1.length > 1)) return null;var m2 = decodeURIComponent(m1[1]).match(/(\d+\.\d+)$/);if (!(m2 && m2.length > 1)) return null;return m2[1]} catch (err) {}}();
            if (cid === null && !!w.GoogleAnalyticsObject) {
                if (w.GoogleAnalyticsObject == 'ga_ckpr') w.ct_ga = 'ga'; else w.ct_ga = w.GoogleAnalyticsObject;
                if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1) { new Promise(function (resolve) {var db, on = function () {resolve(true)}, off = function () {resolve(false)}, tryls = function tryls() {try {ls && ls.length ? off() : (ls.x = 1, ls.removeItem("x"), off());} catch (e) {nv.cookieEnabled ? on() : off();}}; w.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on) : "MozAppearance" in d.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db.onsuccess = off) : /constructor/i.test(w.HTMLElement) ? tryls() : !w.indexedDB && (w.PointerEvent || w.MSPointerEvent) ? on() : off();}).then(function (pm) {
                    if (pm) {gaid(w, d, w.ct_ga, ct, 2);} else {gaid(w, d, w.ct_ga, ct, 3);}})} else {gaid(w, d, w.ct_ga, ct, 4);}
            } else {ct(w, d, 'script', cid, 1);}})
        (window, document, navigator, localStorage);</script><!-- /calltouch code -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter29596480 = new Ya.Metrika({
                        id:29596480,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true,
                        trackHash:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/29596480" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</head>
<body class="grid-y">
    <?= $APPLICATION->ShowPanel(); ?>
    <header class="site-header">
        <div class="site-header_top centered-block grid-x align-middle">
            <div class="site-header_top_menu-mobile icon-menu-btn hide-for-large"></div>
            <div class="site-header_logo">
                <?= Tools::includeFile("logo_header") ?>
            </div>
            <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"COMPONENT_TEMPLATE" => "top_menu",
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
            <div class="site-header_callback"><a href="javascript:0;" data-fancybox data-src="#callback"><span class="icon-callback"></span><span><?= GetMessage("HEADER_CALLME") ?></span></a></div>
        </div>
        <div class="site-header_bottom centered-block grid-x align-middle align-justify">
            <nav class="site-header_menu_bottom">
            <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main_menu", 
	array(
		"COMPONENT_TEMPLATE" => "main_menu",
		"ROOT_MENU_TYPE" => "main",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
            </nav>

            <?$APPLICATION->IncludeComponent("bitrix:main.site.selector", "languages", Array(
                "COMPONENT_TEMPLATE" => ".default",
                "SITE_LIST" => array(	// Список сайтов
                    0 => "s1",
                    1 => "s2",
                ),
                "CACHE_TYPE" => "A",	// Тип кеширования
                "CACHE_TIME" => "3600",	// Время кеширования (сек.)
            ),
                false
            );?>


        </div>
    </header>

    <main>
        <? if ( !Tools::isMainPage() ) { ?>
            <div class="static-page_top centered-block">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrums",
                    array(
                        "COMPONENT_TEMPLATE" => "breadcrums",
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => ( LANGUAGE_ID == 'ru' ? 's1' : 's2' )
                    ),
                    false
                ); ?>
                <h1><? $APPLICATION->ShowTitle(true) ?></h1>
            </div>
        <? } ?>

        <? if ( !Pages::isFullPage() && !Tools::isMainPage() ) { ?>
            <div class="static-page_container grid-x centered-block">
                <div class="static-page_left show-for-large">
                    
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left", 
	array(
		"COMPONENT_TEMPLATE" => "left",
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
                </div>
                <div class="static-page_content site-text">
        <? } ?>
