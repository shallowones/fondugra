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
    <div class="project" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="project-title"><? echo $arItem["NAME"] ?></div>
        <div class="project-block">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <img class="project__img" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>">
            <? endif ?>
            <div class="project-info">
                <div class="project-info-line">
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['plan_invest']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top"><?= $arItem['PROPERTIES']['plan_invest']['VALUE'] ?></div>
                        <div class="project-unit-middle">
                            <? if ($arItem['PROPERTIES']['plan_invest']['VALUE']): ?>млрд руб<? else: ?>рассчитывается<? endif; ?>
                        </div>
                        <div class="project-unit-bottom">Планируемый объем инвестиций</div>
                    </div>
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['period_implement']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top small">
                            <?= str_replace('-', '<span class="delimiter"></span>',
                                $arItem['PROPERTIES']['period_implement']['VALUE']) ?>
                        </div>
                        <div class="project-unit-middle">
                            <? if ($arItem['PROPERTIES']['period_implement']['VALUE']): ?>гг<? else: ?>рассчитывается<? endif; ?>
                        </div>
                        <div class="project-unit-bottom">Период реализации проекта</div>
                    </div>
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['plan_budget']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top"><?= $arItem['PROPERTIES']['plan_budget']['VALUE'] ?></div>
                        <div class="project-unit-middle">
                            <? if ($arItem['PROPERTIES']['plan_budget']['VALUE']): ?>млрд руб<? else: ?>рассчитывается<? endif; ?>
                        </div>
                        <div class="project-unit-bottom">Планируемый бюджетный
                            эффект <?= $arItem['PROPERTIES']['plan_budget']['DESCRIPTION'] ?></div>
                    </div>
                </div>
                <div class="project-info-line">
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['irr']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top">
                            <? if (!$arItem['PROPERTIES']['irr']['VALUE']): ?>IRR
                            <? else: ?><?= $arItem['PROPERTIES']['irr']['VALUE'] ?><? endif; ?>
                        </div>
                        <div class="project-unit-middle">
                            <? if ($arItem['PROPERTIES']['irr']['VALUE']): ?>IRR
                            <? else: ?>рассчитывается<? endif; ?>
                        </div>
                    </div>
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['npv']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top">
                            <? if (!$arItem['PROPERTIES']['npv']['VALUE']): ?>NPV
                            <? else: ?><?= $arItem['PROPERTIES']['npv']['VALUE'] ?><? endif; ?>
                        </div>
                        <div class="project-unit-middle">
                            <? if ($arItem['PROPERTIES']['npv']['VALUE']): ?>NPV
                            <? else: ?>рассчитывается<? endif; ?>
                        </div>
                    </div>
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['period_payback']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top"><?= $arItem['PROPERTIES']['period_payback']['VALUE'] ?></div>
                        <div class="project-unit-middle">
                            <? if ($arItem['PROPERTIES']['period_payback']['VALUE']): ?>года<? else: ?>рассчитывается<? endif; ?>
                        </div>
                        <div class="project-unit-bottom">Период окупаемости проекта</div>
                    </div>
                    <div class="project-unit <? if (!$arItem['PROPERTIES']['jobs_created']['VALUE']): ?>wait<? endif; ?>">
                        <div class="project-unit-top"><?= $arItem['PROPERTIES']['jobs_created']['VALUE'] ?></div>
                        <div class="project-unit-middle">
                            <? if (!$arItem['PROPERTIES']['jobs_created']['VALUE']): ?>рассчитывается<? endif; ?>
                        </div>
                        <div class="project-unit-bottom">Создаваемые рабочие места</div>
                    </div>
                </div>
            </div>
        </div>
        <? if (count($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE']) > 0): ?>
            <? foreach ($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
                <a class="files__item" href="<?= $arFile['SRC'] ?>">
                    <div class="files__item-format <?= $arFile['ext'] ?>"><?= $arFile['ext'] ?></div>
                    <div class="files__item-desc">
                        <?= $arFile['name'] ?> (<?= $arFile['size'] ?>)
                    </div>
                </a>
            <? endforeach; ?>
        <? endif; ?>
    </div>
<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
