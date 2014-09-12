<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>

<?
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");

if($_REQUEST["productid"] && $_REQUEST["ajaxaction"] == 'add'){
    Add2BasketByProductID($_REQUEST["productid"], 1, array());
}
/*
if($_REQUEST["ajaxdeleteid"] && $_REQUEST["ajaxaction"] == 'delete'){
    CSaleBasket::Delete($_REQUEST["ajaxdeleteid"]);
}
*/
if($_REQUEST["productid"] && $_REQUEST["quantity"] && $_REQUEST["ajaxaction"] == 'update'){	
	$arBasketItems = AICatalog::GetBasketItems();
	$product_id = $arBasketItems[$_REQUEST["productid"]]['ID'];
	if($product_id){
		$arFields = array(
		   "QUANTITY" => $_REQUEST["quantity"]
		);
		CSaleBasket::Update($product_id, $arFields);
	}
}
if($_REQUEST["productid"] && $_REQUEST["ajaxaction"] == 'delete'){	
	$arBasketItems = AICatalog::GetBasketItems();
	$product_id = $arBasketItems[$_REQUEST["productid"]]['ID'];
	if($product_id){
		CSaleBasket::Delete($product_id);
	}
}
?>
<?if($_REQUEST['small']){?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket.small",
		"",
		Array(
			"PATH_TO_BASKET" => "/basket/",
			"PATH_TO_ORDER" => "",
			"SHOW_DELAY" => "Y",
			"SHOW_NOTAVAIL" => "Y",
			"SHOW_SUBSCRIBE" => "Y"
		)
	);?>
<?}?>
<?if($_REQUEST['basket']){?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket",
		"",
		Array(
			"COLUMNS_LIST" => array("NAME"),
			"PATH_TO_ORDER" => "",
			"HIDE_COUPON" => "Y",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
			"USE_PREPAYMENT" => "N",
			"QUANTITY_FLOAT" => "N",
			"SET_TITLE" => "N",
			"ACTION_VARIABLE" => "action"
		)
	);?>
<?}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>