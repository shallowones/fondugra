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

<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <h3 class="h3"><? echo $arItem["NAME"] ?></h3>
    <div class="registry" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <? if ($arItem["PROPERTIES"]['municipality']['VALUE']): ?>
            <div class="registry__item">
                <div class="registry__item-text"><?= $arItem["PROPERTIES"]['municipality']['VALUE'] ?></div>
                <div class="registry__item-desc">Муниципалитет</div>
            </div>
        <? endif; ?>
        <? if ($arItem["PROPERTIES"]['plan_invest']['VALUE']): ?>
            <div class="registry__item">
                <div class="registry__item-number"><?= $arItem["PROPERTIES"]['plan_invest']['VALUE'] ?></div>
                <div class="registry__item-text">млрд руб</div>
                <div class="registry__item-desc">Планируемый объем инвестиций</div>
            </div>
        <? endif; ?>
        <? if ($arItem["PROPERTIES"]['plan_budget']['VALUE']): ?>
            <div class="registry__item">
                <div class="registry__item-number"><?= $arItem["PROPERTIES"]['plan_budget']['VALUE'] ?></div>
                <div class="registry__item-text">млрд руб</div>
                <div class="registry__item-desc">Планируемый бюджетный эффект</div>
            </div>
        <? endif; ?>
        <? if (count($arItem["PROPERTIES"]['links_map']['VALUE']) === 1): ?>
            <? foreach ($arItem["PROPERTIES"]['links_map']['VALUE'] as $keyLink => $href): ?>
                <a class="registry__item mapping" href="<?= $href ?>" target="_blank">
                    <? if ($arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink]): ?>
                        <?= $arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink] ?>
                    <? else: ?>
                        Проект на инвестиционной карте
                    <? endif; ?>
                </a>
            <? endforeach; ?>
        <? endif; ?>
        <? if (count($arItem["PROPERTIES"]['links_map']['VALUE']) > 1): ?>
            <div class="registry__item mapping">
                <? foreach ($arItem["PROPERTIES"]['links_map']['VALUE'] as $keyLink => $href): ?>
                    <a class="registry__item-link" href="<?= $href ?>" target="_blank">
                        <? if ($arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink]): ?>
                            <?= $arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink] ?>
                        <? else: ?>
                            Проект на инвестиционной карте
                        <? endif; ?>
                    </a>
                <? endforeach; ?>
            </div>
        <? endif; ?>
    </div>
    <br>
    <br>
    <? if (count($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE']) > 0): ?>
        <? foreach ($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
            <a class="files__item" href="<?= $arFile['SRC'] ?>" target="_blank">
                <div class="files__item-format <?= $arFile['ext'] ?>"><?= $arFile['ext'] ?></div>
                <div class="files__item-desc">
                    <?= $arFile['name'] ?> (<?= $arFile['size'] ?>)
                </div>
            </a>
        <? endforeach; ?>
    <? endif; ?>
<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
