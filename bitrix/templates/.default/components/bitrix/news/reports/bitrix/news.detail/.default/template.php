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
		<?if($arResult['DISPLAY_PROPERTIES']['PHOTO']['VALUE'] || $arResult['DISPLAY_PROPERTIES']['VIDEO']['VALUE']){?>
			<?			
			if($arResult['DISPLAY_PROPERTIES']['PHOTO']['VALUE']){
				$arIblockIDs[] = 9;
				$arSectionIDs[] = $arResult['DISPLAY_PROPERTIES']['PHOTO']['VALUE'];
			}
			if($arResult['DISPLAY_PROPERTIES']['VIDEO']['VALUE']){
				$arIblockIDs[] = 10;
				$arSectionIDs[] = $arResult['DISPLAY_PROPERTIES']['VIDEO']['VALUE'];
			}
			global $reportFilter;
			$reportFilter = array('IBLOCK_ID'=>$arIblockIDs, 'SECTION_ID'=>$arSectionIDs);
			?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"report_items",
				Array(
					"IBLOCK_TYPE" => "about",
					"IBLOCK_ID" => 9,
					"NEWS_COUNT" => "15",
					"SORT_BY1" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_BY2" => "NAME",
					"SORT_ORDER2" => "",
					"FILTER_NAME" => "reportFilter",
					"FIELD_CODE" => array(),
					"PROPERTY_CODE" => array(),
					"CHECK_DATES" => "N",
					"DETAIL_URL" => "",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "N",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"PAGER_TEMPLATE" => "board_visible",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N"
				)
			);?>
		<?}?>
	  </div>
	</div>
  </div>
</div>