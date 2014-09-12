<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" class="page-footer-social">
  <ul class="page-footer-social-inner">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<li class="page-footer-social-item-holder "><a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" title="Наша группа в <?=$arItem['NAME']?>" itemprop="url" target="_blank" class="page-footer-social-item page-footer-social-item--<?=$arItem['CODE']?> transition-icon <?=$arItem['CODE']?>-icon-before <?=$arItem['CODE']?>-hover-icon-after"><span itemprop="name" class="page-footer-social-item-name"><?=$arItem['NAME']?></span></a></li>
	<?endforeach;?>	
  </ul>
</nav>