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
<? foreach ($arResult['deps'] as $department): ?>
    <div class="contacts__item">
        <div class="contacts__item-left">
            <? if ($department['info']['displayName']): ?>
                <div class="contacts-dep"><?= $department['info']['name'] ?></div>
            <? endif; ?>
            <? if (count($department['info']['phones']) > 0): ?>
                <div class="contacts-numbers">
                    <? foreach ($department['info']['phones'] as $number):
                        $arNumber = explode(';', $number) ?>
                        <div class="contacts-numbers__item"><?= $arNumber[0] ?><span><?= $arNumber[1] ?></span></div>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>
        <div class="contacts__item-right">
            <? foreach ($department['items'] as $item): ?>
                <?
                $this->AddEditAction($item['id'], $item['edit_link'],
                    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['id'], $item['delete_link'],
                    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"),
                    array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="contacts-unit" id="<?= $this->GetEditAreaId($item['id']); ?>">
                    <div class="contacts-unit__label<? if (!$item['jobMarker']) {
                        echo ' second';
                    } ?>"><?= $item['job'] ?></div>
                    <div class="contacts-unit__name"><?= $item['fio'] ?></div>
                    <? if ($item['email']): ?>
                        <a class="contacts-unit__email" href="emailto:<?= $item['email'] ?>"><?= $item['email'] ?></a>
                    <? else: ?>
                        <div class="contacts-unit__email"></div>
                    <? endif; ?>
                </div>
                <? if ($item['onBr']) {
                    echo '<br>';
                } ?>
            <? endforeach; ?>
        </div>
    </div>
<? endforeach; ?>
