<?php
/**
 * Created by PhpStorm.
 * User: SKAChels
 * Date: 19.12.2018
 * Time: 12:01
 */

$arSections = array();
$arResults["LIST"] = array();

$SectList = CIBlockSection::GetList($arSort, array("IBLOCK_ID"=>$arParams["IBLOCK_ID"],"ACTIVE"=>"Y") ,false, array("ID","IBLOCK_ID","IBLOCK_TYPE_ID","IBLOCK_SECTION_ID","CODE","SECTION_ID","NAME","SECTION_PAGE_URL"));
while ($SectListGet = $SectList->GetNext()) {
    $arSections[ $SectListGet["ID"] ] = $SectListGet;
}

if ( !empty( $arSections ) ) {
    foreach( $arSections as $KeySection => $ItemSection ) {
        $arFilter = array(
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "IBLOCK_SECTION_ID" => $KeySection,
            "INCLUDE_SUBSECTIONS" => "Y",
        );

        $arSelectedFields = Array("IBLOCK_ID","ID","NAME","PROPERTY_*");
        $res = CIBlockElement::GetList(array("ID"=>"ASC"), $arFilter, false, false, $arSelectedFields);

        while($ob_res = $res->GetNextElement()) {
            $arProps = $ob_res->GetProperties();
            $arFields = $ob_res->GetFields();

            $arResult["LIST"][ $ItemSection["NAME"] ][ $arFields["ID"] ] = $arFields;

            if ( !empty( $arProps["FILES"]["VALUE"] ) ) {
                foreach ( $arProps["FILES"]["VALUE"] as $vID ) {
                    $arFile = CFile::GetFileArray($vID);
                    $arResult["LIST"][ $ItemSection["NAME"] ][ $arFields["ID"] ]["FILES"][$vID] = $arFile;
                }
            }
        }
    }
}