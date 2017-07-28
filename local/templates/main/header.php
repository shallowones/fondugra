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
        SITE_TEMPLATE_PATH . '/fonts/bundle.css',
        SITE_TEMPLATE_PATH . '/css/main-cd8e383bb0.css',
        SITE_TEMPLATE_PATH . '/plugins/fancybox/jquery.fancybox.min.css',
    ],
    'JS' => [
        SITE_TEMPLATE_PATH . '/js/vendor.js',
        SITE_TEMPLATE_PATH . '/js/main.js',
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
<div class="page">
    <header class="header">
        <div class="container">
            <div class="headline"><a class="logo" href="/"></a>
                <nav class="head-nav">
                    <a class="head-nav__link head-nav__link_search" href="#"></a>
                    <a class="head-nav__link head-nav__link_map" href="#"></a>
                    <a class="head-nav__link head-nav__link_eye" href="#"></a>
                    <a class="head-nav__link head-nav__link_print" href="#"></a>
                </nav>
                <div class="head-info">
                    <div class="head-info__item">
                        e-mail: <a class="link" href="mailto:office@fondugra.ru"><b>office@fondugra.ru</b></a><br>
                        <a class="link" href="#"><b>Задать вопрос</b></a>
                    </div>
                    <div class="head-info__item">
                        тел.: <a class="link" href="tel:+73467301445">+7 3467 <b>301-445</b></a><br>
                        факс: <a class="link" href="tel:+73467301445">+7 3467 <b>301-445</b></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="navigation <? $APPLICATION->ShowProperty("navigationClass") ?>">
        <div class="container">
            <? $APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "1",    // Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                "COMPONENT_TEMPLATE" => "catalog_horizontal",
                "MENU_THEME" => "black",    // Тема меню
            ),
                false
            ); ?>
        </div>
    </section>
    <? if (!$boolHomePage && !defined('PAGE_FRPU')): ?>
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
    <? if ($boolHomePage): ?>
        <section class="slider">big black slider</section>
        <section class="services">
            <div class="container">
                <div class="row service-list">
                    <div class="col service__col">
                        <a class="service__link service__link_map" href="#">карта инвестиционных проектов</a>
                    </div>
                    <div class="col service__col">
                        <a class="service__link service__link_window" href="/one-window/">одно окно</a>
                    </div>
                    <div class="col service__col">
                        <a class="service__link service__link_compass" href="/support-measures/">
                            навигатор мер господдержки
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <? endif; ?>
