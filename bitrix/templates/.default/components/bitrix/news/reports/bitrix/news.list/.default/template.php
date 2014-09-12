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
	$arReportPhotoCount = AIEventReport::GetCount(9);
	$arReportVideoCount = AIEventReport::GetCount(10);
	?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<div itemscope itemtype="http://schema.org/Event" class="board-item-holder"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" itemprop="url" class="board-item">
		  <div class="board-item-inner">
			<div style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)" class="board-item-photo-holder"><img itemprop="image" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" width="350" height="350" class="board-item-photo"><!--noindex--><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" width="100%" class="board-item-photo-spacer"><!--/noindex--></div>
			<div class="board-item-info">
			  <div class="board-item-date-holder">
				<time itemprop="startDate" datetime="<?=date('c', strtotime($arItem['ACTIVE_FROM']))?>" class="board-item-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></time>
			  </div>
			  <div itemprop="name" class="board-item-name board-item-name--small"><?=$arItem["NAME"]?></div>
			  <?if(strlen($arItem["PREVIEW_TEXT"]) > 0){?>
				<div itemprop="description" class="board-item-description"><?=$arItem["PREVIEW_TEXT"]?></div>
			  <?}?>
			  <?if($arItem['DISPLAY_PROPERTIES']['PHOTO']['VALUE'] || $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']){?>
				  <div class="board-item-media">
					<?if($arItem['DISPLAY_PROPERTIES']['PHOTO']['VALUE']){?>
						<span title="Фотографий" class="board-item-media-item camera-icon-before"><span class="board-item-media-item-counter"><?=$arReportPhotoCount[$arItem['DISPLAY_PROPERTIES']['PHOTO']['VALUE']]?></span></span>
					<?}?>
					<?if($arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']){?>
						<span title="Видео-роликов" class="board-item-media-item cadre-icon-before"><span class="board-item-media-item-counter"><?=$arReportVideoCount[$arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']]?></span></span>
					<?}?>
				  </div>
			  <?}?>
			</div>
		  </div>
		</a></div>			
	<?endforeach;?>
	<?if(!$_REQUEST['empty']){?>
		<div class="ajax-pager ajax-pager--invisible"><a href="?empty=1<?=($_REQUEST['video'] ? '&video=1' : NULL)?>" data-container="cont1" class="ajax-pager-link custom-btn custom-btn--orange custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Показать еще</span></a></div>
	<?}else{?>
		<?=$arResult["NAV_STRING"]?>
	<?}?>	
<?if(!$_REQUEST['empty']){?>	
</div>
<?}?>
<?
if($_REQUEST['empty']){
	exit();
}
?>
