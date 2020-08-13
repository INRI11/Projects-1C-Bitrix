<?php

CModule::IncludeModule('iblock');

$defaultCity = "";

$objResults = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>IBLOCK_CONTACTS_CITY_RU, 'ACTIVE'=>'Y', 'PROPERTY_DEFAULT_VALUE'=>'Да'), false, false, array('ID', 'NAME', "PROPERTY_CENTERMAP"));
while($row = $objResults->Fetch()) {
    $arTmp = explode(',', $row['PROPERTY_CENTERMAP_VALUE']);
    $arResult['POSITION']["yandex_lon"] = $arTmp[1];
    $arResult['POSITION']["yandex_lat"] = $arTmp[0];

    $defaultCity = $row["NAME"];
}



if ( !empty( $_COOKIE["CITY"] ) ) {
    $queryCity = @$_COOKIE["CITY"];

    $objResults = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>IBLOCK_CONTACTS_CITY_RU, 'ACTIVE'=>'Y', 'NAME'=>$queryCity), false, false, array('ID', 'NAME', "PROPERTY_CENTERMAP"));
    while($row = $objResults->Fetch()) {
        $arTmp = explode(',', $row['PROPERTY_CENTERMAP_VALUE']);
        $arResult['POSITION']["yandex_lon"] = $arTmp[1];
        $arResult['POSITION']["yandex_lat"] = $arTmp[0];

        $defaultCity = $row["NAME"];
    }
}

if ( !empty( $_POST["contacts_action"] ) && isset( $_POST["contacts_action"] ) && $_POST["contacts_action"] == "search" ) {
    if ( !empty( $_POST["contacts_query"] ) && isset( $_POST["contacts_query"] ) ) {
        $queryCity = @$_POST["contacts_query"];

        $objResults = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>IBLOCK_CONTACTS_CITY_RU, 'ACTIVE'=>'Y', 'NAME'=>$queryCity), false, false, array('ID', 'NAME', "PROPERTY_CENTERMAP"));
        while($row = $objResults->Fetch()) {
            $arTmp = explode(',', $row['PROPERTY_CENTERMAP_VALUE']);
            $arResult['POSITION']["yandex_lon"] = $arTmp[1];
            $arResult['POSITION']["yandex_lat"] = $arTmp[0];

            $defaultCity = $row["NAME"];
            setcookie("CITY", $defaultCity, time()+3600, "/", SITE_SERVER_NAME);
        }
    }
}

$count = 0;

$objResults = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>IBLOCK_CONTACTS_ADDRESS_RU, 'ACTIVE'=>'Y', 'PROPERTY_CITY.NAME'=>$defaultCity), false, false, array('ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'PROPERTY_ADDRESS', 'PROPERTY_WORKTIME', 'PROPERTY_CITY', 'PROPERTY_COORDINATES', 'PROPERTY_PHONE'));
while($row = $objResults->Fetch())
{
    $img_path = "/local/templates/dhl/assets/img/baloon.png";
    if ( !empty( $row["PREVIEW_PICTURE"] ) ) {
        $img_path = CFile::GetPath($row["PREVIEW_PICTURE"]);
    }

    $phone = preg_replace("/[^0-9+]/", '', $row["PROPERTY_PHONE_VALUE"]);
    $ballon = '<div class="ymap_baloon-custom">';
    $ballon .= '<div class="ymap_baloon-custom_content">';
    $ballon .= '<div class="ymap_baloon-custom_img"><img src="'.$img_path.'" alt=""></div>';
    $ballon .= '<div class="ymap_baloon-custom_info">';
    $ballon .= '<div class="ymap_baloon-custom_title">'.$row['NAME'].'</div>';
    $ballon .= '<div class="ymap_baloon-custom_address">'.$row["PROPERTY_ADDRESS_VALUE"].'</div>';
    $ballon .= '<div class="ymap_baloon-custom_tel"><a href="tel:'.$phone.'">'.$row["PROPERTY_PHONE_VALUE"].'</a></div>';
    $ballon .= '<div class="ymap_baloon-custom_worktime">'.$row["PROPERTY_WORKTIME_VALUE"].'</div>';
    $ballon .= '</div>';
    $ballon .= '</div>';
    $ballon .= '</div>';

    $arTmp = explode(',', $row['PROPERTY_COORDINATES_VALUE']);
    $arResult['POSITION']['PLACEMARKS'][] = array(
        'LON' => $arTmp[1],
        'LAT' => $arTmp[0],
        'TEXT' => $ballon,
    );

    $arResult["ADDRESS_LIST"][] = array(
        'NAME' => $row["NAME"],
        'ADDRESS' => $row["PROPERTY_ADDRESS_VALUE"],
        'CITY_ID' => $row["PROPERTY_CITY_VALUE"],
        'WORKTIME' => $row["PROPERTY_WORKTIME_VALUE"],
        'COORDINATES' => $row["PROPERTY_COORDINATES_VALUE"],
        'LON' => $arTmp[1],
        'LAT' => $arTmp[0],
        'PID' => $count,
    );

    $count++;
}

$arResult["DEFAULT_CITY"] = $defaultCity;

// Основной офис
$objResults = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>IBLOCK_CONTACTS_ADDRESS_RU, 'ACTIVE'=>'Y', 'PROPERTY_MAINOFFICE_VALUE'=>'Да'), false, false, array('ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'PROPERTY_ADDRESS', 'PROPERTY_WORKTIME', 'PROPERTY_CITY', 'PROPERTY_COORDINATES', 'PROPERTY_PHONE'));
while($row = $objResults->Fetch())
{
    $img_path = "/local/templates/dhl/assets/img/baloon.png";
    if ( !empty( $row["PREVIEW_PICTURE"] ) ) {
        $img_path = CFile::GetPath($row["PREVIEW_PICTURE"]);
    }

    $phone = preg_replace("/[^0-9+]/", '', $row["PROPERTY_PHONE_VALUE"]);
    $ballon = '<div class="ymap_baloon-custom">';
    $ballon .= '<div class="ymap_baloon-custom_content">';
    $ballon .= '<div class="ymap_baloon-custom_img"><img src="'.$img_path.'" alt=""></div>';
    $ballon .= '<div class="ymap_baloon-custom_info">';
    $ballon .= '<div class="ymap_baloon-custom_title">'.$row['NAME'].'</div>';
    $ballon .= '<div class="ymap_baloon-custom_address">'.$row["PROPERTY_ADDRESS_VALUE"].'</div>';
    $ballon .= '<div class="ymap_baloon-custom_tel"><a href="tel:'.$phone.'">'.$row["PROPERTY_PHONE_VALUE"].'</a></div>';
    $ballon .= '<div class="ymap_baloon-custom_worktime">'.$row["PROPERTY_WORKTIME_VALUE"].'</div>';
    $ballon .= '</div>';
    $ballon .= '</div>';
    $ballon .= '</div>';

    $arTmp = explode(',', $row['PROPERTY_COORDINATES_VALUE']);
    $arResult['POSITION']['PLACEMARKS'][] = array(
        'LON' => $arTmp[1],
        'LAT' => $arTmp[0],
        'TEXT' => $ballon,
    );

    $arResult["MAIN_OFFICE"][] = array(
        'ID' => $row["ID"],
        'NAME' => $row["NAME"],
        'PREVIEW_TEXT' => $row["PREVIEW_TEXT"],
        'ADDRESS' => $row["PROPERTY_ADDRESS_VALUE"],
        'CITY_ID' => $row["PROPERTY_CITY_VALUE"],
        'WORKTIME' => $row["PROPERTY_WORKTIME_VALUE"],
        'COORDINATES' => $row["PROPERTY_COORDINATES_VALUE"],
        'LON' => $arTmp[1],
        'LAT' => $arTmp[0],
        'PID' => $count,
    );

    $count++;
}