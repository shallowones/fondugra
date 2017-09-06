<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
?>

<? if ($arResult['ITEMS']): ?>
    <div class="events">
        <? foreach ($arResult['ITEMS'] as $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a
                    id="<? echo $this->GetEditAreaId($item['ID']); ?>"
                    class="events-item"
                    href="<? echo $item['PROPERTIES']['LINK']['VALUE'] ?>"
                    data-fancybox
            >
                <div class="events-item-video">
                    <img class="events-item__img" src="<? echo $item['DISPLAY_PROPERTIES']['PICTURE']['FILE_VALUE']['SRC'] ?>"/>
                </div>
                <div class="events-item__title"><? echo $item['NAME'] ?></div>
            </a>
        <? endforeach; ?>
    </div>
<? else: ?>
    <p>Медиатека пуста.</p>
<? endif; ?>
