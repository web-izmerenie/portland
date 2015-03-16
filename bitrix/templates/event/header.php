<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html><!--[if IE 7]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
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
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.5.2/fotorama.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="/css/portland.css?v=807268"/>
        <!--//CSS-->
        <!--Scripts-->
        <script type="text/javascript" src="/js/vendor/modernizr-2.8.2.min.js"></script>
        <!--//Sripts-->
        <?$APPLICATION->ShowHead()?>	
    </head>
  <body itemscope itemtype="http://schema.org/WebPage">
	<?$APPLICATION->ShowPanel();?>
    <div style="<?$APPLICATION->ShowProperty("page_styles")?>" class="page">
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