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
$arPhoto = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>360, 'height'=>240), BX_RESIZE_IMAGE_EXACT, true);
?>
<?
$arBasketItems = AICatalog::GetBasketItems();
?>
<div itemscope itemtype="http://schema.org/Product" class="product">
  <div class="product-photo-holder"><img src="<?=$arPhoto['src']?>" alt="Гранд канапе Норге" itemprop="image" width="760" height="506" class="product-photo"></div>
  <div class="product-info">
	<div class="product-info-item product-info-item--left">
	  <div itemprop="name" class="product-name"><?=$arResult['NAME']?></div>
	  <div itemprop="description" class="product-description page-text"><?=$arResult['DETAIL_TEXT']?></div>
	  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="product-price"><span><?=$arResult['MIN_PRICE']['DISCOUNT_VALUE']?>.—</span>
		<meta itemprop="availability" content="http://schema.org/InStock">
	  </div>
	</div>
	<div class="product-info-item product-info-item--right product-actions"><!--noindex-->
	  <div class="product-action-item-holder">
		
		<a <?=($arBasketItems[$arResult['ID']] ? 'style="display:none;"' : NULL)?> data-productid="<?=$arResult['ID']?>" data-ajax="small" href="<?=$arResult['ADD_URL']?>" rel="nofollow" title="Добавить блюдо к заказу" class="product-action-item--add product-action-item custom-btn custom-btn--red custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Добавить</span></a>
		<div <?=($arBasketItems[$arResult['ID']] ? 'style="display:block;"' : 'style="display:none;"')?> class="product-action-item product-action-item--count">
			<input type="text" data-productid="<?=$arResult['ID']?>" data-ajax="small" data-min="1" data-max="10" data-class="custom-btn custom-btn--large custom-btn--light" value="<?=((int)$arBasketItems[$arResult['ID']]['QUANTITY'] ? (int)$arBasketItems[$arResult['ID']]['QUANTITY'] : 1)?>" class="calculator-item-quantity custom-form-item-spinner">
		</div>
	  </div><!--/noindex-->
	  <div class="product-action-item-holder"><a href="<?=$arResult['SECTION']['SECTION_PAGE_URL']?>" title="Закрыть" class="product-action-item custom-btn custom-btn--white custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Закрыть</span></a></div>
	</div>
  </div>
</div>
<?
#p($arResult);
?>