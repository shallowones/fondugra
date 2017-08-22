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
$this->setFrameMode(true);
?>
<form class="filter" action="#">
    <div class="filter-left">
        <div class="filter-date">
            <div class="filter-date__desc">От</div>
            <label class="filter-date__label js-calendar" for="date-1">
                <input class="filter-date__input" id="date-1">
            </label>
        </div>
        <div class="filter-date">
            <div class="filter-date__desc">До</div>
            <label class="filter-date__label js-calendar" for="date-2">
                <input class="filter-date__input" id="date-2" value="29.09.2017">
            </label>
        </div>
    </div>
    <div class="filter-right">
        <button class="button">Сбросить</button>
        <button class="button button_yellow">Применить</button>
    </div>
</form>
<div class="events">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>


     <a class="events-item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <img class="events-item__img" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
            <? endif ?>
            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <div class="events-item__title"><? echo $arItem["NAME"] ?></div>
            <? endif; ?>


         <? if ($arItem['month_from'] == $arItem['month_to']): ?>
         <div class="events-item__date">
            <? if (!empty($arItem['PROPERTIES']['date_from']['VALUE'])): ?>
                <?= $arItem['day_from'] ?>
            <? endif; ?>
            <? if (!empty($arItem['PROPERTIES']['date_to']['VALUE'])): ?>
                -
                <?= $arItem['day_to'] ?> <span style="text-transform: lowercase"><?= $arItem['month_to'] ?></span> <?= $arItem['years_to'] ?>
            <? endif; ?>
         </div>
             <?else:?>
             <div class="events-item__date">
                 <? if (!empty($arItem['PROPERTIES']['date_from']['VALUE'])): ?>
                     <?= $arItem['day_from'] ?> <span style="text-transform: lowercase"><?= $arItem['month_from'] ?></span>
                 <? endif; ?>
                 <? if (!empty($arItem['PROPERTIES']['date_to']['VALUE'])): ?>
                      -<?= $arItem['day_to'] ?> <span style="text-transform: lowercase"><?= $arItem['month_to'] ?></span> <?= $arItem['years_to'] ?>
                 <? endif; ?>
             </div>
         <?endif;?>
     </a>
    <? endforeach; ?>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
