<div class="about_top">
    <div class="about_top_img"><img src="<?= SITE_TEMPLATE_PATH.TEMPLATE_PATH_IMG?>/about-top.png" alt=""></div>
    <div class="about_top_inner">
        <div class="about_top_text">
            <div class="about_top_text_title"><?= Tools::includeFile("about_header_name") ?></div>
            <div class="about_top_text_content"><?= Tools::includeFile("about_header_desc") ?></div>
        </div>
    </div>
</div>


<div class="about_content centered-block grid-x">
    <div class="about_content_quote">
        <div class="about_content_quote_top">
            <?= Tools::includeFile("about_aside_top") ?>
        </div>
        <div class="about_content_quote_desc">
            <?= Tools::includeFile("about_aside_bottom") ?>
        </div>
    </div>
    <div class="about_content_right">
        <div class="about_content_right_text site-text">
            <?= Tools::includeFile("about_content_top") ?>
        </div>
    </div>
</div>
<div class="about_content-bottom centered-block grid-x">
    <div class="about_content_right">
        <div class="about_content_right_text site-text">
            <?= Tools::includeFile("about_content_bottom") ?>
        </div>
        <?global $arrFilter;
        $arrFilter = Array(
            "PROPERTY_SHOWCOMPANY_VALUE" => 'Да'
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "aboutarticle",
            array(
                "COMPONENT_TEMPLATE" => "aboutarticle",
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "5",
                "NEWS_COUNT" => "20",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "arrFilter",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "PROPERTY_CODE" => array(
                    0 => "LINK",
                    1 => "FILE",
                    2 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "N",
                "STRICT_SECTION_CHECK" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => ""
            ),
            false
        );?>

    </div>
</div>