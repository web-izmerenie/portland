<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="thumb-slider">
  <div class="thumb-slider-heading">
	<h2 class="thumb-slider-heading-name"><?=$arResult['NAME']?></h2>
  </div>
  <div class="thumb-slider-list">
	<div class="thumb-slider-list-inner">	 
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$arPhoto = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>270, 'height'=>270), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<div class="thumb-slider-item">
		<div class="thumb-slider-item-photo-holder"><img src="<?=$arPhoto['src']?>" alt="<?=$arItem["NAME"]?>" width="270" height="270" class="thumb-slider-item-photo"></div>
		<div class="thumb-slider-item-description"><?=$arItem["PREVIEW_TEXT"]?></div>
	</div>		
<?endforeach;?>
	</div>
  </div>
</div>