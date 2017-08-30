<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @global $APPLICATION */
$APPLICATION->SetTitle("Карта сайта");
?>

<? $APPLICATION->IncludeComponent(
	"uw:main.map",
	".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N",
		"LEVEL" => "4",
		"COL_NUM" => "1",
		"SHOW_DESCRIPTION" => "N"
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>