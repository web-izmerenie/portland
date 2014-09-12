<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("subscribe");
$arSuccess = array();
$arError = array();
if($_REQUEST['ADD_PROMO']){
	$bTrue = false;
	$dbVideo = CIBlockElement::GetList(array('ACTIVE_FROM'=>'DESC', 'NAME'=>'ASC'), array('IBLOCK_ID'=>13, 'ACTIVE'=>'Y'), false, array('nTopCount'=>1), array('PROPERTY_CODE'));
	while($arVideo = $dbVideo->Fetch()){	
		$code = $arVideo['PROPERTY_CODE_VALUE'];
	}
	if($_REQUEST['code'] == $code){
		$bTrue = true;
	}
    if($bTrue){
		$arSuccess[] = 'Спасибо! Ваш код успешно принят';
    }else{
        $arError[] = 'Введен неверный код';
	}	
}
?>
<form action="/video_code.php" method="post" class="popup-panel popup-panel--white custom-form">
  <div class="popup-panel-top panel-white-top-icon-inner panel-white-lt-icon-before panel-white-rt-icon-after"></div>
  <fieldset class="popup-panel-content panel-white-left-icon-before panel-white-right-icon-after custom-form-content">
	<?if(count($arSuccess)){?>
		<div class="custom-form-header">
			<h2 class="custom-form-header-name">Код принят</h2>
		</div>
		<div class="custom-form-item custom-form-item--message"><?=show_success($arSuccess)?></div>
		<script type="text/javascript">
			$(function(){
				$('#video_home_item').attr('data-code-success', 1);
				var fotorama = $fotorama.data('fotorama');
				fotorama.playVideo();
				$.fancybox.close();				
			})
		</script>
	<?}else{?>
		<input type="hidden" name="ADD_PROMO" value="1" />
		<div class="custom-form-header">
		  <h2 class="custom-form-header-name">Введите промо-код</h2>
		</div>		
		<?if(count($arError)){?>
			<div class="custom-form-item custom-form-item--message" style="color:red;"><?=show_error($arError)?></div>
		<?}?>					
		<div class="custom-form-item">
		  <input type="text" value="" placeholder="" required="required" name="code" autocorrect="off" autocapitalize="off" maxlength="100" class="custom-form-item-text">
		</div>
		<div class="custom-form-item custom-form-item--actions">
		  <button type="submit" class="custom-btn custom-btn--red custom-btn--large custom-btn--uppercase"><span class="custom-btn-name">&nbsp;&nbsp;&nbsp;Ввод&nbsp;&nbsp;&nbsp;</span></button>
		</div>
	<?}?>
  </fieldset>
  <div class="popup-panel-top panel-white-bottom-icon-inner panel-white-lb-icon-before panel-white-rb-icon-after"></div>
</form>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>