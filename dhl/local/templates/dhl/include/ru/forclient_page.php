<div class="for-clients_top">
    <img class="for-clients_top_img" src="<?= SITE_TEMPLATE_PATH.TEMPLATE_PATH_IMG?>/for-ckients-top.png" alt="">
    <div class="for-clients_top_inner centered-block">
        <div class="for-clients_top_text">
            <h2><?= Tools::includeFile("forclient_header_name") ?></h2>
            <div class="for-clients_top_desc">
                <?= Tools::includeFile("forclient_header_desc") ?>
                <?= Tools::includeFile("forclient_header_text") ?>
            </div>
        </div>
    </div>
</div>


<div class="for-clients_form_wrapper centered-block">
    <div class="for-clients_form_text"><?= Tools::includeFile("forclient_form_name") ?></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form",
        "open_bill",
        array(
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "CHAIN_ITEM_LINK" => "",
            "CHAIN_ITEM_TEXT" => "",
            "EDIT_ADDITIONAL" => "N",
            "EDIT_STATUS" => "Y",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "NOT_SHOW_FILTER" => array(
                0 => "",
                1 => "",
            ),
            "NOT_SHOW_TABLE" => array(
                0 => "",
                1 => "",
            ),
            "RESULT_ID" => "",
            "SEF_MODE" => "N",
            "SHOW_ADDITIONAL" => "N",
            "SHOW_ANSWER_VALUE" => "N",
            "SHOW_EDIT_PAGE" => "Y",
            "SHOW_LIST_PAGE" => "Y",
            "SHOW_STATUS" => "Y",
            "SHOW_VIEW_PAGE" => "Y",
            "START_PAGE" => "new",
            "SUCCESS_URL" => "",
            "USE_EXTENDED_ERRORS" => "N",
            "WEB_FORM_ID" => "2",
            "COMPONENT_TEMPLATE" => "open_bill",
            "VARIABLE_ALIASES" => array(
                "action" => "action",
            )
        ),
        false
    );?>
</div>


<div class="for-clients_text centered-block"><?= Tools::includeFile("forclient_text") ?></div>