<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>

<form class="mess-right white-b" action="">
    <input class="mess__input" name="q" title="Поиск" value="<? echo $arResult['REQUEST']['QUERY'] ?>">
    <button class="button button_yellow">Искать</button>
</form>

<? if ($arResult['SEARCH']): ?>
    <div class="list">
        <? foreach ($arResult['SEARCH'] as $item): ?>
            <a class="list-item" href="<? echo $item['URL'] ?>">
                <? if ($item['PREVIEW_PICTURE']): ?>
                    <img class="list-item__img" src="<? echo $item['PREVIEW_PICTURE'] ?>">
                <? endif; ?>
                <div class="list-item__desc">
                    <div class="list-item__date"><? echo $item['DATE_CUSTOM'] ?></div>
                    <div class="list-item__title"><? echo $item['TITLE_FORMATED'] ?></div>
                    <p><? echo $item['BODY_FORMATED'] ?></p>
                </div>
            </a>
        <? endforeach; ?>
    </div>
    <? echo $arResult['NAV_STRING'] ?>
<? else: ?>
    <div class="err-notify">По Вашему запросу ничего не найдено.</div>
<? endif; ?>
