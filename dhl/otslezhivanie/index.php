<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отслеживание груза");
$APPLICATION->SetPageProperty("title","DHL Express - Отслеживание груза при доставке по номеру заказа");
$APPLICATION->SetPageProperty("description","Отследите статус доставки вашего груза, отправленного компанией DHL Express. Быстро узнайте статус доставки груза на сайте по номеру заказа.");
?>

<?$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    array(
        'AREA_FILE_SHOW' => 'file',
        'PATH' => SITE_TEMPLATE_PATH . "/include/ru/tracking_page.php",
        'COMPOSITE_FRAME_TYPE' => 'AUTO',
        'COMPONENT_TEMPLATE' => '.default',
        'COMPOSITE_FRAME_MODE' => 'A',
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>