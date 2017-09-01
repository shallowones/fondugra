<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
?>
<div class="fond-map">
    <? foreach ($arResult['list'] as $key => $item):
        $countProjects = count($item['projects']);
        ?>
        <? if (is_array($item['projects']) && $countProjects > 0): ?>
        <div class="fond-map-dot" style="left: <?= $item['coordinate_x'] ?>px; top: <?= $item['coordinate_y'] ?>px;">
            <div class="fond-map-list js-popup">
                <input class="fond-map-list__input" type="checkbox" id="radio-<?= $key ?>">
                <label class="fond-map-list__label"
                       for="radio-<?= $key ?>"><span><?= ($countProjects > 1 ? $countProjects : ''); ?></span></label>
                <div class="fond-map-list-section">
                    <? foreach ($item['projects'] as $arProject): ?>
                        <? if (empty($arProject['link_map'])): ?>
                            <span class="fond-map-list-section__link"><?= $arProject['name'] ?></span>
                        <? else: ?>
                            <a class="fond-map-list-section__link" href="<?= $arProject['link_map'] ?>" target="_blank">
                                <?= $arProject['name'] ?>
                            </a>
                        <? endif; ?>
                    <? endforeach; ?>
                    <i class="close">&times;</i>
                </div>
            </div>
        </div>
    <? endif; ?>
        <? if ($item['touch_coordinate_x'] && $item['touch_coordinate_y']): ?>
        <div class="fond-map-touch"
             style="left: <?= $item['touch_coordinate_x'] ?>px; top: <?= $item['touch_coordinate_y'] ?>px;"></div>
    <? endif; ?>
        <? if ($item['city_coordinate_x'] && $item['city_coordinate_y']): ?>
        <div class="fond-map-city"
             style="left: <?= $item['city_coordinate_x'] ?>px; top: <?= $item['city_coordinate_y'] ?>px;"><?= $item['name'] ?></div>
    <? endif; ?>
    <? endforeach; ?>
</div>
<br>