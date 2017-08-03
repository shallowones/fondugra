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
<section class="section news">
    <div class="container">
        <h2 class="caption caption_white">Новости</h2>
        <div class="news-list">
            <div class="row">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="col" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a class="news__item" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
                            <div class="news__image">
                                <img
                                        class="image"
                                        src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                        alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                        title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                />
                            </div>
                            <div class="news-text">
                                <div class="news-text__title"><? echo $arItem["NAME"] ?></div>
                                <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                                    <div class="news-text__date"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
                                <? endif; ?>
                            </div>
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="news-more">
                <button class="button" type="button">Все новости</button>
            </div>
        </div>
    </div>
</section>