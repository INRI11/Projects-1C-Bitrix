<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
        <? if ( !Pages::isFullPage() && !Tools::isMainPage() ) { ?>
                </div>
            </div>
        <? } ?>

    </main>

    <footer class="site-footer">
        <div class="site-footer_top centered-block grid-x">
            <div class="site-footer_top_left grid-x">
                <div class="site-footer_menu cell medium-6">
                    <div class="site-footer_title"><?= GetMessage("FOOTER_ABOUT") ?></div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "about_menu",
                        array(
                            "COMPONENT_TEMPLATE" => "about_menu",
                            "ROOT_MENU_TYPE" => "bottom_about",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>



                </div>
                <div class="site-footer_menu cell medium-6">
                    <div class="site-footer_title"><?= GetMessage("FOOTER_DELIVERY") ?></div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "delivery_menu",
                        array(
                            "COMPONENT_TEMPLATE" => "delivery_menu",
                            "ROOT_MENU_TYPE" => "bottom_delivery",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
                </div>
            </div>
            <div class="site-footer_top_right grid-x align-justify">
                <div class="site-footer_social">
                    <div class="site-footer_title"><?= GetMessage("FOOTER_SOCIAL") ?></div>
                    <div class="site-footer_social_list grid-x">
                        <?= Tools::includeFile("footer_fb") ?>
                        <?= Tools::includeFile("footer_insta") ?>
                        <?= Tools::includeFile("footer_vk") ?>
                        <?= Tools::includeFile("footer_youtube") ?>
                    </div>
                </div>
                <div class="site-footer_subscription">
                    <div class="site-footer_title"><?= GetMessage("FOOTER_SUBSCRIPTION") ?></div>

                    <?$APPLICATION->IncludeComponent(
	"bitrix:sender.subscribe", 
	"subscrube", 
	array(
		"COMPONENT_TEMPLATE" => "subscrube",
		"USE_PERSONALIZATION" => "N",
		"CONFIRMATION" => "Y",
		"HIDE_MAILINGS" => "Y",
		"SHOW_HIDDEN" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N"
	),
	false
);?>

                </div>
                <div class="site-footer_info">
                    <?= Tools::includeFile("footer_text") ?>
                </div>
            </div>
        </div>
        <div class="site-footer_bottom centered-block">
            <div class="site-footer_copyright"><?= Tools::includeFile("footer_copyright") ?></div>
        </div>
    </footer>

    <a class="site-btn_calc" href="https://zakaz.dhl.ru/" target="_blank"><span class="icon-calc-btn"></span><span><?= GetMessage("FOOTER_CALC")?></span></a>
    <div class="site-btn_top"></div>
    <div class="popup-modal" id="callback">
        <div class="callback">
            <div class="callback_header"><?= GetMessage("FORM_CALLBACK_HEADER") ?></div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:form",
                "callback",
                Array(
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "CHAIN_ITEM_LINK" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "COMPONENT_TEMPLATE" => ".default",
                    "EDIT_ADDITIONAL" => "N",
                    "EDIT_STATUS" => "Y",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "NOT_SHOW_FILTER" => array(0=>"",1=>"",),
                    "NOT_SHOW_TABLE" => array(0=>"",1=>"",),
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
                    "VARIABLE_ALIASES" => array("action"=>"action",),
                    "WEB_FORM_ID" => "1"
                )
            );?>
        </div>
    </div>

    <div class="popup-modal" id="modcookie">
        <div class="modal-cookie">
            <div class="modal-cookie-body">
                <div class="modal-cookie-text"><?= GetMessage("MODAL_COOKIE_BODY") ?></div>
                <a href="#" class="modal-cookie-a site-btn  site-btn_base site-btn_red js-modalcookie-close">Ok</a>

            </div>
        </div>
    </div>
    <div class="mobile-block"></div>
    <?
    $APPLICATION->AddHeadScript( "https://code.jquery.com/jquery-3.3.1.min.js");
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . TEMPLATE_PATH_JS . "/foundation.min.js");
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . TEMPLATE_PATH_JS . "/slick.js");
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . TEMPLATE_PATH_JS . "/fancybox.js");
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . TEMPLATE_PATH_JS . "/jquery.maskedinput.min.js");
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . TEMPLATE_PATH_JS . "/main.js");
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . TEMPLATE_PATH_JS . "/develop.js");
    ?>

</body>
</html>