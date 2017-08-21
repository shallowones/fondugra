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
<form class="side-form" action="<?= POST_FORM_ACTION_URI ?>" method="post">
    <div class="side-title">Форма поддержки</div>
    <div class="side-checkbox">
    <? foreach ($arResult['formsSupport'] as $keyItem => $item): ?>
        <input
                type="checkbox"
                name="formsSupport[]"
                value="<?= $item['id'] ?>"
                class="side-checkbox__input"
                id="check-<?= $keyItem ?>"
            <? if (in_array($item['id'], $arResult['restoreSupportFilter']['formsSupport'])) {
                echo 'checked';
            } ?>
        >
        <label class="side-checkbox__label" for="check-<?= $keyItem ?>"><?= $item['name'] ?></label>
    <? endforeach; ?>
    </div>
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
