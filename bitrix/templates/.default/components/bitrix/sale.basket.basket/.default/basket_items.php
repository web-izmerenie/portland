<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult['ITEMS']['AnDelCanBuy'])){?>
<table class="calculator-list">
  <tbody>
	<?foreach($arResult['ITEMS']['AnDelCanBuy'] as $arItem){?>
		<tr class="calculator-item">
		  <td class="calculator-item-close-holder"><!--noindex--><a href="#" data-productid="<?=$arItem['PRODUCT_ID']?>" data-ajax="basket" title="Удалить из заказа" rel="nofollow" class="calculator-item-close custom-btn custom-btn--light"><span class="custom-btn-name close-red-icon-inner">Удалить из заказа</span></a><!--/noindex--></td>
		  <td class="calculator-item-photo-holder"><img src="<?=$arItem['DETAIL_PICTURE_SRC']?>" alt="<?=$arItem['NAME']?>" width="180" height="125" class="calculator-item-photo"></td>
		  <td class="calculator-item-name-holder"><span class="calculator-item-name"><?=$arItem['NAME']?></span></td>
		  <td class="calculator-item-price-holder"><span class="calculator-item-price"><?=$arItem['PRICE']?>.—</span></td>
		  <td class="calculator-item-quantity-holder">
			<input type="text" data-productid="<?=$arItem['PRODUCT_ID']?>" data-ajax="basket" data-min="1" data-max="10" value="<?=$arItem['QUANTITY']?>" maxlength="2" class="calculator-item-quantity custom-form-item-spinner">
		  </td>
		  <td class="calculator-item-summary-holder"><span class="calculator-item-summary"><?=$arItem['PRICE'] * $arItem['QUANTITY']?>.—</span></td>
		</tr>
	<?}?>	
  </tbody>
  <tfoot>
	<tr class="calculator-footer">
	  <td></td>
	  <td colspan="5" class="calculator-footer-info">
		<div class="calculator-footer-info-holder"><!--noindex--><a href="?print=1" rel="nofollow" class="js-print calculator-footer-info-print calculator-footer-info-item calculator-footer-info-item--left custom-btn custom-btn--red custom-btn--uppercase custom-btn--large"><span class="custom-btn-name">Распечатать заказ</span></a><!--/noindex-->
		  <div class="calculator-footer-info-summary calculator-footer-info-item calculator-footer-info-item--right"><span class="calculator-footer-info-summary-title">Итого:</span><span class="calculator-footer-info-summary-value"><?=$arResult['allSum']?>.—</span></div>
		</div>
	  </td>
	</tr>
  </tfoot>
</table>
<?}?>
<?
echo ShowError($arResult["ERROR_MESSAGE"]);
?>