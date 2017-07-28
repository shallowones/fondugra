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
?>
<? if (count($arResult) > 0): ?>
    <nav class="nav">
        <? foreach ($arResult as $item): ?>
            <? if ($item['DEPTH_LEVEL'] === 1): ?>
                <a class="link nav__link" href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a>
            <? endif; ?>
        <? endforeach; ?>
    </nav>
<? endif; ?>