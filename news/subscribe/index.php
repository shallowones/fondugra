<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подписка на новости");
?>
<? $APPLICATION->IncludeComponent('uw:subscribe.form','',[],false); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>