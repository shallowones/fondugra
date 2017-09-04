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
    <div class="side-title">Сегмент</div>
    <div class="side-checkbox">
        <? foreach ($arResult['segments'] as $keyItem => $item): ?>
            <input
                    type="checkbox"
                    name="segments[]"
                    value="<?= $item['id'] ?>"
                    class="side-checkbox__input"
                    id="check2-<?= $keyItem ?>"
                <? if (in_array($item['id'], $arResult['restoreSupportFilter']['segments'])) {
                    echo 'checked';
                } ?>
            >
            <label class="side-checkbox__label" for="check2-<?= $keyItem ?>"><?= $item['name'] ?></label>
        <? endforeach; ?>
    </div>
    <div class="side-title">Тип поддержки</div>
    <div class="side-checkbox">
    <? foreach ($arResult['typeSupport'] as $keyItem => $item): ?>
            <input
                    type="checkbox"
                    name="typeSupport[]"
                    value="<?= $item['id'] ?>"
                    class="side-checkbox__input"
                    id="check3-<?= $keyItem ?>"
                <? if (in_array($item['id'], $arResult['restoreSupportFilter']['typeSupport'])) {
                    echo 'checked';
                } ?>
            >
        <label class="side-checkbox__label" for="check3-<?= $keyItem ?>"><?= $item['name'] ?></label>
    <? endforeach; ?>
    </div>
    <button class="button button_yellow" name="setFilter" value="setFilter">Применить</button>
    <button class="button" name="clearFilter" value="clearFilter">Сбросить</button>
</form>
