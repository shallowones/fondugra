<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>

<div class="head-nav__language js-lang">
    <select name="language" title="">
        <? foreach ($arResult['langs'] as $label => $link): ?>
            <option value="<? echo $link ?>"<? echo (!$link) ? ' selected' : '' ?>>
                <? echo $label ?>
            </option>
        <? endforeach; ?>
    </select>
</div>
