<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("subscribe");
$arSuccess = array();
$arError = array();
if($_REQUEST['ADD_SUBSCRIPTION']){
	$arValues = array(
		'name' => $_REQUEST['name'],
		'email' => $_REQUEST['email']
	);
	$arFields = Array(
        "USER_ID" => false,
        "FORMAT" => "html",
        "EMAIL" => $arValues['email'],
        "ACTIVE" => "Y",
        "RUB_ID" => array(1)
    );
	$subscr = new CSubscription;
    $ID = $subscr->Add($arFields);
    if($ID>0){
        CSubscription::Authorize($ID);
		$arSuccess[] = 'На ваш E-mail отправлено письмо для подвтерждения подписки';
    }else{
        $arError[] = 'Введен неверный код';
	}	
}
?>
<form action="/subscription/empty.php" method="post" class="popup-panel popup-panel--white custom-form">
  <div class="popup-panel-top panel-white-top-icon-inner panel-white-lt-icon-before panel-white-rt-icon-after"></div>
  <fieldset class="popup-panel-content panel-white-left-icon-before panel-white-right-icon-after custom-form-content">
	<?if(count($arSuccess)){?>
		<div class="custom-form-header">
			<h2 class="custom-form-header-name">Код принят</h2>
		</div>
		<div class="custom-form-item custom-form-item--message"><?=show_success($arSuccess)?></div>
		<?/*<div class="custom-form-item custom-form-item--message" style="color:red;">Указанный E-mail уже подписан на рассылку афиши</div>*/?>
	<?}else{?>
		<input type="hidden" name="ADD_SUBSCRIPTION" value="1" />
		<div class="custom-form-header">
		  <h2 class="custom-form-header-name">Введите промокод</h2>
		</div>		
		<?if(count($arError)){?>
			<div class="custom-form-item custom-form-item--message" style="color:red;"><?=show_error($arError)?></div>
		<?}?>					
		<div class="custom-form-item">
		  <input type="text" placeholder="Имя" name="name" autocorrect="off" maxlength="100" class="custom-form-item-text">
		</div>
		<div class="custom-form-item custom-form-item--required">
		  <input type="email" value="" placeholder="E-mail" required="required" name="email" autocorrect="off" autocapitalize="off" maxlength="100" class="custom-form-item-text">
		</div>
		<div class="custom-form-item custom-form-item--actions">
		  <button type="submit" class="custom-btn custom-btn--red custom-btn--large custom-btn--uppercase"><span class="custom-btn-name">Подписаться</span></button>
		</div>
	<?}?>
  </fieldset>
  <div class="popup-panel-top panel-white-bottom-icon-inner panel-white-lb-icon-before panel-white-rb-icon-after"></div>
</form>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>