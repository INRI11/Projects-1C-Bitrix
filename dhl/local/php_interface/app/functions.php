<?
class Pages {
    public function pageClass() {
        global $APPLICATION;
        if ( $APPLICATION->GetCurPage(true) == SITE_DIR . "index.php" ) {
            return "page--main";
        } else {
            return "page--inside";
        }
    }

    public function PR($o, $scroll = true) {
        //вывод информации только для админа
        global $USER;
        if ($USER->IsAdmin()) {
            $bt = debug_backtrace();
            $bt = $bt[0];
            $dRoot = $_SERVER["DOCUMENT_ROOT"];
            $dRoot = str_replace("/", "\\", $dRoot);
            $bt["file"] = str_replace($dRoot, "", $bt["file"]);
            $dRoot = str_replace("\\", "/", $dRoot);
            $bt["file"] = str_replace($dRoot, "", $bt["file"]); ?>
            <? if ($scroll): ?>
                <div style='width:100%; height:200px; overflow:auto; padding:3px; border: solid 1px black;'>
            <? else: ?>
                <div style='width:100%; padding:3px; border: solid 1px black;'>
            <? endif; ?>
            <div style='padding:3px 5px; background:#99CCFF; font-weight:bold;'>File: <?=$bt["file"]?> [<?=$bt["line"]?>]</div>
            <pre style='padding:10px;'><?print_r($o)?></pre>
            </div>
        <? }
    }

    public function init_lang() {
        if ( isset( $_GET["updatelang"] ) && !empty( $_GET["updatelang"] ) ) {
            $updatelang = @$_GET["updatelang"];
            Pages::set_lang( $updatelang );
            Header("Location: /". ( $updatelang != "ru" ? $updatelang."/" : NULL ) );
        }
    }

    public function get_lang () {
        $lang = LANGUAGE_ID;
        if ( !empty( $_COOKIE["LANG"] ) ) {
            $lang = $_COOKIE["LANG"];
        }
        //return $lang;
        return LANGUAGE_ID;
    }

    public function set_lang( $lang ) {
        setcookie("LANG", $lang, time()+3600, "/", SITE_SERVER_NAME);
    }

    public function isFullPage() {
        global $APPLICATION;

        $isFullpage = $APPLICATION->GetProperty("fullpage");
        if ( $isFullpage == "Y" ) {
            return true;
        } else {
            return false;
        }
    }
}

?>