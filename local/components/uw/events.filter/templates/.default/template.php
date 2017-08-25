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
<form class="filter" action="<?= POST_FORM_ACTION_URI ?>" method="post">
    <div class="filter-left">
        <div class="filter-date">
            <div class="filter-date__desc">От</div>
            <label class="filter-date__label js-calendar" for="date-1">
                <input class="filter-date__input" id="date-1" name="date_from" value="<?= $arResult['restoreEventsFilter']['date_from'] ?>">
            </label>
        </div>
        <div class="filter-date">
            <div class="filter-date__desc">До</div>
            <label class="filter-date__label js-calendar" for="date-2">
                <input class="filter-date__input" id="date-2" name="date_to" value="<?= $arResult['restoreEventsFilter']['date_to'] ?>">
            </label>
        </div>
    </div>
    <div class="filter-right">
        <button class="button" name="clearFilter" value="clearFilter">Сбросить</button>
        <button class="button button_yellow" name="setFilter" value="setFilter">Применить</button>
    </div>
</form>