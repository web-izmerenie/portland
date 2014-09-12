<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подписаться на афишу");
?>
<?
CModule::IncludeModule("subscribe");
$bError = false;
$ID = $_REQUEST['ID'];
$CONFIRM_CODE = $_REQUEST['CONFIRM_CODE'];
if($_REQUEST['CONFIRM_SUBSCRIBE']){	
	if($ID > 0){
		if(CSubscription::Authorize($ID,  $CONFIRM_CODE)){
			$subscr = new CSubscription;
			if($subscr->Update($ID, array("ACTIVE"=>"Y", "CONFIRMED"=>"Y"))){	
				$arSuccess[] = 'Подписка успешно подтверждена';
			}			
		}
	}
	if(!count($arSuccess)){
		$arError[] = 'Ошибка подтверждения подписки';
	}
}
if($_REQUEST['DELETE_SUBSCRIBE']){	
	if($ID > 0){
		if(CSubscription::Authorize($ID,  $CONFIRM_CODE)){
			$subscr = new CSubscription;
			if($subscr->Update($ID, array("ACTIVE"=>"N"))){	
				$arSuccess[] = 'Подписка успешно отменена';
			}			
		}
	}
	if(!count($arSuccess)){
		$arError[] = 'Ошибка отмены подписки';
	}
}
$bAction = false;
if(count($arSuccess)){
	echo show_success($arSuccess);
	$bAction = true;
}
if(count($arError)){
	$bAction = true;
	?><div style="color:red"><?
	echo show_error($arError);
	?></div><?
}
if(!$bAction){
	$arError[] = 'Информация о подписке не найдена';
	?><div style="color:red"><?
	echo show_error($arError);
	?></div><?
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>