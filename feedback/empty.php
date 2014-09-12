<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("form");
$arSuccess = array();
$arError = array();
if($_REQUEST['ADD_FEEDBACK']){
	$arValues = array(
		'form_text_1' => $_REQUEST['name'],
		'form_text_2' => $_REQUEST['email'],
		'form_text_3' => $_REQUEST['tel'],
		'form_textarea_4' => $_REQUEST['text'],
	);
	$error = CForm::Check(1, $arValues);
	if(strlen($error)<=0){
		if($id = CFormResult::Add(1, $arValues)){
			CFormResult::Mail($id);
			$arSuccess[] = 'Мы всегда рады вас услышать!';
		}else{
			global $strError;
			$arError[] = $strError;
		}		
	}else{
		$arError[] = $error;
	}
}
?>
<form action="/feedback/empty.php" method="post" class="popup-panel popup-panel--white custom-form">
              <div class="popup-panel-top panel-white-top-icon-inner panel-white-lt-icon-before panel-white-rt-icon-after"></div>
              <fieldset class="popup-panel-content panel-white-left-icon-before panel-white-right-icon-after custom-form-content">
                <?if(count($arSuccess)){?>
					<div class="custom-form-header">
						<h2 class="custom-form-header-name">Сообщение принято</h2>
					</div>
					<div class="custom-form-item custom-form-item--message"><?=show_success($arSuccess)?></div>
				<?}else{?>
					<input type="hidden" name="ADD_FEEDBACK" value="1" />
					<div class="custom-form-header">
					  <h2 class="custom-form-header-name">Отправить сообщение</h2>
					</div>
					<?if(count($arError)){?>
						<div class="custom-form-item custom-form-item--message" style="color:red;"><?=show_error($arError)?></div>
					<?}?>
					<div class="custom-form-item custom-form-item--required">
					  <input type="text" placeholder="Имя" name="name" required="required" autocorrect="off" maxlength="100" class="custom-form-item-text">
					</div>
					<div class="custom-form-item custom-form-item--required">
					  <div class="custom-form-item-half custom-form-item-half--left">
						<input type="email" placeholder="E-mail" required="required" name="email" autocorrect="off" autocapitalize="off" maxlength="100" class="custom-form-item-text">
					  </div>
					  <div class="custom-form-item-half custom-form-item-half--right">
						<input type="tel" placeholder="Телефон" name="tel" autocorrect="off" autocapitalize="off" maxlength="100" class="custom-form-item-text">
					  </div>
					</div>
					<div class="custom-form-item custom-form-item--required">
					  <textarea placeholder="Текст отзыва" required="required" name="text" class="custom-form-item-textarea"></textarea>
					</div>
					<div class="custom-form-item custom-form-item--actions ">
					  <button type="submit" class="custom-btn custom-btn--red custom-btn--large custom-btn--uppercase"><span class="custom-btn-name">Отправить сообщение</span></button>
					</div>				 
			  <?}?>
			  </fieldset>
              <div class="popup-panel-top panel-white-bottom-icon-inner panel-white-lb-icon-before panel-white-rb-icon-after"></div>
            </form>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>