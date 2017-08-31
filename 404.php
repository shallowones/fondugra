<? define('ERR_404', true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @global $APPLICATION */
$APPLICATION->SetTitle("404 Страница не найдена");

?>

<div class="found-404">
    <div class="found-404-text">
        <span>Страница не найдена</span>
        Воспользуйтесь поиском или вернитесь на главную страницу
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
