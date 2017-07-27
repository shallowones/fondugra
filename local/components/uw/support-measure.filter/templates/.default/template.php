<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 */
?>
<form action="<?= POST_FORM_ACTION_URI ?>" method="post">
    <h4>Форма поддержки</h4>
    <? foreach ($arResult['formsSupport'] as $item): ?>
        <label style="display: block; margin-bottom: 5px;">
            <input
                    type="checkbox"
                    name="formsSupport[]"
                    value="<?= $item['id'] ?>"
                <? if (in_array($item['id'], $arResult['restoreSupportFilter']['formsSupport'])) {
                    echo 'checked';
                } ?>
            >
            <?= $item['name'] ?>
        </label>
    <? endforeach; ?>
    <h4>Сегмент</h4>
    <? foreach ($arResult['segments'] as $item): ?>
        <label style="display: block; margin-bottom: 5px;">
            <input
                    type="checkbox"
                    name="segments[]"
                    value="<?= $item['id'] ?>"
                <? if (in_array($item['id'], $arResult['restoreSupportFilter']['segments'])) {
                    echo 'checked';
                } ?>
            >
            <?= $item['name'] ?>
        </label>
    <? endforeach; ?>
    <h4>Тип поддержки</h4>
    <? foreach ($arResult['typeSupport'] as $item): ?>
        <label style="display: block; margin-bottom: 5px;">
            <input
                    type="checkbox"
                    name="typeSupport[]"
                    value="<?= $item['id'] ?>"
                <? if (in_array($item['id'], $arResult['restoreSupportFilter']['typeSupport'])) {
                    echo 'checked';
                } ?>
            >
            <?= $item['name'] ?>
        </label>
    <? endforeach; ?>
    <button name="setFilter" value="setFilter">Применить</button>
    <br>
    <button name="clearFilter" value="clearFilter">Сбрсоить</button>
</form>
