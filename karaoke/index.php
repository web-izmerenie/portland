<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Караоке");
?><?
global $arrFilter;
if($_REQUEST['SET_FILTER'] || $_REQUEST['current_month']){
	if($_REQUEST['year']){
		$arrFilter['year'] = $_REQUEST['year'];
	}
	if($_REQUEST['month']){
		$arrFilter['month'] = $_REQUEST['month'];
	}
	if($_REQUEST['current_month']){
		$arrFilter['month'] = (int)date('m');
		$arrFilter['year'] = (int)date('Y');
	}
	if($arrFilter['month'] && $arrFilter['year']){
		$arrFilter['LOGIC'] = 'AND';
		$arrFilter['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(0, 0, 0, $arrFilter['month'], 1, $arrFilter['year']),"FULL");
		$arrFilter['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(23, 59, 59, $arrFilter['month']+1, 0, $arrFilter['year']),"FULL");
	}else if($arrFilter['year']){
		$arrFilter['LOGIC'] = 'AND';
		$arrFilter['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(0, 0, 0, 1, 1, $arrFilter['year']),"FULL");
		$arrFilter['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(23, 59, 59, 1, 0, $arrFilter['year']+1),"FULL");
	}
}
?>
<?
$nPage = 6;
if(!$_REQUEST["empty"]){	
	?> <?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"board",
	Array(
		"IBLOCK_TYPE" => "about",
		"IBLOCK_ID" => "15",
		"NEWS_COUNT" => $nPage,
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_FIELD_CODE" => array("",""),
		"FILTER_PROPERTY_CODE" => array("",""),
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "NAME",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "N",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/karaoke/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
		"LIST_FIELD_CODE" => array("",""),
		"LIST_PROPERTY_CODE" => array("SPECIAL",""),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "NAME",
		"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
		"DETAIL_FIELD_CODE" => array("",""),
		"DETAIL_PROPERTY_CODE" => array("ADV","PHOTO","V_PHOTO",""),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => "board",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"VARIABLE_ALIASES" => Array(),
		"SEF_URL_TEMPLATES" => Array("news"=>"","section"=>"","detail"=>"#ELEMENT_ID#/"),
		"VARIABLE_ALIASES" => Array(
		)
	)
);?> <?}?> <?if($_REQUEST["empty"]){
	$arEventFirstIDs = array();
	$arFilterFirst = array('IBLOCK_ID'=>15, 'ACTIVE'=>'Y');
	if(count($arrFilter)){
		$arFilterResult = array_merge($arFilterFirst, $arrFilter);
	}else{
		$arFilterResult = $arFilterFirst;
	}
	$dbEventFirst = CIBlockElement::GetList(array('active_from'=>'desc'), $arFilterResult, false, array('nTopCount'=>$nPage), array('ID', 'IBLOCK_ID'));
	if($dbEventFirst->SelectedRowsCount()){
		while($arEventFirst = $dbEventFirst->Fetch()){
			$arEventFirstIDs[] = $arEventFirst['ID'];
		}
	}
	$arrFilter['!ID'] = $arEventFirstIDs;
	$nPage = 3;
	?> <?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"board",
	Array(
		"IBLOCK_TYPE" => "about",
		"IBLOCK_ID" => "15",
		"NEWS_COUNT" => $nPage,
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_FIELD_CODE" => array("",""),
		"FILTER_PROPERTY_CODE" => array("",""),
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "NAME",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "N",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/karaoke/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
		"LIST_FIELD_CODE" => array("",""),
		"LIST_PROPERTY_CODE" => array("",""),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "NAME",
		"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
		"DETAIL_FIELD_CODE" => array("",""),
		"DETAIL_PROPERTY_CODE" => array("ADV","PHOTO",""),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => "board",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"VARIABLE_ALIASES" => Array(),
		"SEF_URL_TEMPLATES" => Array("news"=>"","section"=>"","detail"=>"#ELEMENT_ID#/"),
		"VARIABLE_ALIASES" => Array(
		)
	)
);?> <?
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>