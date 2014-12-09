<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html><!--[if IE 7]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
<!--[if IE 8]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!-->
<html lang="ru" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->
    <head>
        <!--Meta-->
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width" />
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com"/>
        <title><?$APPLICATION->ShowTitle()?></title>
        <meta name="keywords" content="<?$APPLICATION->ShowProperty("keywords")?>"/>
		<meta name="description" content="<?$APPLICATION->ShowProperty("description")?>"/>
		<meta name="robots" content="index, follow"/>
        <!--//Meta-->
        <!--Open graph-->
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>"/>
        <meta property="og:site_name" content="Portland"/>
        <meta property="og:description" content="<?$APPLICATION->ShowProperty("description")?>"/>
		<meta property="og:url" content="http://wemakesites.ru/portland"/>
        <meta property="og:image" content="http://wemakesites.ru/portland/i/icons/og.jpg"/>
        <meta property="og:image:type" content="jpg"/>
        <meta property="og:image:width" content="200"/>
        <meta property="og:image:height" content="200"/>
        <!--//Open graph-->
        <!--Twitter card-->
        <meta property="twitter:card" content="summary"/>
        <meta property="twitter:site" content="Portland"/>
        <meta property="twitter:description" content="<?$APPLICATION->ShowProperty("description")?>"/>
		<meta property="twitter:title" content="<?$APPLICATION->ShowProperty("keywords")?>"/>
		<meta property="twitter:image:src" content="http://wemakesites.ru/portland/i/icons/og.jpg"/>
        <meta property="twitter:image:width" content="200"/>
        <meta property="twitter:image:height" content="200"/>
        <!--//Twitter card-->
        <!--Icons-->
        <link href="/favicon.png" rel="shortcut icon" type="image/x-icon"/>
        <link href="/i/icons/apple-touch-icon-57.jpg" rel="apple-touch-icon" sizes="57x57"/>
        <link href="/i/icons/apple-touch-icon-72.jpg" rel="apple-touch-icon" sizes="72x72"/>
        <link href="/i/icons/apple-touch-icon-114.jpg" rel="apple-touch-icon" sizes="114x114"/>
        <link href="/i/icons/apple-touch-icon-144.jpg" rel="apple-touch-icon" sizes="144x144"/>
        <!--//Icons-->
        <!--CSS-->
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="http://fotorama.s3.amazonaws.com/4.5.2/fotorama.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"/>
		<link rel="stylesheet" type="text/css" media="screen" href="/css/jquery.formstyler.css?v=807268"/>
        <link rel="stylesheet" type="text/css" media="screen" href="/css/portland.css?v=807268"/>
        <!--//CSS-->
        <!--Scripts-->
        <script type="text/javascript" src="/js/vendor/modernizr-2.8.2.min.js"></script>
        <!--//Sripts-->
        <?$APPLICATION->ShowHead()?>	
    </head>
    <body itemscope itemtype="http://schema.org/WebPage" class="home-page">

<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter26228259 = new Ya.Metrika({id:26228259, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/26228259" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

        <?$APPLICATION->ShowPanel();?>
        <div style="background-image: url()" class="page">
            <header itemscope itemtype="http://schema.org/WebPage" id="page-header" class="page-header">
                <div class="page-header-inner">
                    <!--Logo-->
                    <div class="page-header-logo">
						<?if($APPLICATION->GetCurDir() != '/'){?><a href="/"><?}?>
							<img src="/i/logo_small.png" alt="Арт-шоу ресторан Portland" width="26" height="35" class="page-header-logo-image page-header-logo-image--small"/>
							<img src="/i/logo.png" alt="Арт-шоу ресторан Portland" width="142" height="98" class="page-header-logo-image page-header-logo-image--large"/>
						<?if($APPLICATION->GetCurDir() != '/'){?></a><?}?>
					</div>
                    <!--//Logo--><span id="page-header-toggler" class="page-header-toggler"><span class="page-header-toggler-inner list-icon-inner">Открыть меню</span></span>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MAX_LEVEL" => "2",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						),
						false
					);?>					
                </div>
                <?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"soc",
					Array(
						"IBLOCK_TYPE" => "about",
						"IBLOCK_ID" => "3",
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "",
						"SORT_ORDER2" => "",
						"FILTER_NAME" => "",
						"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"NAME",3=>"SORT",4=>"",),
						"PROPERTY_CODE" => array(0=>"LINK",1=>"",),
						"CHECK_DATES" => "Y",
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
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "N",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"PAGER_TEMPLATE" => "",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N"
					)
				);?>
            </header>
            <main itemscope itemprop="mainContentOfPage" class="page-content">
                <?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"slider_main",
					Array(
						"IBLOCK_TYPE" => "about",
						"IBLOCK_ID" => "2",
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "",
						"SORT_ORDER2" => "",
						"FILTER_NAME" => "",
						"FIELD_CODE" => array(0=>"ID",1=>"NAME",2=>"SORT",3=>"PREVIEW_TEXT",4=>"PREVIEW_PICTURE",5=>"",),
						"PROPERTY_CODE" => array(0=>"LINK",1=>"",),
						"CHECK_DATES" => "Y",
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
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "N",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"PAGER_TEMPLATE" => "",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N"
					)
				);?>
                <div class="home-content"><a name="board"></a>
                    <div id="home-board" class="home-board" style="min-height:1212px;">
                        <div class="page-inner">
                            <header class="section-heading justify-alignment">
                                <div class="justify-item justify-item--middle">
                                    <h1 itemprop="headline" class="section-heading-header">Афиша</h1>
                                </div>
                                <div class="justify-item justify-item--middle">
									<!--<a href="/event/board/" class="all-afisha custom-btn custom-btn--orange custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Афиша на месяц</span></a>-->
									<a href="index.php?current_month=1#board" data-close="Закрыть" class="custom-btn custom-btn--large custom-btn--orange custom-btn--uppercase custom-btn--nowrap custom-btn--board"><span class="custom-btn-name">Афиша на месяц</span></a>
									<a href="/subscription/empty.php" data-close="Закрыть" class="ajax-form custom-btn custom-btn--large custom-btn--orange custom-btn--uppercase custom-btn--nowrap custom-btn--board"><span class="custom-btn-name">Подписаться</span></a>
								</div>
								<?/*<a href="/subscription/empty.php" data-close="Закрыть" class="ajax-form custom-btn custom-btn--orange custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Подписаться</span></a>*/?>
                            </header>
							<?
							global $arrFilter;
							if($_REQUEST['SET_FILTER'] || $_REQUEST['current_month']){
								if($_REQUEST['year']){
									$arrFilter['year'] = $_REQUEST['year'];
								}
								if($_REQUEST['month']){
									$arrFilter['month'] = $_REQUEST['month'];
								}
								if($_REQUEST['current_month']){
									$arrFilter['month'] = (int)date('m');
									$arrFilter['year'] = (int)date('Y');
								}
								if($arrFilter['month'] && $arrFilter['year']){
									$arrFilter['LOGIC'] = 'AND';
									$arrFilter['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(0, 0, 0, $arrFilter['month'], 1, $arrFilter['year']),"FULL");
									$arrFilter['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(23, 59, 59, $arrFilter['month']+1, 0, $arrFilter['year']),"FULL");
								}else if($arrFilter['year']){
									$arrFilter['LOGIC'] = 'AND';
									$arrFilter['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(0, 0, 0, 1, 1, $arrFilter['year']),"FULL");
									$arrFilter['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp(mktime(23, 59, 59, 1, 0, $arrFilter['year']+1),"FULL");
								}
							}
							?>
							<?$APPLICATION->IncludeComponent("bitrix:news.list", "board_items", array(
								"IBLOCK_TYPE" => "about",
								"IBLOCK_ID" => "7",
								"NEWS_COUNT" => "6",
								"SORT_BY1" => "ACTIVE_FROM",
								"SORT_ORDER1" => "DESC",
								"SORT_BY2" => "NAME",
								"SORT_ORDER2" => "ASC",
								"FILTER_NAME" => "arrFilter",
								"FIELD_CODE" => array(
									0 => "",
									1 => "",
								),
								"PROPERTY_CODE" => array(
									0 => "ADV",
									1 => "",
								),
								"CHECK_DATES" => "N",
								"DETAIL_URL" => "/event/board/#ID#/",
								"AJAX_MODE" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "N",
								"AJAX_OPTION_HISTORY" => "N",
								"CACHE_TYPE" => "A",
								"CACHE_TIME" => "36000000",
								"CACHE_FILTER" => "N",
								"CACHE_GROUPS" => "Y",
								"PREVIEW_TRUNCATE_LEN" => "",
								"ACTIVE_DATE_FORMAT" => "j F Y",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"ADD_SECTIONS_CHAIN" => "N",
								"HIDE_LINK_WHEN_NO_DETAIL" => "N",
								"PARENT_SECTION" => "",
								"PARENT_SECTION_CODE" => "",
								"INCLUDE_SUBSECTIONS" => "N",
								"PAGER_TEMPLATE" => "board_visible",
								"DISPLAY_TOP_PAGER" => "N",
								"DISPLAY_BOTTOM_PAGER" => "Y",
								"PAGER_TITLE" => "Новости",
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"DISPLAY_DATE" => "Y",
								"DISPLAY_NAME" => "Y",
								"DISPLAY_PICTURE" => "Y",
								"DISPLAY_PREVIEW_TEXT" => "Y",
								"AJAX_OPTION_ADDITIONAL" => ""
								),
								false
							);?>
                            
                                 <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "special_offer",
                                Array(
                                    "IBLOCK_TYPE" => "about",
                                    "IBLOCK_ID" => "14",
                                    "NEWS_COUNT" => "1",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_ORDER1" => "",
                                    "SORT_BY2" => "",
                                    "SORT_ORDER2" => "",
                                    "FILTER_NAME" => "",
                                    "FIELD_CODE" => array("",""),
                                    "PROPERTY_CODE" => array("",""),
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "/event/spetsialnoe-predlozhenie/",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "ACTIVE_DATE_FORMAT" => "",
                                    "SET_TITLE" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_STATUS_404" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "INCLUDE_SUBSECTIONS" => "Y",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "PAGER_TEMPLATE" => "",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "PAGER_TITLE" => "Новости",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "Y"
                                )
                            );?>
                            <?CMain::IncludeFile('/inc/inc_social.php');?>

                        </div>
                    </div>
					<?$APPLICATION->IncludeComponent("bitrix:news.list", "home_video", array(
						"IBLOCK_TYPE" => "about",
						"IBLOCK_ID" => "13",
						"NEWS_COUNT" => "1",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "NAME",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						"FIELD_CODE" => array(
							0 => "DETAIL_PICTURE",
							1 => "",
						),
						"PROPERTY_CODE" => array(
							0 => "ADV",
							1 => "CODE",
						),
						"CHECK_DATES" => "N",
						"DETAIL_URL" => "/event/board/#ID#/",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "j F Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "N",
						"PAGER_TEMPLATE" => "board_visible",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "Новости",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_OPTION_ADDITIONAL" => ""
						),
						false
					);?>					
                    <?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"contcat",
						Array(
							"IBLOCK_TYPE" => "about",
							"IBLOCK_ID" => "1",
							"NEWS_COUNT" => "1",
							"SORT_BY1" => "ID",
							"SORT_ORDER1" => "DESC",
							"SORT_BY2" => "",
							"SORT_ORDER2" => "",
							"FILTER_NAME" => "",
							"FIELD_CODE" => array(0=>"ID",1=>"",),
							"PROPERTY_CODE" => array(0=>"PHONE",1=>"CITY",2=>"ADDRESS",3=>"EMAIL",4=>"TIME",5=>"LAT",6=>"LONG",7=>"ZOOM",8=>"META_TIME",9=>"",),
							"CHECK_DATES" => "Y",
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
							"DISPLAY_NAME" => "N",
							"DISPLAY_PICTURE" => "N",
							"DISPLAY_PREVIEW_TEXT" => "N",
							"PAGER_TEMPLATE" => "",
							"DISPLAY_TOP_PAGER" => "N",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"PAGER_TITLE" => "",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N"
						)
					);?>  
					<footer itemscope itemtype="http://schema.org/WPFooter" class="page-footer page-footer page-footer--home">
					  <div class="page-inner page-footer-inner">
						<div class="page-footer-row justify-alignment">
						  <div class="page-footer-item page-footer-item--small justify-item"><a href="/map/" class="page-footer-sitemap-link transition-icon compass2-icon-before compass2-hover-icon-after custom-link custom-link--orange custom-link--uppercase"><span class="custom-link-name">Карта сайта</span></a></div>
						  <div itemscope itemtype="http://schema.org/Restaurant" class="page-footer-item page-footer-item--large page-footer-item--center justify-item">
							<ul class="page-footer-item-info">
								<li class="page-footer-item-info-item">
									<!--Phone-->
									<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_phone.php');?>				
									<!--//Phone-->
								</li>
								<li itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="page-footer-item-info-item">
									<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_address.php');?>						
								</li>
								<li class="page-footer-item-info-item">
									<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_email.php');?>									
								</li>
							</ul>
						  </div>
						  <div class="page-footer-item page-footer-item--small page-footer-item--right justify-item"><a href="/subscription/empty.php" data-close="Закрыть" class="ajax-form custom-btn custom-btn--orange custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Подписаться на афишу</span></a></div>
						</div>
						<div class="page-footer-row justify-alignment">
						  <div class="page-footer-item page-footer-item--small justify-item"><span class="page-footer-copyrights"><?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_copy.php');?></span></div>
						  <div class="page-footer-item page-footer-item--large page-footer-item--center justify-item">
							<?$APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"soc_footer",
								Array(
									"IBLOCK_TYPE" => "about",
									"IBLOCK_ID" => "3",
									"NEWS_COUNT" => "20",
									"SORT_BY1" => "SORT",
									"SORT_ORDER1" => "ASC",
									"SORT_BY2" => "",
									"SORT_ORDER2" => "",
									"FILTER_NAME" => "",
									"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"NAME",3=>"SORT",4=>"",),
									"PROPERTY_CODE" => array(0=>"LINK",1=>"",),
									"CHECK_DATES" => "Y",
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
									"DISPLAY_NAME" => "N",
									"DISPLAY_PICTURE" => "N",
									"DISPLAY_PREVIEW_TEXT" => "N",
									"PAGER_TEMPLATE" => "",
									"DISPLAY_TOP_PAGER" => "N",
									"DISPLAY_BOTTOM_PAGER" => "N",
									"PAGER_TITLE" => "",
									"PAGER_SHOW_ALWAYS" => "N",
									"PAGER_DESC_NUMBERING" => "N",
									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
									"PAGER_SHOW_ALL" => "N"
								)
							);?>            
						  </div>
						<div class="page-footer-item page-footer-item--small page-footer-item--right justify-item">
							<?$APPLICATION->IncludeFile('/bitrix/templates/.default/include_areas/footer_dev.php');?>			
						</div>
						</div>
					  </div>
					</footer>
                </div>
            </main>
        </div>