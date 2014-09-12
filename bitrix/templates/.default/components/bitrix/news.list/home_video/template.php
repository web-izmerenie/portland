<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])){?>
	<div id="home-video" class="home-video">
		<div class="page-inner">
			<header class="section-heading justify-alignment">
				<div class="justify-item justify-item--middle">
					<h1 itemprop="headline" class="section-heading-header">Portland Live</h1>
				</div>                                
			</header>
			<div class="home-video-wrapper">
				<a href="/video_code.php" data-close="Закрыть" class="ajax-form ajax-promocode" style="display:none;"></a>
				<div class="event-page-album">					
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<div data-auto="false" id="video_home_item" data-social-hide="true" <?=($arItem['DISPLAY_PROPERTIES']['CODE']['VALUE'] ? 'data-code-req="1"' : NULL)?> data-code-success="0" data-width="640px" data-maxheight="390" data-fit="scaledown" data-nav="thumbs" data-thumbheight="130" data-thumbwidth="130" data-hash="true" class="event-page-album-fotorama">
					<?
					$arPhotoDetail = CFile::ResizeImageGet($arItem['DETAIL_PICTURE']['ID'], array('width'=>632, 'height'=>382), BX_RESIZE_IMAGE_EXACT, true);
					?>
					<?if($arItem['IBLOCK_ID'] == 13){?>	
						<a href="<?=$arItem['~DETAIL_TEXT']?>" data-caption="<?=$arItem['PREVIEW_TEXT']?>" class="event-page-item event-page-item--video"><img src="<?=$arPhotoDetail['src']?>" alt="<?=$arItem['PREVIEW_TEXT']?>" class="event-page-album-item-photo"></a>
					<?}?>	
					</div>
				<?endforeach;?>															
				</div>
			</div>
		</div>
	</div>
<?}?>