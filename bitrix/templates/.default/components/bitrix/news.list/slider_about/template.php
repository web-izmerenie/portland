<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="page-heading-slider">	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$arPhoto = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>1840, 'height'=>679), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<div class="page-header-slider-item"><img src="<?=$arPhoto['src']?>" alt="<?=$arItem["NAME"]?>" width="1840" height="679" class="page-header-slider-item-photo"></div>	
<?endforeach;?>
</div>