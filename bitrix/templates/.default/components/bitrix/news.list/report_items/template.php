<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($_REQUEST['empty']){
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
	$GLOBALS['APPLICATION']->RestartBuffer();
}
?>
<?if(!$_REQUEST['empty']){?>
	<div id="cont1" class="gallery">
<?}?>
<div class="justify-alignment">
<?
$i = 0;
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$i++;
	$arPhoto = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>292, 'height'=>292), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<?if($arItem['IBLOCK_ID'] == 10){?>		
		<div class="gallery-item-holder justify-item"><a href="?photo=1#<?=$i?>" class="gallery-item gallery-item--video"><img src="<?=$arPhoto['src']?>" alt="<?=$arItem['PREVIEW_TEXT']?>" itemprop="image" width="292" height="292" class="gallery-item-photo"></a></div>
	<?}?>
	<?if($arItem['IBLOCK_ID'] == 9){?>
		<div class="gallery-item-holder justify-item"><a href="?photo=1#<?=$i?>" class="gallery-item"><img src="<?=$arPhoto['src']?>" alt="<?=$arItem['PREVIEW_TEXT']?>" itemprop="image" width="292" height="292" class="gallery-item-photo"></a></div>
	<?}?>
<?endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>
<?if(!$_REQUEST['empty']){?>
	</div>
<?}?>
<?
if($_REQUEST['empty']){
	exit();
}
?>