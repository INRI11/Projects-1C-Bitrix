<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["TRACKING_NUMBER"] = NULL;
if ( $_POST["form_action"] == "tracking" ) {
    $tracking_number = @$_POST["tracking_number"];
    $tracking_number = str_replace(' ', '', $tracking_number);
    $arResult["TRACKING_NUMBER"] = trim( $tracking_number );


    $objJson = file_get_contents(TRACKING_SERVER_QUERY.$tracking_number);

    if ( $objJson ) {
        $shipmentTracking = json_decode( $objJson, true );
        if ( !empty( $shipmentTracking["results"] ) ) {
            foreach ( $shipmentTracking["results"] as $key => $Tracking ) {
                $arResult["TRACKING"][$key]["id"] = $Tracking["id"];
                $arResult["TRACKING"][$key]["origin"] = $Tracking["origin"];
                $arResult["TRACKING"][$key]["destination"] = $Tracking["destination"];
                $arResult["TRACKING"][$key]["signature"] = $Tracking["signature"];
                $arResult["TRACKING"][$key]["pieces"] = $Tracking["pieces"];

                if ( !empty( $Tracking["checkpoints"] ) ) {
                    foreach ( $Tracking["checkpoints"] as $checkpoints_key => $checkpoint ) {
                        $arResult["TRACKING"][$key]["checkpoints"][ $checkpoint["date"] ][ $checkpoint["counter"] ] = $checkpoint;
                    }
                }
            }
        } else {
            $arResult["ERRORS_TEXT"] = GetMessage("TRACKING_ERRORS");
        }

    }
}

// saving template name to cache array
$arResult["__TEMPLATE_FOLDER"] = $this->__folder;

// writing new $arResult to cache file
$this->__component->arResult = $arResult; 
?>