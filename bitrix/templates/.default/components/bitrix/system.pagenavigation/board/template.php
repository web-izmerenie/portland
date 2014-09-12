<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($arResult["NavPageNomer"] < $arResult["NavPageCount"]){
	?><div class="ajax-pager ajax-pager--invisible"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>&empty=1<?=($_REQUEST['video'] ? '&video=1' : NULL)?>" data-container="cont1" class="ajax-pager-link custom-btn custom-btn--orange custom-btn--large custom-btn--uppercase custom-btn--nowrap"><span class="custom-btn-name">Показать еще</span></a></div><?
}