<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Application;
use \Bitrix\Main\Config\Option;

global $APPLICATION;

$oAsset = Asset::getInstance();

$siteName = Option::get('main', 'site_name');
$CurDir = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory() . '/';
$boolHomePage = ($CurDir == '/');

$arPage = [
    'CSS' => [
        SITE_TEMPLATE_PATH . '/plugins/fancybox/jquery.fancybox.min.css',
    ],
    'JS' => [
        '//code.jquery.com/jquery-3.2.1.min.js',
        SITE_TEMPLATE_PATH . '/plugins/fancybox/jquery.fancybox.min.js',
    ]
];
foreach ($arPage['CSS'] as $arCSS) {
    $oAsset->addCss($arCSS);
}
foreach ($arPage['JS'] as $arJS) {
    $oAsset->addJs($arJS);
}
?>
<!DOCTYPE html>
<html lang="<? echo LANGUAGE_ID ?>">
<head>
    <title><? $APPLICATION->ShowTitle() ?> - <?= $siteName ?></title>
    <? $APPLICATION->ShowHead() ?>
</head>

<body>
    <div class="bx-panel"><? $APPLICATION->ShowPanel() ?></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "catalog_horizontal",
        array(
            "ALLOW_MULTI_SELECT" => "N",
            "CHILD_MENU_TYPE" => "left",
            "DELAY" => "N",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_GET_VARS" => array(
            ),
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "ROOT_MENU_TYPE" => "top",
            "USE_EXT" => "N",
            "COMPONENT_TEMPLATE" => "catalog_horizontal",
            "MENU_THEME" => "black"
        ),
        false
    );?>
    <? if (!$boolHomePage): ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        ); ?>
        <h1><? $APPLICATION->ShowTitle() ?></h1>
    <? endif; ?>
