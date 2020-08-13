<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Популярные направления");
$APPLICATION->SetPageProperty("title","Популярные направления курьерской доставки грузов и документов - DHL Express");
$APPLICATION->SetPageProperty("description","Популярные направления курьерской доставки грузов и документов - DHL Express. Узнайте стоимость отправки грузов, посылок и документов на сайте DHL Express.");
?>

        <p>Самыми популярными направлениями в России ожидаемо являются Санкт-Петербург и Москва.

        <p>Эти два города ежегодно транспортируют сотни тысяч грузов и документов, они давно заняли лидирующие позиции и не собираются их покидать.<p>
</p><p>
        Наибольший объем грузов приходится как раз на транспортировку из Москвы в Санкт-Петербург, обратная доставка занимает следующую после этой позицию.

</p><p>Также популярным направлением доставки грузов и документов является Центральная Россия.
</p><p>
        Такие города, как Тула, Орел, Белгород, Владимир, Иваново и Череповец часто принимают доставку грузов и документов из Москвы, и попадают в десятку лидеров по доставкам по России.<p>
        <p>

<?global $arrFilter;
$arrFilter = Array(
    "PROPERTY_POPULAR_VALUE" => 'Да'
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "city_list",
    array(
        "COMPONENT_TEMPLATE" => "city_list",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "13",
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
            0 => "DIRECTION",
            1 => "TOCITY",
            2 => "POPULAR",
            3 => "",
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "/dostavka/#ELEMENT_CODE#/",
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>