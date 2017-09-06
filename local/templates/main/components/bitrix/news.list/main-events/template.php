<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>

<section class="section events">
    <div class="container">
        <h2 class="caption">Мероприятия</h2>
        <div class="event-list">
            <? if ($arResult['ITEMS']): ?>
                <? foreach ($arResult['ITEMS'] as $row): ?>
                    <div class="row">
                        <? foreach ($row as $arItem):
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="col" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                <a class="event__item" href="<? echo $arItem['DETAIL_PAGE_URL'] ?>">
                                    <div class="event__title"><? echo $arItem['NAME'] ?></div>
                                    <div class="event-date">
                                        <? if ($arItem['PROPERTIES']['date_from']['VALUE']): ?>
                                            <div class="event-date__date">
                                                <span class="event-date__day"><? echo $arItem['day_from'] ?></span>
                                                <? if ($arItem['month_from'] !== $arItem['month_to']): ?>
                                                    <span class="event-date__month"><? echo $arItem['month_from'] ?> <? echo ($arItem['years_to']) ? $arItem['years_to'] : '' ?></span>
                                                <? endif; ?>
                                            </div>
                                        <? endif; ?>
                                        <? if ($arItem['PROPERTIES']['date_to']['VALUE']): ?>
                                            <div class="event-date__delimiter"></div>
                                            <div class="event-date__date">
                                                <span class="event-date__day"><? echo $arItem['day_to'] ?></span>
                                                <span class="event-date__month"><? echo $arItem['month_to'] . ' ' . $arItem['years_to'] ?></span>
                                            </div>
                                        <? endif; ?>
                                    </div>
                                </a>
                            </div>
                        <? endforeach; ?>
                    </div>
                <? endforeach; ?>
            <? else: ?>
                <p align="center">На данный момент нет активных мероприятий.</p>
            <? endif; ?>
            <div class="news-more">
                <button class="button">Все мероприятия</button>
            </div>
        </div>
    </div>
</section>