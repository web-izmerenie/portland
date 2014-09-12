<?
CModule::IncludeModule("iblock");
function p($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
function show_success($arMessage){
	$sResult = '';
	if(count($arMessage) > 1){
		$sResult .= '<ul>';
		foreach($arMessage as $arMessageItem){
			$sResult .= '<li>'.$arMessageItem.'</li>';
		}
		$sResult .= '</ul>';
	}else{
		$sResult .= $arMessage[0];
	}
	return $sResult;
}
function show_error($arMessage){
	$sResult = '';
	if(count($arMessage) > 1){
		$sResult .= '<ul>';
		foreach($arMessage as $arMessageItem){
			$sResult .= '<li>'.$arMessageItem.'</li>';
		}
		$sResult .= '</ul>';
	}else{
		$sResult .= $arMessage[0];
	}
	return $sResult;
}
class AIEventReport
{
	static function GetCount($iblock_id){
		if((int)$iblock_id){
			$dbSection = CIBlockSection::GetList(array(), array('IBLOCK_ID'=>$iblock_id), array('CNT_ACTIVE'=>'Y'));
			while($arSection = $dbSection->Fetch()){
				$arResult[$arSection['ID']] = $arSection['ELEMENT_CNT'];
			}
			return $arResult;
		}else{
			return array();
		}
	}
	static function GetPhoto($section_id, $iNumPage = 1, $nPageSize = 10){
		if((int)$section_id){
			$arReportResult = array();
			$dbPhoto = CIBlockElement::GetList(array('SORT'=>'ASC', 'NAME'=>'DESC'), array('IBLOCK_ID'=>9, 'ACTIVE'=>'Y', 'SECTION_ID'=>$section_id), false, array('nPageSize'=>$nPageSize, 'iNumPage'=>$iNumPage), array('ID', 'PREVIEW_PICTURE', 'NAME', 'PREVIEW_TEXT'));
			if($dbPhoto->SelectedRowsCount()){
				while($arPhoto = $dbPhoto->Fetch()){
					$arPhotoResize = CFile::ResizeImageGet($arPhoto["PREVIEW_PICTURE"], array('width'=>292, 'height'=>292), BX_RESIZE_IMAGE_EXACT, true);
					$arReportResult[$arPhoto['ID']] = array('NAME'=>$arPhoto['PREVIEW_TEXT'], 'SRC'=>$arPhotoResize['src']);
				}
			}
			return $arReportResult;
		}else{
			return array();
		}
	}
}
class AICatalog
{
	static function GetBasketItems(){
		CModule::IncludeModule("sale");
		CModule::IncludeModule("catalog");
		$arBasketItems = array();
		$dbBasketItems = CSaleBasket::GetList(
			array("NAME" => "ASC", "ID" => "ASC"),
			array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
			false,
			false,
			array("ID", "PRODUCT_ID", "QUANTITY", "PRICE")
		);
		while ($arItems = $dbBasketItems->Fetch()){
			$arBasketItems[$arItems['PRODUCT_ID']] = $arItems;
		}
		return $arBasketItems;
	}
}
AddEventHandler("subscribe", "BeforePostingSendMail", array("SubscribeHandlers", "BeforePostingSendMailHandler"));
class SubscribeHandlers
{
    function BeforePostingSendMailHandler($arFields)
    {
        $rsSub = CSubscription::GetByEmail($arFields["EMAIL"]);
        $arSub = $rsSub->Fetch();

        $arFields["BODY"] = str_replace("#SUB_ID#", $arSub["ID"], $arFields["BODY"]);
        $arFields["BODY"] = str_replace("#SUB_CONFIRM_CODE#", $arSub['CONFIRM_CODE'], $arFields["BODY"]);

        return $arFields;
    }
}
?>