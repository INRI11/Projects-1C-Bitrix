<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Magnezit\Finders\IblockPropertyFinder;

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
<ul class="tabs__list">
    <?foreach($arResult["ITEMS"] as $clef => $arItem):?>
        <? $iKey = $clef + 1;
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li class="tabs__item <?if($iKey==1):?>tabs__item--active<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-tabs-item="<?= $iKey ?>">
            <div class="tabs__content">
                <div class="tabs__content-top">
                    <p class="tabs__content-title"><?=$arItem['NAME']?></p>
                    <button class="tabs__content-btn" type="button">
                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" width="1" height="3" rx="0.5" fill="#F4F4F4"/>
                            <rect x="8" y="4" width="1" height="3" rx="0.5" fill="#F4F4F4"/>
                            <rect x="8" y="8" width="1" height="3" rx="0.5" fill="#F4F4F4"/>
                            <rect x="8" y="12" width="1" height="3" rx="0.5" fill="#F4F4F4"/>
                            <path d="M1.5 3C1.5 2.17157 2.17157 1.5 3 1.5H5C5.27614 1.5 5.5 1.72386 5.5 2V13C5.5 13.2761 5.27614 13.5 5 13.5H3C2.17157 13.5 1.5 12.8284 1.5 12V3Z" stroke="#F4F4F4"/>
                            <path d="M15.5 3C15.5 2.17157 14.8284 1.5 14 1.5H12C11.7239 1.5 11.5 1.72386 11.5 2V13C11.5 13.2761 11.7239 13.5 12 13.5H14C14.8284 13.5 15.5 12.8284 15.5 12V3Z" stroke="#F4F4F4"/>
                        </svg>
                        <?= GetMessage('ATLAS_CUTAWAY') ?>
                    </button>
                </div>
                <div class="tabs__overimg">
                    <?if(!empty($arItem['PREVIEW_PICTURE'])):?>
                        <img class="tabs__img" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="" role="presentation"/>
                    <?endif;?>
                </div>
            </div>
        </li>
    <?endforeach;?>
</ul>