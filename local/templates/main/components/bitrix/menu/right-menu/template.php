<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<? if (!empty($arResult)): ?>
    <ul class="side">
        <? foreach ($arResult as $item):
            $classOpen = '';
            foreach ($item['CHILDREN'] as $keySubItem => $subItem) {
                if ($subItem['SELECTED']) {
                    $classOpen = ' open';
                }
            }
            ?>
            <li class="side__item">
                <? if ($item["IS_PARENT"]): ?>
                    <div class="side__link parent js-menu<?= $classOpen ?>"><?= $item["TEXT"] ?></div>
                    <ul class="side-child js-side-child">
                        <? foreach ($item['CHILDREN'] as $keySubItem => $subItem): ?>
                            <li class="side-child__item">
                                <a class="side__link <? if ($subItem['SELECTED']) {
                                    echo 'active';
                                } ?>" href="<?= $subItem['LINK'] ?>">
                                    <?= $subItem['TEXT'] ?>
                                </a>
                            </li>
                        <? endforeach ?>
                    </ul>
                <? else: ?>
                    <a class="side__link <? if ($item['SELECTED']) {
                        echo 'active';
                    } ?>" href="<?= $item["LINK"] ?>">
                        <?= $item["TEXT"] ?>
                    </a>
                <? endif; ?>
            </li>
        <? endforeach ?>
    </ul>
<? endif ?>