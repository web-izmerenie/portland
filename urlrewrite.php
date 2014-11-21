<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/robots.txt(\\?|\$)#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/robots.php",
	),
	array(
		"CONDITION" => "#^/event/report/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/event/report/index.php",
	),
	array(
		"CONDITION" => "#^/event/board/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/event/board/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
);

?>