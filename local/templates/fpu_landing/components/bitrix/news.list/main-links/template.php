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
    <section class="banners banners_invert">
        <div class="container">
            <div class="banner-list">
                <div class="slider main-slider">
                    <? foreach ($arResult["ITEMS"] as $arGroup): ?>
                        <div>
                            <div class="row row_banner">
                                <? foreach ($arGroup as $arItem): ?>
                                    <?
                                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                    ?>
                                    <div class="col" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <a class="banner__item" href="<?= $arItem['link'] ?>" target="_blank">
                                            <div class="banner-image">
                                                <img
                                                        class="banner__image"
                                                        src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                                        alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                                        title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                                />
                                            </div>
                                            <div class="banner-text">
                                                <?= $arItem['PREVIEW_TEXT'] ?>
                                            </div>
                                        </a>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>