<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="popup popup--auth">
    <div class="popup__container">
        <h2 class="popup__title"><?=GetMessage('POPUP_AUTH_TITLE')?></h2>
        <p class="popup__text"><?=GetMessage('POPUP_AUTH_TEXT')?></p>
        <div class="popup__buttons">
            <a class="popup__button btn" href="#"><?=GetMessage('POPUP_AUTH_BUTTON')?></a>
            <button class="popup__close js-close-popup" type="button">
                <svg class="close-ico" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18" stroke="#E9E9E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6L18 18" stroke="#E9E9E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?=GetMessage('POPUP_AUTH_CLOSE')?>
            </button>
        </div>
    </div>
</div>