<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" class="page-heading-menu">
	<ul class="page-heading-menu-inner">
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="page-heading-menu-item-holder "><span class="page-heading-menu-item page-heading-menu-item page-heading-menu-item--current"><span itemprop="name" class="page-heading-menu-item-name"><?=$arItem["TEXT"]?></span></span></li>
	<?else:?>
		<li class="page-heading-menu-item-holder "><a href="<?=$arItem["LINK"]?>" itemprop="url" target="_self" class="page-heading-menu-item custom-link custom-link--white"><span itemprop="name" class="page-heading-menu-item-name custom-link-name"><?=$arItem["TEXT"]?></span></a></li>
	<?endif?>
	
<?endforeach?>
	</ul>
</nav>
<?endif?>