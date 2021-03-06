<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($_REQUEST['empty']){
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
	$GLOBALS['APPLICATION']->RestartBuffer();
}
?>
<?if(!$_REQUEST['empty']){?>
	<?
	global $arrFilter;
	$dbEvent = CIBlockElement::GetList(array('ACTIVE_FROM'=>'ASC'), array('IBLOCK_ID'=>7, 'ACTIVE'=>'Y'), false, false, array('ID', 'ACTIVE_FROM'));
	while($arEvent = $dbEvent->Fetch()){
		$arDateEvent[] = $arEvent['ACTIVE_FROM'];
	}
	$arMonth = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
	?>
	<div class="board-filter" style="top:120px;">
		<form action="index.php#board" method="GET">
			<input type="hidden" name="SET_FILTER" value="Y" />
			<div class="item">
				<label for="board-filter-year"><a href="<?=$APPLICATION->GetCurDir();?>index.php#board">Все события</a></label>		
			</div>
			<div class="item">
				<select name="year" id="board-filter-year">
					<option value="<?=date('Y')?>">Год</option>
					<?for($i=date('Y', strtotime(current($arDateEvent))); $i<=date('Y', strtotime(end($arDateEvent))); $i++){?>
						<option value="<?=$i?>" <?=($arrFilter['year'] == $i ? 'selected="selected"' : NULL)?>><?=$i?></option>
					<?}?>
				</select>
			</div>
			<div class="item">
				<select name="month" id="board-filter-month">
					<option value="0">Месяц</option>
					<?for($i=1; $i<=12; $i++){?>
						<option value="<?=$i?>" <?=($arrFilter['month'] == $i ? 'selected="selected"' : NULL)?>><?=$arMonth[$i-1]?></option>
					<?}?>
				</select>
			</div>
		</form>		
	</div>
	<?if(!count($arResult["ITEMS"])){?>
		<div class="not-found" style="margin-top:76px;">События за выбранный период отсутствуют</div>
	<?}?>
	<div id="cont1" class="board has-masonry" style="top:32px"><!--noindex-->
		<div class="grid-sizer"></div>
		<div class="gutter-sizer"></div><!--noindex-->
<?}?>
<?
$i = 0;
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$i++;
	$arPhoto = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>274, 'height'=>274), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<?
	$bSpecial = false;
	$bOld = false;
	if($arItem['PROPERTIES']['SPECIAL']['VALUE']){
		$bSpecial = true;
	}
	if(strtotime($arItem['ACTIVE_FROM']) < time()){
		$bOld = true;
	}
	?>
	<div itemscope itemtype="http://schema.org/Event" class="board-item-holder"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" itemprop="url" class="board-item <?=($bSpecial ? 'board-item-special' : NULL)?>">
	<div class="board-item-inner">
		<div style="background-image: url(<?=$arPhoto['src']?>)" class="board-item-photo-holder <?=($bOld ? 'board-item-old' : NULL)?>"><img itemprop="image" src="<?=$arPhoto['src']?>" alt="<?=$arItem["NAME"]?>" width="750" height="453" class="board-item-photo"><!--noindex--><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" width="100%" class="board-item-photo-spacer"><!--/noindex--></div>
    <div class="board-item-date-holder">
				<time itemprop="startDate" datetime="<?=date('c', strtotime($arItem['ACTIVE_FROM']))?>" class="board-item-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?> / <?=date('H:i', strtotime($arItem['ACTIVE_FROM']))?></time>
        </div>
		<div class="board-item-info">
			<div itemprop="name" class="board-item-name"><?=$arItem["NAME"]?></div>
			<div itemprop="description" class="board-item-description"><?=$arItem["PREVIEW_TEXT"]?></div>
		</div>
	</div></a></div>	
<?endforeach;?>
<?=$arResult["NAV_STRING"]?>
<?if(!$_REQUEST['empty']){?>
	</div>
<?}?>
<?
if($_REQUEST['empty']){
	exit();
}
?>