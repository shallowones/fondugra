<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
/** @var array $arParams */
?>
<hr class="hr">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
    <div class="main-news-item">
        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="link_clear"
           id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <div class="main-news-item__title h4"><? echo $arItem["NAME"] ?></div>
            <? endif; ?>
            <? if ($arItem["DISPLAY_PROPERTIES"]['short_description']['DISPLAY_VALUE']): ?>
                <span class="main-news-item__date"><? echo TruncateText(strip_tags($arItem["DISPLAY_PROPERTIES"]['short_description']['DISPLAY_VALUE']),
                        75); ?></span>
            <? endif; ?>
        </a>
    </div>
    <? endforeach; ?>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
