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
<section class="atlas common-wrap">
    <div class="atlas__container container">
        <h1 class="atlas__title title"><?= $arParams['PAGE_TITLE']?></h1>
        <? if (0 < $arResult["SECTIONS_COUNT"]): ?>
            <ul class="atlas__items">
                <? foreach ($arResult['SECTIONS'] as &$arSection):
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                    ?>
                    <li class="atlas__item">
                        <a class="atlas__item-href" href="<?=$arSection['SECTION_PAGE_URL']?>">
                            <span class="atlas__item-overimg">
                                <img class="atlas__item-img" src="<?= $arSection['PICTURE']['SRC'] ?>" alt="" role="presentation"/>
                            </span>
                            <span class="atlas__item-name"><?= $arSection['NAME'] ?></span>
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
</section>