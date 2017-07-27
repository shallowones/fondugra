<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 26.07.2017
 * Time: 15:20
 * @var array $arParams
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    if (!empty($arItem['PROPERTIES']['date_from']['VALUE'])) {
        $mDateFrom = MakeTimeStamp($arItem['PROPERTIES']['date_from']['VALUE']);
        $arItem['day_from'] = date('d', $mDateFrom);
        $arItem['month_from'] = ToUpper(FormatDate('F', $mDateFrom));
    }

    if (!empty($arItem['PROPERTIES']['date_to']['VALUE'])) {
        $mDateTo = MakeTimeStamp($arItem['PROPERTIES']['date_to']['VALUE']);
        $arItem['day_to'] = date('d', $mDateTo);
        $arItem['month_to'] = ToUpper(FormatDate('F', $mDateTo));
    }
}