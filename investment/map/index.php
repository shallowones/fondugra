<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта проектов Фонда");
$APPLICATION->SetDirProperty('inner_left_detail', ' detail');
?>
<? $APPLICATION->IncludeComponent('uw:map.list', '',
    [],
    false
); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>