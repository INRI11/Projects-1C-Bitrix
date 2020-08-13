<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<section class="sections common-wrap">
    <div class="sections__container">
        <? if (0 < $arResult["SECTIONS_COUNT"]): ?>
            <div class="sections__items">
                <? foreach ($arResult['SECTIONS'] as &$arSection):
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                    ?>
                    <a class="sections__item" href="<?=$arSection['SECTION_PAGE_URL']?>">
                        <span class="sections__item-overimg"><img class="sections__item-img" src="<?=$arSection['PICTURE']['SRC']?>" role="presentation"/></span>
                        <span class="sections__item-title">
                            <?if(!empty($arSection['UF_SECTION_ALTER_NAME'])):?>
                                <?foreach ($arSection['UF_SECTION_ALTER_NAME'] as $clef => $sAlterName): ?>
                                    <span><?=$sAlterName?></span>
                                <?endforeach;?>
                            <?else:?>
                                <span><?=$arSection['NAME']?></span>
                            <?endif;?>
                        </span>
                    </a>
                <? endforeach; ?>
            </div>
        <? endif; ?>
    </div>
</section>