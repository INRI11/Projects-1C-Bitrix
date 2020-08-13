<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("title","Контакты - DHL Express");
$APPLICATION->SetPageProperty("description","Контактная информация компании DHL Express. Для заказа быстрой доставки по России и за рубеж  позвоните или напишите нам на электронную почту.");
?><?$APPLICATION->IncludeComponent(
    "bitrix:map.yandex.view",
    "maps",
    array(
        "COMPONENT_TEMPLATE" => "maps",
        "INIT_MAP_TYPE" => "MAP",
        "MAP_DATA" => "a:3:{s:10:\"yandex_lat\";s:7:\"55.7383\";s:10:\"yandex_lon\";s:7:\"37.5946\";s:12:\"yandex_scale\";i:10;}",
        "MAP_WIDTH" => "100%",
        "MAP_HEIGHT" => "100%",
        "CONTROLS" => array(
            0 => "ZOOM",
        ),
        "OPTIONS" => array(
            0 => "ENABLE_SCROLL_ZOOM",
            1 => "ENABLE_DBLCLICK_ZOOM",
            2 => "ENABLE_DRAGGING",
        ),
        "MAP_ID" => ""
    ),
    false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>