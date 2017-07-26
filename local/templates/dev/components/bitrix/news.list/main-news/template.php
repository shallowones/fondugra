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
<h2>Новости</h2>
<div class="news-list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="news-item <? if (!empty($arItem['PROPERTIES']['important']['VALUE'])) {
            echo 'news-important';
        } ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                            class="preview_picture"
                            border="0"
                            src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                            alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                            title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            style="float:left"
                    /></a>
            <? endif; ?>
            <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                <span class="news-date-time"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
            <? endif ?>
            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"><b><? echo $arItem["NAME"] ?></b></a><br/>
            <? endif; ?>
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <div style="clear:both"></div>
            <? endif ?>
        </div>
    <? endforeach; ?>
</div>
<br>
<a href="/news/"><b>Все новости</b></a> /
<a href="/news/subscribe/"><b>Подписка</b></a>