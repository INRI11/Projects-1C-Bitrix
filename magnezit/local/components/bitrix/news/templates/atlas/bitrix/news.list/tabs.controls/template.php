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
<ul class="tabs__controls">
    <?foreach($arResult["ITEMS"] as $clef => $arItem):?>
        <? $iKey = $clef + 1;
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li class="tabs__controls-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <button class="tabs__controls-button <?if($iKey==1):?>tabs__controls-button--active<?endif;?>" data-tabs-btn="<?= $iKey ?>"><?=$arItem['NAME']?></button>
            <?if(!empty($arItem['PREVIEW_TEXT'])):?>
                <p class="tabs__controls-descr" <?if($iKey==1):?>style="display: block;" <?endif;?>><?= $arItem['PREVIEW_TEXT'] ?></p>
            <?endif;?>
        </li>
    <?endforeach;?>
</ul>