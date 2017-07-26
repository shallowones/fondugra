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
        //SITE_TEMPLATE_PATH . '/flat-ui/css/vendor/bootstrap/css/bootstrap.min.css',
    ],
    'JS' => [
        //SITE_TEMPLATE_PATH . '/js/vendor/jquery/jquery-3.2.1.min.js',
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
    <? if (!$boolHomePage): ?>
        <h1><? $APPLICATION->ShowTitle() ?></h1>
    <? endif; ?>
