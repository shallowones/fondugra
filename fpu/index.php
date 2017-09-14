<?
define("S_PRINT_PAGE", "N");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Фонд промышленности Югры");
if($_SESSION["slow_vision"] == "Y"){
    LocalRedirect("/fpu/characteristic/");
}
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>