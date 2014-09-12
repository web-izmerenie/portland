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
$APPLICATION->AddChainItem($arResult['NAME']);
?>
<div id="menu" class="menu">
<?
$arBasketItems = AICatalog::GetBasketItems();
foreach($arResult['ITEMS'] as $arItem){
	?>
	<?
	$arPhoto = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array('width'=>360, 'height'=>240), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<div itemscope itemtype="http://schema.org/Product" class="menu-item">
		<div class="menu-item-inner">
		  <div class="menu-item-photo-holder"><img src="<?=$arPhoto['src']?>" alt="<?=$arItem['NAME']?>" itemprop="image" width="360" height="240" class="menu-item-photo">
			<div class="menu-item-actions">
			  <div class="menu-item-actions-holder"><!--noindex-->
				<div class="menu-item-action-item-holder">					
					<a <?=($arBasketItems[$arItem['ID']] ? 'style="display:none;"' : NULL)?> data-productid="<?=$arItem['ID']?>" data-ajax="small" href="<?=$arItem['ADD_URL']?>" rel="nofollow" title="Добавить блюдо к заказу" class="menu-item-action-item menu-item-action-item--add custom-btn custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Добавить</span></a>
					<div <?=($arBasketItems[$arItem['ID']] ? 'style="display:block;"' : NULL)?> class="menu-item-action-item menu-item-action-item--count">
						<input type="text" data-productid="<?=$arItem['ID']?>" data-ajax="small" data-min="1" data-max="10" data-class="custom-btn custom-btn--light" value="<?=((int)$arBasketItems[$arItem['ID']]['QUANTITY'] ? (int)$arBasketItems[$arItem['ID']]['QUANTITY'] : 1)?>" class="calculator-item-quantity custom-form-item-spinner">
					</div>
				</div><!--/noindex-->
				<div class="menu-item-action-item-holder"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" itemprop="url" class="menu-item-action-item menu-item-action-item--open custom-btn custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Подробнее</span></a></div>
			  </div>
			</div>
		  </div>
		  <div class="menu-item-info-holder">
			<div itemprop="name" class="menu-item-name"><?=$arItem['NAME']?></div>
			<div itemprop="name" class="menu-item-description"><?=$arItem['DETAIL_TEXT']?><?p();?></div>
			<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="menu-item-price"><span itemprop="price"><?=$arItem['MIN_PRICE']['DISCOUNT_VALUE']?>.—</span>
			  <meta itemprop="availability" content="http://schema.org/InStock">
			</div>
		  </div>
		</div>
	  </div>
	<?
}
?>
<div class="grid-sizer"></div>
            </div>