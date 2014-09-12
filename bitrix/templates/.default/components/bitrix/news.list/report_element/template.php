<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="event-page-album">
	<div data-auto="false" data-width="100%" data-maxheight="500" data-fit="scaledown" data-nav="thumbs" data-thumbheight="130" data-thumbwidth="130" data-hash="true" class="event-page-album-fotorama">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$arPhoto = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>130, 'height'=>130), BX_RESIZE_IMAGE_EXACT, true);
	$arPhotoDetail = CFile::ResizeImageGet($arItem['DETAIL_PICTURE']['ID'], array('width'=>633, 'height'=>423), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<?if($arItem['IBLOCK_ID'] == 10){?>	
		<a href="<?=$arItem['~DETAIL_TEXT']?>" data-caption="<?=$arItem['PREVIEW_TEXT']?>" class="event-page-item event-page-item--video"><img src="<?=$arPhotoDetail['src']?>" alt="<?=$arItem['PREVIEW_TEXT']?>" class="event-page-album-item-photo"></a>
	<?}?>
	<?if($arItem['IBLOCK_ID'] == 9){?>
		<a href="<?=$arPhotoDetail['src']?>" data-caption="<?=$arItem['PREVIEW_TEXT']?>" class="event-page-album-item"><img src="<?=$arPhoto['src']?>" alt="<?=$arItem['PREVIEW_TEXT']?>" width="130" height="130" class="event-page-album-item-photo"></a>		
	<?}?>
<?endforeach;?>
	</div>
</div>	