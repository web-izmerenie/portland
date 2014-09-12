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
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
?>
<?
$arBasketItems = AICatalog::GetBasketItems();
?>
<?
$arPhoto = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>360, 'height'=>240), BX_RESIZE_IMAGE_EXACT, true);
?>
<div class="menu-item-inner">
  <div class="menu-item-photo-holder"><img src="<?=$arPhoto['src']?>" alt="<?=$arResult['NAME']?>" itemprop="image" width="360" height="240" class="menu-item-photo">
	<div class="menu-item-actions">
	  <div class="menu-item-actions-holder"><!--noindex-->
		<div class="menu-item-action-item-holder">
			<a <?=($arBasketItems[$arResult['ID']] ? 'style="display:none;"' : NULL)?> data-productid="<?=$arResult['ID']?>" data-ajax="small" href="<?=$arResult['ADD_URL']?>" rel="nofollow" title="Добавить блюдо к заказу" class="menu-item-action-item menu-item-action-item--add custom-btn custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Добавить</span></a>
			<div <?=($arBasketItems[$arResult['ID']] ? 'style="display:block;"' : 'style="display:none;"')?> class="menu-item-action-item menu-item-action-item--count">
				<input type="text" data-productid="<?=$arResult['ID']?>" data-ajax="small" data-min="1" data-max="10" data-class="custom-btn custom-btn--light" value="<?=((int)$arBasketItems[$arResult['ID']]['QUANTITY'] ? (int)$arBasketItems[$arResult['ID']]['QUANTITY'] : 1)?>" class="calculator-item-quantity custom-form-item-spinner">
			</div>			
		</div><!--/noindex-->
		<div class="menu-item-action-item-holder"><a href="<?=$arResult['DETAIL_PAGE_URL']?>" itemprop="url" class="menu-item-action-item menu-item-action-item--open custom-btn custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Подробнее</span></a></div>
	  </div>
	</div>
  </div>
  <div itemprop="name" class="menu-item-name"><?=$arResult['NAME']?></div>
  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="menu-item-price"><span itemprop="price"><?=$arResult['MIN_PRICE']['DISCOUNT_VALUE']?>.—</span>
	<meta itemprop="availability" content="http://schema.org/InStock">
  </div>
</div>
<?
exit();
?>