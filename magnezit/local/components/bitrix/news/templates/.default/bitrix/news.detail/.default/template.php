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
?>
<div class="main__container">
    <aside class="main__aside">
        <div class="aside-head">
            <div class="aside-head__top">
                <p class="aside-head__title"><?=GetMessage('SECTIONS_TITLE_ASIDE')?>:</p>
            </div>
            <?if(!empty($arResult['SECTIONS'])):?>
                <div class="aside-head__bottom">
                    <select class="js-select select js-sections-list" name="select" onChange="obSections.onChangeSection(this);">
                        <?foreach ($arResult['SECTIONS'] as $ID => $arSection):?>
                            <option value="<?=$arSection['SECTION_PAGE_URL']?>" <?=($ID==$arResult['IBLOCK_SECTION_ID']?"selected=selected":NULL)?> ><?=$arSection['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            <?endif; ?>
        </div>
        <nav class="aside-nav">
            <?if(!empty($arResult['ELEMENTS'])):?>
                <ul class="aside-nav__list">
                    <? foreach ($arResult['ELEMENTS'] as $arElement):?>
                        <li class="aside-nav__list-item">
                            <a class="aside-nav__list-href <?=($arElement['ID']==$arResult['ID']?'aside-nav__list-href--active':NULL)?>" href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']?></a>
                        </li>
                    <?endforeach;?>
                </ul>
                <select class="aside-nav__select select2 select2--light js-select" onChange="obSections.onChangeElement(this);">
                    <? foreach ($arResult['ELEMENTS'] as $arElement):?>
                        <option value="<?=$arElement['DETAIL_PAGE_URL']?>" <?=($arElement['ID']==$arResult['ID']?'selected':NULL)?>><?=$arElement['NAME']?></option>
                    <?endforeach;?>
                </select>
            <?endif;?>
        </nav>
    </aside>
    <div class="main__content">
        <section class="page">
            <div class="page__top"><a class="page__all-section" href="/"><?=GetMessage('SECTIONS_ALL_SECTIONS')?></a>
                <div class="page__buttons">
                    <?if(isset($arResult['SECTION_PREV'])):?>
                        <a class="page__button page__button--prev" href="<?=$arResult['SECTION_PREV']['SECTION_PAGE_URL']?>"></a>
                    <?endif;?>
                    <?if(isset($arResult['SECTION_NEXT'])):?>
                        <a class="page__button page__button--next" href="<?=$arResult['SECTION_NEXT']['SECTION_PAGE_URL']?>"></a>
                    <?endif;?>
                </div>
            </div>
            <div class="page__content">
                <div class="page__container">
                    <p class="page__suptitle">Раздел <?= $arResult['IBLOCK_SECTION_ID'] ?>. <?= $arResult['SECTIONS'][ $arResult['IBLOCK_SECTION_ID'] ]['NAME'] ?></p>
                    <h1 class="page__title"><?=$arResult["NAME"]?></h1>
                    <div class="page__text text">
                        <?= $arResult['DETAIL_TEXT']?>
                    </div>
                </div>
            </div>
            <div class="page__bottom">
                <?if(!empty($arResult['NEXT']['ID'])):?>
                    <a class="page__next-section" href="<?=$arResult['NEXT']['DETAIL_PAGE_URL']?>"><?=$arResult['NEXT']['NAME']?></a>
                <?endif;?>
            </div>
        </section>
    </div>
</div>
