<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($_REQUEST['empty']){
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
	$GLOBALS['APPLICATION']->RestartBuffer();
}
?>
<?if(!$_REQUEST['empty']){?>
	<div id="cont1" class="board has-masonry"><!--noindex-->
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
<?if(!$_REQUEST['empty']){?>
	</div>
<?}?>
<?=$arResult["NAV_STRING"]?>
<?
if($_REQUEST['empty']){
	exit();
}
?>