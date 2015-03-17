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
    <div style="background-image: url(/dummy/event/bg1.jpg)" class="page">
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
        
      </header>
      <main itemscope itemprop="mainContentOfPage" class="page-content">
        <div class="page-heading page-heading--outer">
          <div class="page-inner justify-alignment">
            <div class="justify-item justify-item--middle">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"",
					Array(
						"START_FROM" => "1",
						"PATH" => "",
						"SITE_ID" => "s1"
					)
				);?>	              
            </div>
            <div class="justify-item justify-item--bottom">
              <nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" class="page-heading-filter">
                <ul class="page-heading-filter-inner">
					<?if($_REQUEST['video']){?>
						<li class="page-heading-filter-item-holder "><a href="<?=$APPLICATION->GetCurDir()?>" title="Показать все отчеты" itemprop="url" target="_self" class="page-heading-filter-item"><span itemprop="name" class="page-heading-filter-item-name">Все отчёты</span></a></li>
						<li class="page-heading-filter-item-holder "><span title="Показать только те отчеты, у которых есть видео-ролики" class="page-heading-filter-item page-heading-filter-item page-heading-filter-item--current"><span itemprop="name" class="page-heading-filter-item-name">С видео</span></span></li>						
					<?}else{?>
						<li class="page-heading-filter-item-holder "><span title="Показать все отчеты" class="page-heading-filter-item page-heading-filter-item page-heading-filter-item--current"><span itemprop="name" class="page-heading-filter-item-name">Все отчёты</span></span></li>
						<li class="page-heading-filter-item-holder "><a href="<?=$APPLICATION->GetCurDir()?>?video=1" title="Показать только те отчеты, у которых есть видео-ролики" itemprop="url" target="_self" class="page-heading-filter-item"><span itemprop="name" class="page-heading-filter-item-name">С видео</span></a></li>
					<?}?>                  
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="page-main">
          <div class="page-inner">                                    