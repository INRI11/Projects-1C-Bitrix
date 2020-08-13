<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Для корпоративных клиентов");
?>

<?$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    array(
        'AREA_FILE_SHOW' => 'file',
        'PATH' => SITE_TEMPLATE_PATH . "/include/ru/forclient_page.php",
        'COMPOSITE_FRAME_TYPE' => 'AUTO',
        'COMPONENT_TEMPLATE' => '.default',
        'COMPOSITE_FRAME_MODE' => 'A',
    ),
    false,
    array("HIDE_ICONS" => "Y")
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>