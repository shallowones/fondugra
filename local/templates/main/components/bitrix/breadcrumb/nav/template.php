<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult)) {
    return "";
}

$strReturn = '';
$strReturn .= '<nav class="breadcrumbs">';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .=
            '<a class="breadcrumbs__item" href="' . $arResult[$index]["LINK"] . '">' . $title . '</a>';
    } else {
        $strReturn .= '<span class="breadcrumbs__item">' . $title . '</span>';
    }
}

$strReturn .= '</nav>';

return $strReturn;
