<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
/** @var array $arParams */
?>

<div class="navigator">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="navigator-item"
           id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <div class="navigator-item-pic"><img
                            class="navigator-item__img"
                            src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                    /></div>
            <? endif ?>
            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <div class="navigator-item__title"><? echo $arItem["NAME"] ?></div>
            <? endif; ?>
            <? if ($arItem["DISPLAY_PROPERTIES"]['short_description']['DISPLAY_VALUE']): ?>
                <p><? echo TruncateText(strip_tags($arItem["DISPLAY_PROPERTIES"]['short_description']['DISPLAY_VALUE']),
                        75); ?></p>
            <? endif; ?>
        </a>
    <? endforeach; ?>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
