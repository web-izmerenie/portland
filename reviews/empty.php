<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
 
$cpt = new CCaptcha();
 
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
 
if (strlen($captchaPass) <= 0){
    $captchaPass = randString(10);
    COption::SetOptionString("main", "captcha_password", $captchaPass);
}
 
$cpt->SetCodeCrypt($captchaPass);

$arSuccess = array();
$arError = array();
if($_REQUEST['ADD_REVIEWS']){
	if($APPLICATION->CaptchaCheckCode($_REQUEST["captcha_word"], $_REQUEST["captcha_code"])){
		$el = new CIBlockElement;
		$arField = array(
			'NAME' => $_REQUEST['name'],
			'PREVIEW_TEXT' => $_REQUEST['text'],
			'ACTIVE' => 'Y',
			'IBLOCK_ID' => 4,
			'DATE_ACTIVE_FROM' => ConvertTimeStamp(time()+CTimeZone::GetOffset(), 'FULL'),
			'PROPERTY_VALUES' => array(
				'EMAIL' => $_REQUEST['email'],
				'PHONE' => $_REQUEST['tel']
			)
		);
		if($id = $el->Add($arField)){
			$arSuccess[] = 'Спасибо! Ваш отзыв принят';		
			$arEventFields = array(
				'ID' => $id,
				'NAME' => $arField['NAME'],
				'TEXT' => $arField['PREVIEW_TEXT'],
				'DATE' => $arField['DATE_ACTIVE_FROM'],
				'EMAIL' => $arField['PROPERTY_VALUES']['EMAIL'],
				'PHONE' => $arField['PROPERTY_VALUES']['PHONE']
			);
			CEvent::Send("PORTLAND_REVIEWS", 's1', $arEventFields);
		}else{
			$arError[] = $el->LAST_ERROR;
		}
}else{
    $arError[] = 'Неправильно введен код с картинки!';
}

}
?>
<form id="reviews_form" action="/reviews/empty.php" method="post" class="popup-panel popup-panel--white custom-form custom-form--small">
  <div class="popup-panel-top panel-white-top-icon-inner panel-white-lt-icon-before panel-white-rt-icon-after"></div>
  <fieldset class="popup-panel-content panel-white-left-icon-before panel-white-right-icon-after custom-form-content">
	<?if(count($arSuccess)){?>
		<div class="custom-form-header">
		  <h2 class="custom-form-header-name">Оставить отзыв</h2>
		</div>
		<div class="custom-form-item custom-form-item--message"><?=show_success($arSuccess)?></div>		
	<?}else{?>
		<input type="hidden" name="ADD_REVIEWS" value="1" />
		<div class="custom-form-header">
		  <h2 class="custom-form-header-name">Оставить отзыв</h2>
		</div>
		<?if(count($arError)){?>
			<div class="custom-form-item custom-form-item--message" style="color:red;"><?=show_error($arError)?></div>
		<?}?>
		<div class="custom-form-item custom-form-item--required">
		  <input type="text" name="name" placeholder="Имя" required="required" name="" autocorrect="off" maxlength="100" class="custom-form-item-text">
		</div>
		<div class="custom-form-item custom-form-item--required">
		  <input type="email" name="email" placeholder="E-mail" required="required" name="" autocorrect="off" autocapitalize="off" maxlength="100" class="custom-form-item-text">
		</div>
		<div class="custom-form-item custom-form-item--required">
		  <input type="tel" name="tel" placeholder="Телефон" required="required" name="" autocorrect="off" autocapitalize="off" maxlength="100" class="custom-form-item-text">
		</div>
		<div class="custom-form-item custom-form-item--required">
		  <textarea name="text" placeholder="Текст отзыва" required="required" name="" class="custom-form-item-textarea"></textarea>
		</div>
	  	<input name="captcha_code" value="<?=htmlspecialchars($cpt->GetCodeCrypt());?>" type="hidden">
	  	<img src="/bitrix/tools/captcha.php?captcha_code=<?=htmlspecialchars($cpt->GetCodeCrypt());?>">
	  	<div class="custom-form-item custom-form-item--required">
	  		<input id="captcha_word" name="captcha_word" type="text" placeholder="Символы с картинки" required="required" class="custom-form-item-text">
	  	</div>
		<div class="custom-form-item custom-form-item--actions">
		  <button type="submit" class="custom-btn custom-btn--red custom-btn--large custom-btn--uppercase"><span class="custom-btn-name">Оставить отзыв</span></button>
		</div>
	<?}?>
  </fieldset>
  <div class="popup-panel-top panel-white-bottom-icon-inner panel-white-lb-icon-before panel-white-rb-icon-after"></div>
</form>