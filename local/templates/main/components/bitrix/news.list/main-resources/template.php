<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<?/*
echo '<pre>';
print_r($arResult);
echo '</pre>';*/
?>

<div class="resource-block">

    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a class="resource" style="background: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>') no-repeat center;" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" target="_blank" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="resource-line"><?=$arItem["NAME"]?></div>
            <div class="resource-line"><span><?=$arItem['DISPLAY_PROPERTIES']['DESCRIPTION']['VALUE']?></span></div>
        </a>

    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>