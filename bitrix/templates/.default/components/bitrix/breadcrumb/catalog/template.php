<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";
	
$strReturn = '<ul itemprop="breadcrumb" class="page-heading-breadcrumbs justify-item">';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		$strReturn .= '<li class="page-heading-breadcrumb-item"><span class="page-heading-breadcrumb-item-name">'.$title.'</span></li>';
	else
		$strReturn .= '<li class="page-heading-breadcrumb-item page-heading-breadcrumb-item--active"><span class="page-heading-breadcrumb-item-name">'.$title.'</span></li>';
}

$strReturn .= '</ul>';

return $strReturn;
?>