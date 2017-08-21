<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<? if (!empty($arResult)): ?>
    <ul class="side">
        <? foreach ($arResult as $arItem): ?>
            <li class="side__item">
                <a class="side__link <? if ($arItem['SELECTED']) {
                    echo 'active';
                } ?>" href="<?= $arItem["LINK"] ?>">
                    <?= $arItem["TEXT"] ?>
                </a>
            </li>
        <? endforeach ?>
    </ul>
<? endif ?>