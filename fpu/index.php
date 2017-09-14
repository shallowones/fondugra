<?
if ($_SESSION["slow_vision"] == "Y") {
    LocalRedirect("/fpu/characteristic/");
}
define('S_PRINT_PAGE', true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Фонд промышленности Югры");
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>