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
<? if (count($arResult["ITEMS"]) > 0): ?>
    <section class="services">
        <div class="container">
            <div class="row service-list">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="col service__col" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a
                                class="service__link <?= $arItem['PROPERTIES']['css_class']['VALUE'] ?>"
                                href="<?= $arItem['link'] ?>"
                        >
                            <?= $arItem['NAME'] ?>
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
<? endif; ?>