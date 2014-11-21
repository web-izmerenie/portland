<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?if(count($arResult["ITEMS"])){?>
	<div id="home-video" class="home-video">
		<div class="page-inner">
			<header class="section-heading justify-alignment">
				<div class="justify-item justify-item--middle">
					<h1 itemprop="headline" class="section-heading-header">Portland Live (с 20:00)</h1>
				</div>                                
			</header>

<!--
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
-->
<!---->
<div class="iv-embed" style="margin:0 auto;padding:0;border:0;width:642px;"><div class="iv-v" style="display:block;margin:0;padding:1px;border:0;background:#000;"><iframe class="iv-i" style="display:block;margin:0;padding:0;border:0;" src="//open.ivideon.com/embed/v2/?server=100-69005c6d1f98081e69b6a9dab7acc868&amp;camera=0&amp;width=&amp;height=&amp;lang=ru" width="640" height="360" frameborder="0" allowfullscreen></iframe></div><div class="iv-b" style="display:block;margin:0;padding:0;border:0;"><div style="float:right;text-align:right;padding:0 0 10px;line-height:10px;"><a class="iv-a" style="font:10px Verdana,sans-serif;color:inherit;opacity:.6;" href="http://www.ivideon.com/" target="_blank">powered by Ivideon</a></div><div style="clear:both;height:0;overflow:hidden;">&nbsp;</div><script src="//open.ivideon.com/embed/v2/embedded.js"></script></div></div>
<br>
<p align="center">
<iframe frameborder="0" width="480" height="270" src="//www.dailymotion.com/embed/video/x28scl8" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x28scl8_portland_music" target="_blank">Portland</a> <i>   <a href="http://www.dailymotion.com/portland_art" target="_blank">portland_art</a></i>
</p>
		</div>
	</div>
<?}?>