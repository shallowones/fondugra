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

$newWidth = 1920;
$newHeight = 489;

foreach ($arResult["ITEMS"] as $key => $arItem) {
    if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem['PREVIEW_PICTURE'])) {
        $fileID = $arItem['PREVIEW_PICTURE']['ID'];

        $file = CFile::ResizeImageGet(
            $fileID,
            array('width' => $newWidth, 'height' => $newHeight),
            BX_RESIZE_IMAGE_EXACT,
            false
        );
        if ($file['src']) {
            $arResult["ITEMS"][$key]['PREVIEW_PICTURE']['SRC'] = $file['src'];
        }
    }
}