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


if (isset($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE']['SRC'])) {
    $fileValue = $arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'];
    unset($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE']);
    $arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'][] = $fileValue;
}

if (isset($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'])) {
    foreach ($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $key => &$arFile) {
        $arFile['ext'] = end(explode('.', $arFile['FILE_NAME']));
        $arFile['name'] = str_replace('.' . $arFile['ext'], '', $arFile['ORIGINAL_NAME']);
        $arFile['ext'] = ToLower(end(explode('.', $arFile['FILE_NAME'])));
        $arFile['size'] = UW\Services::FBytes($arFile['FILE_SIZE'], 0);
    }
}

if (intval($arResult['PROPERTIES']['organization']['VALUE']) > 0) {
    $rsEl = CIBlockElement::GetByID($arResult['PROPERTIES']['organization']['VALUE']);
    if ($obEl = $rsEl->GetNextElement()) {
        $arFields = $obEl->GetFields();
        $arProperties = $obEl->GetProperties();

        $arResult['organization'] = [
            'name' => $arFields['NAME'],
            'link' => $arProperties['link']['VALUE'],
            'address' => $arProperties['address']['VALUE'],
            'schedule' => $arProperties['schedule']['VALUE']['TEXT'],
            'phone' => $arProperties['phone']['VALUE'],
        ];
    }
}