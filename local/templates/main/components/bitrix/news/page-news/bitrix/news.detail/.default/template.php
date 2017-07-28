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
<div class="news-detail">
    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
        <img
                class="detail_picture"
                border="0"
                src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
                title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
        />
    <? endif ?>
    <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
        <span class="news-date-time"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
    <? endif; ?>
    <? if (strlen($arResult["DETAIL_TEXT"]) > 0): ?>
        <? echo $arResult["DETAIL_TEXT"]; ?>
    <? endif ?>
    <div style="clear:both"></div>
    <br/>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'])): ?>
        <? foreach ($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'] as $arFile): ?>
            <div class="photo-item"><a data-fancybox="gallery" href="<?= $arFile['BIG'] ?>"><img
                            src="<?= $arFile['SMALL'] ?>"></a></div>
        <? endforeach; ?>
    <? endif; ?>
</div>