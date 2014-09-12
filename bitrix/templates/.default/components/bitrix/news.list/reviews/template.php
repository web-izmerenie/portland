<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="reviews">
	<div class="page-text page-text--indent">	  	  	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div itemprop="review" itemscope itemtype="http://schema.org/Review" class="review-item">
		<div itemprop="author" class="review-item-name"><?=$arItem['NAME']?></div>
		<div itemprop="description" class="review-item-description">
		<?=$arItem['PREVIEW_TEXT']?></div>
		<div class="review-item-date-holder">
		  <time datetime="<?=date('c', strtotime($arItem['DATE_ACTIVE_FROM']))?>" itemprop="datePublished" class="review-item-date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
		</div>
	  </div>
<?endforeach;?>
	</div>
</div>
