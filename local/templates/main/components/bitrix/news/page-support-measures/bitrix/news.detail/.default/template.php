<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-detail">
    <table class="support-table">
        <? if (isset($arResult['DISPLAY_PROPERTIES']['recipient_support']['DISPLAY_VALUE'])): ?>
            <tr>
                <td>Получатель поддержки</td>
                <td><?= $arResult['DISPLAY_PROPERTIES']['recipient_support']['DISPLAY_VALUE'] ?></td>
            </tr>
        <? endif; ?>
        <? if (isset($arResult['DISPLAY_PROPERTIES']['limits_budgetary']['DISPLAY_VALUE'])): ?>
            <tr>
                <td>Лимиты бюджетных ассигнований для исполнения государственной поддержки на очередной финансовый год и плановый период</td>
                <td><?= $arResult['DISPLAY_PROPERTIES']['limits_budgetary']['DISPLAY_VALUE'] ?></td>
            </tr>
        <? endif; ?>
        <? if (isset($arResult['DISPLAY_PROPERTIES']['conditions_transfer']['DISPLAY_VALUE'])): ?>
            <tr>
                <td>Условия предоставления</td>
                <td><?= $arResult['DISPLAY_PROPERTIES']['conditions_transfer']['DISPLAY_VALUE'] ?></td>
            </tr>
        <? endif; ?>
        <? if (isset($arResult['DISPLAY_PROPERTIES']['other']['DISPLAY_VALUE'])): ?>
            <tr>
                <td>Прочее</td>
                <td><?= $arResult['DISPLAY_PROPERTIES']['other']['DISPLAY_VALUE'] ?></td>
            </tr>
        <? endif; ?>
    </table>
    <br>
    <? if ($arResult['organization']): ?>
        <b>Ответственный исполнитель государственной программы</b><br>
        <?= $arResult['organization']['name'] ?><br>
        <? if ($arResult['organization']['link']): ?>
            <i>Сайт:</i> <?= $arResult['organization']['link'] ?><br>
        <? endif; ?>
        <? if ($arResult['organization']['address']): ?>
            <i>Адрес:</i> <?= $arResult['organization']['address'] ?><br>
        <? endif; ?>
        <? if ($arResult['organization']['schedule']): ?>
            <i>График работы:</i> <?= $arResult['organization']['schedule'] ?><br>
        <? endif; ?>
        <? if ($arResult['organization']['phone']): ?>
            <i>Телефон:</i> <?= $arResult['organization']['phone'] ?><br>
        <? endif; ?>
    <? endif; ?>
    <br/>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'])): ?>
        <table class="support-table">
            <tr>
                <td>Тип файла</td>
                <td>Название документа для скачивания</td>
                <td>Размер файла</td>
            </tr>
            <? foreach ($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
                <tr>
                    <td><?= $arFile['ext'] ?></td>
                    <td><a href="<?= $arFile['SRC'] ?>"><?= $arFile['name'] ?></a></td>
                    <td><?= $arFile['size'] ?></td>
                </tr>
            <? endforeach; ?>
        </table>
    <? endif; ?>
</div>