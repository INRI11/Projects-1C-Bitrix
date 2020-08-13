<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if ($arResult["isFormNote"] != "Y") { ?>

    <?=$arResult["FORM_HEADER"]?>

    <div class="callback_form site-form">
        <div class="callback_form_inner">

            <?if ($arResult["isFormErrors"] == "Y"):?>
                <p><font class="errortext">
                        <?= GetMessage("FORM_FIELD_ERROR") ?>
                </font></p>
            <?endif;?>

            <?=$arResult["FORM_NOTE"]?>

            <? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                if ( $arQuestion["CAPTION"]== "Имя" )  $caption = GetMessage("FORM_FIELD_NAME");
                if ( $arQuestion["CAPTION"]== "Телефон" ) {
                    $caption = GetMessage("FORM_FIELD_PHONE");
                    $HTML_CODE = str_replace('type="text"', 'type="tel"', $arQuestion["HTML_CODE"]);
                } else {
                    $HTML_CODE = $arQuestion["HTML_CODE"];
                }
               ?>
                <label class="site-form_item">
                    <?= $HTML_CODE ?><span class="site-form_item_hint"><?=$caption?></span>
                </label>
            <? } ?>

            <? if($arResult["isUseCaptcha"] == "Y") { ?>
                <label class="site-form_item">
                    <?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?>
                    <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
                    <?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
                    <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
                </label>
            <? } ?>

            <label class="site-form_personal-data">
                <input type="checkbox" checked required><span class="site-form_personal-data_checkbox"></span>
                <span class="site-form_personal-data_text"><?= GetMessage("FORM_AGREE_BEGIN"); ?><a href="<?= ( LANGUAGE_ID == "ru" ? I_AGREE_LINK_RU : I_AGREE_LINK_EN )  ?>" target="_blank"><?= GetMessage("FORM_AGREE_END"); ?></a></span>
            </label>

            <input class="callback_form_submit site-form_submit site-btn  site-btn_base site-btn_red" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?= GetMessage("FORM_SEND") ?>" />
        </div>
    </div>

    <?=$arResult["FORM_FOOTER"]?>

<? } //endif (isFormNote) ?>