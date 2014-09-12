<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach ($arResult["ITEMS"] as &$v){
	$price += (int)$v['PRICE'] * (int)$v['QUANTITY'];
	$quantity += (int)$v['QUANTITY'];
}
if(in_array($quantity, array(1))){
	$suffix = 'блюдо';
}else if(in_array($quantity, array(2, 3, 4))){
	$suffix = 'блюда';
}else if(in_array($quantity, array(5, 6, 7, 8, 9, 10))){
	$suffix = 'блюда';
}else{
	$suffix = 'блюд';
}
?>
<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="page-heading-basket">
	<div class="page-heading-basket-inner"><span class="page-heading-basket-title"><span class="page-heading-basket-title-name">Калькулятор заказа</span></span>
		<?if($quantity){?>
			<div class="page-heading-basket-info page-text">Вы выбрали<br> <b><?=$quantity?> </b><?=$suffix?> на <b><?=$price?>.—</b></div>
		<?}else{?>
			<div class="page-heading-basket-info page-text">Вы выбрали<br> <b><?=$quantity?> </b><?=$suffix?></b></div>
		<?}?>
	</div>
</a>