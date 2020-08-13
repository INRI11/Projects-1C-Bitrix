<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="site-menu_left">
	<ul>

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?
	$cssClass = $arItem["PARAMS"]["cssClass"] != ''  ? $arItem["PARAMS"]["cssClass"] : '' ;
	?>

		<?if ($arItem["IS_PARENT"]):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?= ( $arItem["SELECTED"] ? "current-page" : NULL ) ?>" ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<ul >
			<?else:?>
				<li class="<?=$cssClass?> <?= ( $arItem["SELECTED"] ? "current-page" : NULL ) ?>" ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<ul >
			<?endif?>

		<?else:?>

			<?if ($arItem["PERMISSION"] > "D"):?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="<?= ( $arItem["SELECTED"] ? "current-page" : NULL ) ?>" ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li class="<?=$cssClass?> <?= ( $arItem["SELECTED"] ? "current-page" : NULL ) ?>" ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>

			<?else:?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="<?= ( $arItem["SELECTED"] ? "current-page" : NULL ) ?>" ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li class="<?=$cssClass?> <?= ( $arItem["SELECTED"] ? "current-page" : NULL ) ?>" ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>

			<?endif?>

		<?endif?>

		<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

	<?endforeach?>

	<?if ($previousLevel > 1)://close last item tags?>
		<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
	<?endif?>

		</ul>
	</nav>
<?endif?>