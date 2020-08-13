<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="tracking centered-block grid-y">
    <div class="tracking_search grid-y align-center-middle">
        <div class="tracking_search_content">
            <div class="tracking_search_title"><?= GetMessage("FORM_TITLE")?></div>
            <div class="tracking_search_posttitle"><?= GetMessage("FORM_POSTTITLE")?></div>
            <form class="tracking_search_form" method="post">
                <input type="hidden" name="form_action" value="tracking">
                <input class="tracking_search_form_input site-form_input" name="tracking_number" value="<?= $arResult["TRACKING_NUMBER"] ?>" type="text" placeholder="<?= GetMessage("FORM_TITLE")?>">
                <a class="tracking_search_form_submit site-form_submit2 site-btn site-btn_base site-btn_red" href="#">
                    <span class="icon-search"></span><span><?= GetMessage("FORM_BUTTON_NAME")?></span>
                </a>
            </form>
        </div>
    </div>

    <? if ( !empty( $arResult["TRACKING"] ) ) { ?>
        <? foreach( $arResult["TRACKING"] as $TRACKING_KEY => $TRACKING ) { ?>
            <div class="tracking_info">
                <div class="tracking_invoice">
                    <div class="tracking_invoice_main">
                        <div class="tracking_invoice_title"><span><?= GetMessage("TRACKING_WAYBILL")?>: </span><span class="tracking_invoice_title_value"><?= $TRACKING["id"] ?></span></div>
                        <div class="grid-x">
                            <div class="tracking_invoice_date"><?= $arResult["TRACKING"]["signature"]["description"] ?></div>
                            <div class="tracking_invoice_signature"><span><?= GetMessage("TRACKING_SIGNED")?>:</span><span class="tracking_invoice_signature_value"><?= $TRACKING["signature"]["signatory"] ?></span></div>
                        </div>
                        <div class="tracking_invoice_space">
                            <div class="tracking_info_space">
                                <div class="tracking_info_space_btn"><span class="icon-plus"></span></div>
                                <div class="tracking_info_space_text">
                                    <div class="tracking_info_space_count"><?= $arResult["TRACKING"]["pieces"]["showSummary"] /* value */?> <?= GetMessage("TRACKING_PIECES")?></div>
                                    <? if ( !empty( $TRACKING["pieces"]["pIds"] ) ) { ?>
                                        <? foreach ( $TRACKING["pieces"]["pIds"] as $pIds_key => $pIds ) { ?>
                                            <div class="tracking_info_space_value"><?= $pIds ?></div>
                                        <? } ?>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tracking_invoice_path">
                        <div class="tracking_invoice_path_item tracking_invoice_path_departure">
                            <div class="tracking_invoice_path_title"><?= GetMessage("TRACKING_ORIGIN")?>:</div>
                            <div class="tracking_invoice_path_value"><?= $TRACKING["origin"]["value"] ?></div>
                        </div>
                        <div class="tracking_invoice_path_separate icon-arrow-right"></div>
                        <div class="tracking_invoice_path_item tracking_invoice_path_destination">
                            <div class="tracking_invoice_path_title"><?= GetMessage("TRACKING_DESTINATION")?>:</div>
                            <div class="tracking_invoice_path_value"><?= $TRACKING["destination"]["value"] ?></div>
                        </div>
                    </div>
                </div>

                <? if ( !empty( $TRACKING ) ) { ?>
                    <? foreach ( $TRACKING["checkpoints"] as $checkpoint_date => $checkpoints ) { ?>
                        <div class="tracking-table">
                            <div class="tracking-table_header">
                                <div class="tracking-table_tr">
                                    <div class="tracking-table_td tracking-table_td_header_msg"><?= $checkpoint_date ?></div>
                                    <div class="tracking-table_td tracking-table_td_header_location"><?= GetMessage("TRACKING_CHECKPOINT_LOCATION")?></div>
                                    <div class="tracking-table_td tracking-table_td_header_time"><?= GetMessage("TRACKING_CHECKPOINT_TIME")?></div>
                                    <div class="tracking-table_td tracking-table_td_header_space"><?= GetMessage("TRACKING_CHECKPOINT_PIECES")?></div>
                                </div>
                            </div>
                            <? if ( !empty( $checkpoints ) ) { ?>
                                <div class="tracking-table_body">
                                    <? foreach ( $checkpoints as $checkpoint_key => $checkpoint) { ?>
                                        <div class="tracking-table_tr">
                                            <div class="tracking-table_td tracking-table_td_number"><?= $checkpoint["counter"] ?></div>
                                            <div class="tracking-table_td tracking-table_td_msg"><?= $checkpoint["description"] ?></div>
                                            <div class="tracking-table_td tracking-table_td_location"><?= $checkpoint["location"] ?></div>
                                            <div class="tracking-table_td tracking-table_td_time"><?= $checkpoint["time"] ?></div>
                                            <div class="tracking-table_td tracking-table_td_space">
                                                <div class="tracking_info_space">
                                                    <div class="tracking_info_space_btn"><span class="icon-plus"></span></div>
                                                    <div class="tracking_info_space_text">
                                                        <div class="tracking_info_space_count"><?= $checkpoint["totalPieces"] ?> <?= GetMessage("TRACKING_PIECES")?></div>
                                                        <? if ( !empty( $checkpoint["pIds"] ) ) { ?>
                                                            <? foreach ( $checkpoint["pIds"] as $pIds_key => $pIds ) { ?>
                                                                <div class="tracking_info_space_value"><?= $pIds ?></div>
                                                            <? } ?>
                                                        <? } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                            <? } ?>
                        </div>
                    <? } ?>
                <? } ?>
            </div>

        <? } ?>
    <? } elseif ( !empty( $arResult["ERRORS_TEXT"] ) ) { ?>
        <div class="tracking_info">
            <div class="tracking_invoice">
                <div class="tracking_error_title"><?= GetMessage("TRACKING_ERRORS_TITLE")?></div>
                <div class="tracking_error_text"><b><?= $arResult["TRACKING_NUMBER"] ?> (<?= GetMessage("TRACKING_ERRORS_NOTFOUND") ?>):</b> <?= $arResult["ERRORS_TEXT"] ?></div>
            </div>
        </div>

    <? } ?>


    <div class="loader_wrapper">
        <div class="loader">
            <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
