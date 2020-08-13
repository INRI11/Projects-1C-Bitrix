<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["TRACKING_NUMBER"] = NULL;

$arResult["TABS"] = array();
if ( !empty( $arResult["DISPLAY_PROPERTIES"]["TABS"]["DESCRIPTION"] ) ) {
     foreach ( $arResult["DISPLAY_PROPERTIES"]["TABS"]["DESCRIPTION"] as $TABKEY => $TAB ) {
        list($tabsSection, $tabsHeader) = explode("|", $TAB);

         $text = make_clickable( $arResult["DISPLAY_PROPERTIES"]["TABS"]["~VALUE"][ $TABKEY ]["TEXT"] );

         preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)[^>]*>/", $text, $matches);

         $urls = $matches[1];
         $list = null;
         if ( $urls ) {
             foreach($urls as $link) {
                 $filename = basename($_SERVER["DOCUMENT_ROOT"].$link);
                 $filesize = filesize($_SERVER["DOCUMENT_ROOT"].$link);
                 $strKb = round($filesize/1024);
                 $list .= '
                <a class="useful-info_item_file useful-info_item_file-w100" href="'.$link.'" target="_blank">
                    <div class="useful-info_item_file_title">'.$filename.'</div>
                    <div class="useful-info_item_file_info">'.$strKb.' Kb</div>
                </a>
                ';
             }
         }

         $text = preg_replace('#<a.*>.*</a>#USi', '', $text);

        $arResult["TABS"][ $tabsSection ][] = array(
            "HEADER" => $tabsHeader,
            "TEXT" => $text,
            "LINKS" => $list
        );

    }
}

function make_clickable($text) {
    $regex = '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#';
    return preg_replace_callback($regex, function ($matches) {
        return "<a href=\'{$matches[0]}\' class='ffff'>{$matches[0]}</a>";
    }, $text);
}

// saving template name to cache array
$arResult["__TEMPLATE_FOLDER"] = $this->__folder;

// writing new $arResult to cache file
$this->__component->arResult = $arResult;
?>