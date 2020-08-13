<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
    <ul class="nav__list">
        <? foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue; ?>
            <li class="nav__list-item">
                <a class="nav__list-href <?if($arItem["SELECTED"]):?>nav__list-href--active<?endif?>" href="<?=$arItem["LINK"]?>">
                    <span>
                        <?switch ($arItem["LINK"]):
                            case '/':?>
                                <svg class="nav-ico" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-color" d="M4.29851 6.84211L8.95522 14.5789H0L4.29851 6.84211Z"/>
                                    <path class="fill-color" d="M5.37313 5L13.2537 19L16.4776 14.5789L11.1045 5H5.37313Z" />
                                    <path class="fill-color" d="M13.2537 5L18.6269 14.5789H24L18.6269 5H13.2537Z" />
                                </svg>
                            <?break;?>
                            <?case '/dictionary/':?>
                                <svg class="nav-ico" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="stroke-color" d="M6.5 2H20V17L19 19.5L20 22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="stroke-color" d="M4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="stroke-color" d="M11 2V8L13.5 6L16 8V2" stroke-width="2" stroke-linejoin="round"/>
                                </svg>
                                <?break;?>
                            <?case '/calculations/':?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="stroke-color" x="4" y="2" width="16" height="20" rx="2" stroke-width="2"/>
                                    <rect class="fill-color" x="5" y="9" width="14" height="2"/>
                                    <rect class="fill-color" x="7" y="13" width="4" height="2"/>
                                    <rect class="fill-color" x="7" y="17" width="4" height="2"/>
                                    <rect class="fill-color" x="13" y="13" width="4" height="2"/>
                                    <rect class="fill-color" x="13" y="17" width="4" height="2"/>
                                </svg>
                                <?break;?>
                            <?case '/3d-atlas/':?>
                                <svg class="nav-ico" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="stroke-color" d="M12 2L22 8.5V15.5L12 22L2 15.5V8.5L12 2Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="stroke-color" d="M12 22V15.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="stroke-color" d="M22 8.5L12 15.5L2 8.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="stroke-color" d="M2 15.5L12 8.5L22 15.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="stroke-color" d="M12 2V8.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <?break;?>
                            <?endswitch;?>
                    </span><?=$arItem["TEXT"]?></a>
            </li>
        <?endforeach?>
    </ul>
<?endif?>