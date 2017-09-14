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
    <table class="nav-table">
        <tr>
            <td>
                <div class="main-news-item__title h4">Форма поддержки</div>
                <? foreach ($arResult['formsSupport'] as $keyItem => $item): ?>
                <div class="cc">
                    <input
                            type="checkbox"
                            name="formsSupport[]"
                            value="<?= $item['id'] ?>"
                            class="cc__input"
                            id="check-<?= $keyItem ?>"
                        <? if (in_array($item['id'], $arResult['restoreSupportFilter']['formsSupport'])) {
                            echo 'checked';
                        } ?>
                    >
                    <label class="cc__label" for="check-<?= $keyItem ?>"><?= $item['name'] ?></label>
                </div>
                <? endforeach; ?>
            </td>
            <td>
                <div class="main-news-item__title h4">Сегмент</div>
                <? foreach ($arResult['segments'] as $keyItem => $item): ?>
                    <div class="cc">
                    <input
                                type="checkbox"
                                name="segments[]"
                                value="<?= $item['id'] ?>"
                                class="cc__input"
                                id="check2-<?= $keyItem ?>"
                            <? if (in_array($item['id'], $arResult['restoreSupportFilter']['segments'])) {
                                echo 'checked';
                            } ?>
                        >
                        <label class="cc__label" for="check2-<?= $keyItem ?>"><?= $item['name'] ?></label>
                    </div>
                <? endforeach; ?>
            </td>

            <td>
                <div class="main-news-item__title h4">Тип поддержки</div>
                <? foreach ($arResult['typeSupport'] as $keyItem => $item): ?>
                    <div class="cc">
                        <input
                                type="checkbox"
                                name="typeSupport[]"
                                value="<?= $item['id'] ?>"
                                class="cc__input"
                                id="check3-<?= $keyItem ?>"
                            <? if (in_array($item['id'], $arResult['restoreSupportFilter']['typeSupport'])) {
                                echo 'checked';
                            } ?>
                        >
                        <label class="cc__label" for="check3-<?= $keyItem ?>"><?= $item['name'] ?></label>
                    </div>
                <? endforeach; ?>
            </td>
        </tr>
    </table>
    <button class="form__submit" name="setFilter" value="setFilter">Применить</button>
    <button class="form__submit" name="clearFilter" value="clearFilter">Сбросить</button>
</form>
