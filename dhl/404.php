<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
$sapi_type = php_sapi_name();
if ($sapi_type=="cgi")
    header("Status: 404");
else
    header("HTTP/1.1 404 Not Found");
@define("ERROR_404","Y");
//Тут уже подключение верней части шаблона и присваивание заголовка

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - HTTP not found"); ?>

    <p>Запрашиваемая вами страница не найдена.</p>
    <p>Воспользуйтесь основным меню сайта или перейдите на <a href="/">главную</a> страницу сайта.</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>