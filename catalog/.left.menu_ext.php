<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION; 
$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"IS_SEF" => "Y",
		"ID" => $_REQUEST["SECTION_ID"],
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "12",
		"SECTION_URL" => "",
		"DEPTH_LEVEL" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"SEF_BASE_URL" => "/catalog/",
		"SECTION_PAGE_URL" => "#SECTION_ID#/",
		"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#"
	)
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt); 
?>