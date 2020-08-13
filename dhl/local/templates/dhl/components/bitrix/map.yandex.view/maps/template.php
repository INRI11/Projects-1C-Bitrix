<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);

if ($arParams['BX_EDITOR_RENDER_MODE'] == 'Y'):
?>
<img src="/bitrix/components/bitrix/map.yandex.view/templates/.default/images/screenshot.png" border="0" />
<?
else:

	$arTransParams = array(
		'KEY' => $arParams['KEY'],
		'INIT_MAP_TYPE' => $arParams['INIT_MAP_TYPE'],
		'INIT_MAP_LON' => $arResult['POSITION']['yandex_lon'],
		'INIT_MAP_LAT' => $arResult['POSITION']['yandex_lat'],
		'INIT_MAP_SCALE' => $arResult['POSITION']['yandex_scale'],
		'MAP_WIDTH' => $arParams['MAP_WIDTH'],
		'MAP_HEIGHT' => $arParams['MAP_HEIGHT'],
		'CONTROLS' => $arParams['CONTROLS'],
		'OPTIONS' => $arParams['OPTIONS'],
		'MAP_ID' => $arParams['MAP_ID'],
		'LOCALE' => $arParams['LOCALE'],
		'ONMAPREADY' => 'BX_SetPlacemarks_'.$arParams['MAP_ID'],
	);

	if ($arParams['DEV_MODE'] == 'Y')
	{
		$arTransParams['DEV_MODE'] = 'Y';
		if ($arParams['WAIT_FOR_EVENT'])
			$arTransParams['WAIT_FOR_EVENT'] = $arParams['WAIT_FOR_EVENT'];
	}
?>
<script type="text/javascript">
function BX_SetPlacemarks_<?echo $arParams['MAP_ID']?>(map)
{
	if(typeof window["BX_YMapAddPlacemark"] != 'function')
	{
		/* If component's result was cached as html,
		 * script.js will not been loaded next time.
		 * let's do it manualy.
		*/

		(function(d, s, id)
		{
			var js, bx_ym = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "<?=$templateFolder.'/script.js'?>";
			bx_ym.parentNode.insertBefore(js, bx_ym);
		}(document, 'script', 'bx-ya-map-js'));

		var ymWaitIntervalId = setInterval( function(){
				if(typeof window["BX_YMapAddPlacemark"] == 'function')
				{
					BX_SetPlacemarks_<?echo $arParams['MAP_ID']?>(map);
					clearInterval(ymWaitIntervalId);
				}
			}, 300
		);

		return;
	}

	var arObjects = {PLACEMARKS:[],POLYLINES:[]};
<?
	if (is_array($arResult['POSITION']['PLACEMARKS']) && ($cnt = count($arResult['POSITION']['PLACEMARKS']))):
		for($i = 0; $i < $cnt; $i++):
?>
	arObjects.PLACEMARKS[arObjects.PLACEMARKS.length] = BX_YMapAddPlacemark(map, <?echo CUtil::PhpToJsObject($arResult['POSITION']['PLACEMARKS'][$i])?>);
<?
		endfor;
	endif;
	if (is_array($arResult['POSITION']['POLYLINES']) && ($cnt = count($arResult['POSITION']['POLYLINES']))):
		for($i = 0; $i < $cnt; $i++):
?>
	arObjects.POLYLINES[arObjects.POLYLINES.length] = BX_YMapAddPolyline(map, <?echo CUtil::PhpToJsObject($arResult['POSITION']['POLYLINES'][$i])?>);
<?
		endfor;
	endif;

	if ($arParams['ONMAPREADY']):
?>
	if (window.<?echo $arParams['ONMAPREADY']?>)
	{
		window.<?echo $arParams['ONMAPREADY']?>(map, arObjects);
	}
<?
	endif;
?>
    window.globalObj = arObjects;

}
</script>


    <div class="contacts_content">
        <div class="contacts_map">
            <?
            $APPLICATION->IncludeComponent('bitrix:map.yandex.system', '.default', $arTransParams, false, array('HIDE_ICONS' => 'Y'));
            ?>
        </div>
        <div class="contacts_search_wrapper centered-block">
            <div class="contacts_search">
                <form class="contacts_search_form" method="post">
                    <input type="hidden" name="contacts_action" value="search">
                    <label>
                        <span class="contacts_search_form_label">Введите город</span>
                        <input class="contacts_search_form_input" type="text" placeholder="Город" name="contacts_query" value="<?= $arResult["DEFAULT_CITY"] ?>" required>
                    </label>
                    <a class="contacts_search_form_submit site-form_submit2 site-btn site-btn_base site-btn_red" href="#">
                        <span class="icon-search"></span><span>Поиск</span>
                    </a>
                    <input type="submit" style="display: none;">
                </form>
            </div>
        </div>

        <div class="contacts_list centered-block grid-x">
            <div class="contacts_list_left">
                <div class="contacts_list_item">
                    <div class="contacts_list_item_city"><?= $arResult["DEFAULT_CITY"] ?></div>

                    <? if ( !empty( $arResult["ADDRESS_LIST"] ) ) { ?>
                        <div class="contacts_list_item_values grid-x">
                            <? foreach ( $arResult["ADDRESS_LIST"] as $ITEM ) { ?>
                                <div class="contacts_item">
                                    <div class="contacts_item_mark"><?= $ITEM["NAME"] ?></div>
                                    <div class="contacts_item_address"><?= $ITEM["ADDRESS"] ?></div>
                                    <div class="contacts_item_worktime"><?= $ITEM["WORKTIME"] ?></div>
                                    <a class="contacts_item_link contacts_show-on-map js-map" href="#" data-lon="<?= $ITEM["LON"] ?>" data-lat="<?= $ITEM["LAT"] ?>" data-pid="<?= $ITEM["PID"] ?>" >Показать на карте</a>
                                </div>
                            <? } ?>
                        </div>
                    <? } ?>
                </div>

            </div>
            <div class="contacts_list_right">
                <? if ( !empty( $arResult["MAIN_OFFICE"] ) ) { ?>
                    <? foreach ( $arResult["MAIN_OFFICE"] as $MAIN_ITEM ) { ?>
                        <div class="contacts_main">
                            <div class="contacts_main_info-top">
                                <div class="contacts_main_title"><?= $MAIN_ITEM["NAME"] ?></div>
                                <div class="contacts_main_subtitle"><?= $MAIN_ITEM["PREVIEW_TEXT"] ?></div>
                            </div>
                            <div class="contacts_main_info-bottom">
                                <div class="contacts_main_address"><?= $MAIN_ITEM["ADDRESS"] ?></div>
                                <a class="contacts_main_link contacts_show-on-map js-map" href="#" data-lon="<?= $MAIN_ITEM["LON"] ?>" data-lat="<?= $MAIN_ITEM["LAT"] ?>" data-pid="<?= $MAIN_ITEM["PID"] ?>" >Показать на карте</a>
                            </div>
                        </div>
                    <? } ?>
                <? } ?>
            </div>
        </div>
    </div>

<?
endif;
?>