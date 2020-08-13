<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if ($arResult["isFormNote"] != "Y") { ?>

    <?=$arResult["FORM_HEADER"]?>

    <div class="for-clients_form site-form">

        <?if ($arResult["isFormErrors"] == "Y"):?>
            <p><font class="errortext">
                    <?/* $arResult["FORM_ERRORS_TEXT"]; */ ?>
                    <?= GetMessage("FORM_FIELD_ERROR") ?>
            </font></p>
        <?endif;?>

        <?=$arResult["FORM_NOTE"]?>
        <div class="site-form_group">
            <? $amout_filed = NULL;
            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                $caption = $arQuestion["CAPTION"];
                $HTML_CODE = $arQuestion["HTML_CODE"];
                if ( $FIELD_SID == "FIRST_NAME" )  $caption = GetMessage("FORM_FIELD_FIRST_NAME");
                if ( $FIELD_SID == "LAST_NAME" )  $caption = GetMessage("FORM_FIELD_LAST_NAME");
                if ( $FIELD_SID == "PHONE" ) {
                    $caption = GetMessage("FORM_FIELD_PHONE");
                    $HTML_CODE = str_replace('type="text"', 'type="tel"', $HTML_CODE);
                }
                if ( $FIELD_SID == "EMAIL" )  $caption = GetMessage("FORM_FIELD_EMAIL");
                if ( $FIELD_SID == "COMPANY" )  $caption = GetMessage("FORM_FIELD_COMPANY");
                if ( $FIELD_SID == "ADDRESS" )  $caption = GetMessage("FORM_FIELD_ADDRESS");
                if ( $FIELD_SID == "INDEX" )  $caption = GetMessage("FORM_FIELD_INDEX");
                if ( $FIELD_SID == "CITY" )  $caption = GetMessage("FORM_FIELD_CITY");
                if ( $FIELD_SID == "AMOUNT" ) {
                    $amout_filed = $HTML_CODE;
                    break;
                }

                preg_match_all('~<(?:input).*?value="([^"]*)".*?\/>~', $HTML_CODE, $matches);
                if ( !empty( $matches[1][0] ) ){
                    $HTML_CODE = str_replace("site-form_item_input", "site-form_item_input noempty", $HTML_CODE);
                }

                ?>
                <div class="site-form_group_item">
                    <label class="site-form_item">
                        <?= $HTML_CODE ?><span class="site-form_item_hint"><?=$caption?></span>
                    </label>
                </div>
            <? } ?>
        </div>

        <?= $amout_filed ?>


        <? if($arResult["isUseCaptcha"] == "Y") { ?>
            <label class="site-form_item">
                <?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?>
                <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
                <?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
                <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
            </label>
        <? } ?>

        <div class="site-form_footer">
            <label class="site-form_personal-data">
                <input type="checkbox" checked required><span class="site-form_personal-data_checkbox"></span>
                <span class="site-form_personal-data_text"><?= GetMessage("FORM_AGREE_BEGIN"); ?><a href="<?= ( LANGUAGE_ID == "ru" ? I_AGREE_LINK_RU : I_AGREE_LINK_EN )  ?>" target="_blank"><?= GetMessage("FORM_AGREE_END"); ?></a></span>
            </label>


            <input class="callback_form_submit site-form_submit site-btn  site-btn_base site-btn_red" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?= GetMessage("FORM_SEND") ?>" />


            <button class="callback_form_submit site-form_submit site-btn site-btn_base site-btn_red" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" >
                <span class="icon-btn-check"></span>
                <span><?= GetMessage("FORM_SEND") ?></span>
            </button>

        </div>



    </div>

    <?=$arResult["FORM_FOOTER"]?>

<? } //endif (isFormNote) ?>