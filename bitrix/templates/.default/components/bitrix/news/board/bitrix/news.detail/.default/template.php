<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($arResult["DETAIL_PICTURE"]["SRC"]){
	$APPLICATION->SetPageProperty("page_styles", "background-image: url(".$arResult["DETAIL_PICTURE"]["SRC"].")");
}else{
	$APPLICATION->SetPageProperty("page_styles", "background: #000");
}
?>
<div itemscope itemtype="http://schema.org/Event">
  <div class="event-page-heading">
	<div class="page-inner justify-alignment">
	  <div class="event-page-heading-social justify-item justify-item--middle"><a href="?hash=1" title="Facebook" class="facebook event-page-heading-social-item event-page-heading-social-item--facebook facebook-large-icon-before"><span class="event-page-heading-social-counter"></span></a><a href="?hash=1" title="Twitter" class="twitter event-page-heading-social-item event-page-heading-social-item--twitter twitter-large-icon-before"><span class="event-page-heading-social-counter"></span></a><a href="?hash=1" title="Вконтакте" class="vkontakte event-page-heading-social-item event-page-heading-social-item--vk vk-large-icon-before"><span class="event-page-heading-social-counter"></span></a></div>
	  <div class="event-page-heading-nav justify-item justify-item--middle">
		<time datetime="<?=date('c', strtotime($arResult['ACTIVE_FROM']))?>" itemprop="startDate" class="event-page-heading-nav-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></time>
		<?if($arResult["TOLEFT"]){?>
			<a href="<?=$arResult["TOLEFT"]['URL']?>" title="<?=$arResult["TOLEFT"]['NAME']?>" class="event-page-heading-nav-prev transition-icon transition-icon--arrows transition-icon--arrows--left transition-icon--arrows--horizontal larrow-gold-icon-before larrow-orange-icon-after"><?=$arResult["TOLEFT"]['NAME']?></a>
		<?}?>	
		<?if($arResult["TORIGHT"]){?>	
			<a href="<?=$arResult["TORIGHT"]['URL']?>" title="<?=$arResult["TORIGHT"]['NAME']?>" class="event-page-heading-nav-next transition-icon transition-icon--arrows transition-icon--arrows--right transition-icon--arrows--horizontal rarrow-gold-icon-before rarrow-orange-icon-after"><?=$arResult["TORIGHT"]['NAME']?></a>
		<?}?>	
	  </div>
	  <div class="event-page-heading-back justify-item justify-item--middle"><a href="<?=$arResult['LIST_PAGE_URL']?>" class="custom-back-link custom-back-link--orange custom-back-link--uppercase custom-back-link--large"><span class="custom-back-link-name">Вернуться к списку</span></a></div>
	</div>
	<h1 itemprop="name" class="event-page-heading-name"><span class="event-page-heading-name-main"><?=$arResult["NAME"]?> </span><span class="event-page-heading-name-minor"><?=$arResult["DISPLAY_PROPERTIES"]['ADV']['VALUE']?></span></h1>
  </div>
  <div class="page-main">
	<div class="page-inner">
	  <div class="page-main-holder">
		<?if(count($arResult['DISPLAY_PROPERTIES']['PHOTO']['VALUE'])){?>
			<div class="event-page-slider-holder">
			  <div class="event-page-slider">		
				<?foreach($arResult['DISPLAY_PROPERTIES']['PHOTO']['VALUE'] as $key=>$arPhotoID){?>
					<?
					$arPhoto = CFile::ResizeImageGet($arPhotoID, array('width'=>633, 'height'=>423), BX_RESIZE_IMAGE_EXACT, true);
					?>
					<div class="event-page-slider-item"><img src="<?=$arPhoto['src']?>" alt="<?=(strlen($arResult['DISPLAY_PROPERTIES']['PHOTO']['DESCRIPTION'][$key]) > 0 ? $arResult['DISPLAY_PROPERTIES']['PHOTO']['DESCRIPTION'][$key] : $arResult['NAME'])?>" itemprop="image" width="633" height="423" class="event-page-slider-item-photo"></div>
				<?}?>						
			  </div>
			</div>
		<?}?>
		<div itemprop="description" class="event-page-content page-text">
			<?if(strlen($arResult["DETAIL_TEXT"])>0){?>
				<?=$arResult["DETAIL_TEXT"];?>
			<?}else{?>
				<?=$arResult["PREVIEW_TEXT"];?>
			<?}?>			
		</div>
	  </div>
	</div>
  </div>
</div>