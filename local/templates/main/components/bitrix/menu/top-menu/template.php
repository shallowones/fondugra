<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

$subs = [];
if (count($arResult) > 0): ?>
    <section class="navigation navigation_fpu">
        <div class="container">
            <nav class="nav js-tmenu">
                <? foreach ($arResult as $keyItem => $item):
                    $subs[] = '#sub-' . $keyItem;
                    ?>
                    <? if ($item["IS_PARENT"]): ?>
                    <span
                            class="link nav__link"
                            data-submenu="#sub-<?= $keyItem ?>"
                        <? echo ($item['PARAMS']['load']) ? 'data-load="' . $item['LINK'] . '"' : '' ?>>
                            <?= $item['TEXT'] ?>
                        </span>
                <? else: ?>
                    <a class="link nav__link<? echo ($item['SELECTED']) ? ' active' : '' ?>"
                       href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?>
                    </a>
                <? endif; ?>
                <? endforeach ?>
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
                                    <a class="link nav__link<? echo ($subItem['SELECTED']) ? ' active' : '' ?>"
                                       href="<?= $subItem['LINK'] ?>"><?= $subItem['TEXT'] ?>
                                    </a>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
        </section>
    <? endif; ?>
<? endif; ?>