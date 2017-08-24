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
$subs = [];
if (count($arResult) > 0): ?>
    <section class="navigation navigation_fpu">
        <div class="container">
            <nav class="nav js-menu">
                <? foreach ($arResult as $keyItem => $item): ?>
                    <? if ($item["IS_PARENT"]):
                        $subs[] = '#sub-' . $keyItem; ?>
                        <span class="link nav__link" data-submenu="#sub-<?= $keyItem ?>"><?= $item['TEXT'] ?></span>
                    <? else: ?>
                        <a class="link nav__link" href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a>
                    <? endif; ?>
                <? endforeach; ?>
            </nav>
        </div>
    </section>
    <? if (count($subs) > 0): ?>
        <section class="nav-sub">
            <div class="container js-submenu">
                <? foreach ($arResult as $keyItem => $item): ?>
                    <? if ($item["IS_PARENT"]): ?>
                        <div class="seacher" id="sub-<?= $keyItem ?>">
                            <div class="submenu">
                                <? foreach ($item['CHILDREN'] as $keySubItem => $subItem): ?>
                                    <a class="link nav__link" href="<?= $subItem['LINK'] ?>"><?= $subItem['TEXT'] ?></a>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
        </section>
    <? endif; ?>
<? endif; ?>