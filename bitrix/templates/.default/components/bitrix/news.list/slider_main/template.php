<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="home-promo">
	<div class="fullsize-slider-list">        		
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$arPhoto = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>1840, 'height'=>980), BX_RESIZE_IMAGE_EXACT, true);
			?>
			<div style="background-image: url(<?=$arPhoto['src']?>)" class="fullsize-slider-item">
				<div class="fullsize-slider-item-inner">
					<div class="fullsize-slider-item-inner-content">
						<div class="page-inner">
							<div class="popup-panel popup-panel--black">
								<div class="popup-panel-top panel-dark-top-icon-inner panel-dark-lt-icon-before panel-dark-rt-icon-after"></div>
								<div class="popup-panel-content popup-panel-content--promo panel-dark-left-icon-before panel-dark-right-icon-after">
									<div class="popup-panel-title"><?=$arItem['NAME']?></div>
									<div class="popup-panel-description page-text page-text--center">
										<?=$arItem['PREVIEW_TEXT']?>
										<?if($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']){?>
											<p><a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" class="custom-btn custom-btn--orange custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name"><?=$arItem['DISPLAY_PROPERTIES']['LINK']['DESCRIPTION']?></span></a></p>
										<?}?>
									</div>
								</div>
								<div class="popup-panel-bottom panel-dark-bottom-icon-inner panel-dark-lb-icon-before panel-dark-rb-icon-after"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div><a href="#home-board" title="Перейти к афише" class="home-promo-down js-page-navigation"><span class="home-promo-down-arrow transition-icon transition-icon--arrows transition-icon--arrows--vertical transition-icon--arrows--bottom barrow-gold-icon-before barrow-white-icon-after">Перейти к афише</span></a>
</div>
