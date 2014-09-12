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
?>
<?
if($arResult['PICTURE']['SRC']){
	$APPLICATION->SetPageProperty("page_styles", "background-image: url(".$arResult['PICTURE']['SRC'].")");
}else{
	$APPLICATION->SetPageProperty("page_styles", "background: #000");
}
?>
<div class="tour-info tour-info--active">
<h1 class="tour-info-name"><?=$arResult['NAME']?></h1>
	<div class="popup-panel popup-panel--black">
	  <div class="popup-panel-top panel-dark-top-icon-inner panel-dark-lt-icon-before panel-dark-rt-icon-after"></div>
	  <div class="popup-panel-content panel-dark-left-icon-before panel-dark-right-icon-after">
		<div class="tour-text page-text page-text--white page-text--center">
		  <?=$arResult['DESCRIPTION']?>
		</div>
		<div class="tour-text tour-text--center"><span class="tour-info-hide custom-btn custom-btn--orange custom-btn--xlarge custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Скрыть описание</span></span></div>
	  </div>
	  <div class="popup-panel-bottom panel-dark-bottom-icon-inner panel-dark-lb-icon-before panel-dark-rb-icon-after"></div>
	</div>
	<div class="tour-info-show-holder"><span class="tour-info-show custom-btn custom-btn--orange custom-btn--xlarge custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Описание</span></span></div>
</div>
<div class="tour-points">
<?foreach($arResult['ITEMS'] as $arItem){?>
	<?
	$sStyle = '';
	if($arItem['PROPERTIES']['TOP']['VALUE']){
		$sStyle .= 'top:'.$arItem['PROPERTIES']['TOP']['VALUE'].'%;';
	}
	if($arItem['PROPERTIES']['RIGHT']['VALUE']){
		$sStyle .= 'right:'.$arItem['PROPERTIES']['RIGHT']['VALUE'].'%;';
	}
	if($arItem['PROPERTIES']['BOTTOM']['VALUE']){
		$sStyle .= 'bottom:'.$arItem['PROPERTIES']['BOTTOM']['VALUE'].'%;';
	}
	if($arItem['PROPERTIES']['LEFT']['VALUE']){
		$sStyle .= 'left:'.$arItem['PROPERTIES']['LEFT']['VALUE'].'%;';
	}
	?>
	<a href="#" style="<?=$sStyle?>" class="tour-point-item"><span class="tour-point-item-name star-icon-after"><?=$arItem['ITEMS']?></span></a>
<?}?>
</div>