<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" class="page-header-social">
	<ul class="page-header-social-inner">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<li class="page-header-social-item-holder "><a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" title="Наша группа в <?=$arItem['NAME']?>" itemprop="url" target="_blank" class="page-header-social-item page-header-social-item--<?=$arItem['CODE']?> transition-icon <?=$arItem['CODE']?>-icon-before <?=$arItem['CODE']?>-hover-icon-after"><span itemprop="name" class="page-header-social-item-name"><?=$arItem['NAME']?></span></a></li>
	<?endforeach;?>
	</ul>
</nav>