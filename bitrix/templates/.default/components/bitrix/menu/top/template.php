<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" class="page-header-menu">
<ul class="page-header-menu-inner">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>
		<?if ($arItem["SELECTED"]){?>
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="page-header-menu-item-holder page-header-menu-item-holder--submenu"><span title="<?=$arItem["TEXT"]?>" class="page-header-menu-item <?=$arItem["PARAMS"]['CLASS']?> page-header-menu-item page-header-menu-item--current"><span itemprop="name" class="page-header-menu-item-name"><?=$arItem["TEXT"]?></span></span>				
					<div class="page-header-menu-sub <?=(preg_match('#^/(tour|catalog)/#is', $arItem["LINK"]) ? 'page-header-menu-sub--top' : NULL)?>">
						<?if($arItem["PARAMS"]['TITLE']){?>
							<div class="page-header-menu-sub-title"><?=$arItem["PARAMS"]['TITLE']?>:</div>
						<?}?>
						<ul class="page-header-menu-sub-inner">
			<?endif?>
		<?}else{?>
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="page-header-menu-item-holder page-header-menu-item-holder--submenu "><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" target="_self" class="page-header-menu-item <?=$arItem["PARAMS"]['CLASS']?>"><span itemprop="name" class="page-header-menu-item-name"><?=$arItem["TEXT"]?></span></a>			
					<div class="page-header-menu-sub <?=(preg_match('#^/(tour|catalog)/#is', $arItem["LINK"]) ? 'page-header-menu-sub--top' : NULL)?>">
						<?if($arItem["PARAMS"]['TITLE']){?>
							<div class="page-header-menu-sub-title"><?=$arItem["PARAMS"]['TITLE']?>:</div>
						<?}?>
						<ul class="page-header-menu-sub-inner">
			<?endif?>
		<?}?>
	<?else:?>
		<?if ($arItem["SELECTED"]){?>
			<?if ($arItem["PERMISSION"] > "D"):?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>	
					<li class="page-header-menu-item-holder "><span title="<?=$arItem["TEXT"]?>" class="page-header-menu-item <?=$arItem["PARAMS"]['CLASS']?> page-header-menu-item page-header-menu-item--current"><span itemprop="name" class="page-header-menu-item-name"><?=$arItem["TEXT"]?></span></span></li>					
				<?else:?>
					<li class="page-header-menu-sub-item-holder "><span title="<?=$arItem["TEXT"]?>" class="page-header-menu-sub-item page-header-menu-sub-item page-header-menu-sub-item--current"><span itemprop="name" class="page-header-menu-sub-item-name"><?=$arItem["TEXT"]?></span></span></li>
				<?endif?>

			<?else:?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>	
					<li class="page-header-menu-item-holder "><span title="<?=$arItem["TEXT"]?>" class="page-header-menu-item <?=$arItem["PARAMS"]['CLASS']?> page-header-menu-item page-header-menu-item--current"><span itemprop="name" class="page-header-menu-item-name"><?=$arItem["TEXT"]?></span></span>					
				<?else:?>
					<li class="page-header-menu-sub-item-holder "><span title="<?=$arItem["TEXT"]?>" class="page-header-menu-sub-item page-header-menu-sub-item page-header-menu-sub-item--current"><span itemprop="name" class="page-header-menu-sub-item-name"><?=$arItem["TEXT"]?></span></span>
				<?endif?>

			<?endif?>
		<?}else{?>
			<?if ($arItem["PERMISSION"] > "D"):?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>				
					<li class="page-header-menu-item-holder "><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" target="_self" class="page-header-menu-item <?=$arItem["PARAMS"]['CLASS']?>"><span itemprop="name" class="page-header-menu-item-name"><?=$arItem["TEXT"]?></span></a></li>
				<?else:?>
					<li class="page-header-menu-sub-item-holder "><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" target="_self" class="page-header-menu-sub-item "><span itemprop="name" class="page-header-menu-sub-item-name "><?=$arItem["TEXT"]?></span></a></li>
				<?endif?>

			<?else:?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="page-header-menu-item-holder "><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" target="_self" class="page-header-menu-item <?=$arItem["PARAMS"]['CLASS']?>"><span itemprop="name" class="page-header-menu-item-name"><?=$arItem["TEXT"]?></span></a></li>
				<?else:?>
					<li class="page-header-menu-sub-item-holder "><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" target="_self" class="page-header-menu-sub-item "><span itemprop="name" class="page-header-menu-sub-item-name "><?=$arItem["TEXT"]?></span></a></li>
				<?endif?>

			<?endif?>
		<?}?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></div></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
</nav>
<?endif?>