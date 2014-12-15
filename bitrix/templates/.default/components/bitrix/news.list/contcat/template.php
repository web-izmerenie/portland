<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="contacts" class="home-contacts">
	<div class="map-holder">
<?foreach($arResult["ITEMS"] as $arItem):?>	
		<div class="map-holder-inner">
			<div id="google-map" data-latitude="<?=$arItem["DISPLAY_PROPERTIES"]['LAT']['VALUE']?>" data-longitude="<?=$arItem["DISPLAY_PROPERTIES"]['LONG']['VALUE']?>" data-marker="/i/map_point.png" data-zoom="<?=$arItem["DISPLAY_PROPERTIES"]['ZOOM']['VALUE']?>" class="google-map"></div>
		</div>
		<div class="home-contacts-content">
			<div itemscope itemtype="http://schema.org/Restaurant" class="popup-panel popup-panel--white contacts">
				<div class="popup-panel-top panel-white-top-icon-inner panel-white-lt-icon-before panel-white-rt-icon-after"></div>
				<div class="popup-panel-content panel-white-left-icon-before panel-white-right-icon-after">
					<div class="contacts-items-holder">
						<div class="contacts-item contacts-item--left">
							<div itemprop="telephone" class="contacts-item-row contacts-item-row--phone">
								<!--Phone-->
								<?foreach($arItem["DISPLAY_PROPERTIES"]['PHONE']['VALUE'] as $key=>$value){?>
									<a href="tel:<?=$arItem["DISPLAY_PROPERTIES"]['PHONE']['DESCRIPTION'][$key]?>" title="Позвонить нам" itemprop="telephone" class="contacts-item-phone"><?=$value?></a>
								<?}?>
								<!--//Phone-->
							</div>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="contacts-item-row contacts-item-row--address">
								<div class="contacts-item-address"><span itemprop="addressLocality"><?=$arItem["DISPLAY_PROPERTIES"]['CITY']['VALUE']?>, </span><span itemprop="streetAddress"><?=$arItem["DISPLAY_PROPERTIES"]['ADDRESS']['VALUE']?></span></div>
							</div>
							<div class="contacts-item-row">
								<?foreach($arItem["DISPLAY_PROPERTIES"]['EMAIL']['VALUE'] as $key=>$value){?>
									<a itemprop="email" href="mailto:<?=$value?>?subject=Письмо%20с%20сайта" title="Написать нам письмо" class="contacts-item-email custom-link custom-link--red"><span class="custom-link-name"><?=$value?></span></a>
								<?}?>								
							</div>
						</div>
						<div class="contacts-item contacts-item--right"><span class="contacts-item-title">Время работы:</span>
							<dl class="contacs-item-workhours">
								<?foreach($arItem["DISPLAY_PROPERTIES"]['TIME']['VALUE'] as $key=>$value){?>
									<dt class="contacs-item-workhours-name"><?=$value?></dt>
									<dd class="contacs-item-workhours-value"><?=$arItem["DISPLAY_PROPERTIES"]['TIME']['DESCRIPTION'][$key]?></dd>									
								<?}?>
							</dl>
                            <span style="margin-top:20px" class="contacts-item-title">Караоке:</span>
                            <dl class="contacs-item-workhours">
							     <dt class="contacs-item-workhours-name">чт-сб</dt>
							     <dd class="contacs-item-workhours-value">с 20:00 до 03:00</dd>
                            </dl>
							<?foreach($arItem["DISPLAY_PROPERTIES"]['META_TIME']['VALUE'] as $key=>$value){?>
								<meta itemprop="openingHours" content="<?=$value?>">
							<?}?>						
						</div>
					</div>
				</div>
				<div class="popup-panel-top panel-white-bottom-icon-inner panel-white-lb-icon-before panel-white-rb-icon-after"></div>
			</div>
			<div class="home-contacts-content-btn-holder"><a href="/feedback/empty.php" data-close="Карта" class="ajax-form home-contacts-content-btn custom-btn custom-btn--large custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Отправить сообщение</span></a></div>
		</div>
<?endforeach;?>
	</div>
</div>
