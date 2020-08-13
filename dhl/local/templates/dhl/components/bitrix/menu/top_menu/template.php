<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <nav class="site-header_menu_top">
        <ul>
            <? foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue; ?>
                <?if($arItem["SELECTED"]):?>
                    <li class="current-page"><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
                <?else:?>
                    <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                <?endif?>

                </li>
            <?endforeach?>
        </ul>
    </nav>
<?endif?>