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

$pathTplMain = '/local/templates/main';

$manifest = json_decode(file_get_contents(Application::getDocumentRoot() . $pathTplMain . '/dist/manifest.json'),
    true);

$page = [
    'addCss' => [
        $pathTplMain . '/dist/fonts/bundle.css',
        $pathTplMain . '/dist/js/vendor/jquery.datepicker/jquery-datepicker.css',
        $pathTplMain . '/dist/js/vendor/jquery.selectmenu/jquery-selectmenu.css',
        $pathTplMain . '/dist/js/vendor/slick/slick.css',
        $pathTplMain . '/dist/css/' . $manifest['main.css'],
    ],
    'addJs' => [
        $pathTplMain . '/dist/js/vendor/jquery.js',
        $pathTplMain . '/dist/js/vendor/slick/slick.js',
        $pathTplMain . '/dist/js/vendor/jquery.selectmenu/jquery-selectmenu.js',
        $pathTplMain . '/dist/js/' . $manifest['main.js'],
        $pathTplMain . '/dist/js/' . $manifest['langSelect.js'],
        $pathTplMain . '/dist/js/' . $manifest['submenu.js'],
        $pathTplMain . '/dist/js/vendor/scrollmagic.js',
        $pathTplMain . '/dist/js/' . $manifest['animation.js']
    ]
];

foreach ($page as $method => $params) {
    array_map([$oAsset, $method], $params);
}
?>
<!DOCTYPE html>
<html lang="<? echo LANGUAGE_ID ?>">
<head>
    <title><? $APPLICATION->ShowTitle() ?> - <?= $siteName ?></title>
    <? $APPLICATION->ShowHead() ?>
</head>
<!-- класс .loading только для страницы frpu, чтобы показать лоадер-->
<body>
<div class="loading-overlay loading-overlay_visible"></div>
<div class="bx-panel"><? $APPLICATION->ShowPanel() ?></div>
<div class="page">
    <header class="header">
        <div class="container">
            <div class="headline"><a class="logo" href="/"></a>
                <? $APPLICATION->IncludeFile(
                    $pathTplMain . "/inc/hdr_icons.php",
                    Array('SEARCH_ID' => 'hdr_search'),
                    Array("MODE" => "text")
                ); ?>
                <div class="head-info">
                    <div class="head-info__item">
                        <? $APPLICATION->IncludeFile(
                            $pathTplMain . "/inc/hdr_email.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                        <? $APPLICATION->IncludeFile(
                            $pathTplMain . "/inc/hdr_ask_question.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                    <div class="head-info__item">
                        <? $APPLICATION->IncludeFile(
                            $pathTplMain . "/inc/hdr_phone.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                        <? $APPLICATION->IncludeFile(
                            $pathTplMain . "/inc/hdr_fax.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <? $APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
        "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
        "CHILD_MENU_TYPE" => "right",    // Тип меню для остальных уровней
        "DELAY" => "N",    // Откладывать выполнение шаблона меню
        "MAX_LEVEL" => "2",    // Уровень вложенности меню
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
    <section class="intro">
        <div class="container container_slim">
            <div class="intro-inner">
                <h1 class="intro__title" id="intro-title">государственный фонд<br>развития промышленности</h1>
                <div class="intro-text">
                    <div class="intro-text__left" id="intro-text-left">
                        <h3 class="text-bold">Содействует в <span class="text-orange">формировании  государственной политики </span>и <span class="text-orange">разработке ключевых <br>нормативно-правовых документов </span>в сфере промышленности.</h3><br>Участвует в реализации окружной программы развития промышленности<br>2018-2025 гг.
                    </div>
                    <div class="intro-text__right" id="intro-text-right">
                        <div class="intro-text__top">внедрил</div>
                        <div class="orange__number"> <span class="number number_22"></span></div>
                        <div class="intro-text__bottom">предложения</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro__overlay" id="intro-overlay"></div>
        <div class="intro__factory" id="intro-factory"></div>
        <div class="shape shape_intro2" id="intro-shape2"></div>
        <div class="shape shape_intro1" id="intro-shape1"></div>
        <div class="line line_orange line_orange-intro" id="intro-orange"></div>
        <div class="line line_black line_black-intro" id="intro-black"></div>
        <div class="polygon polygon_intro"></div>
    </section>
    <section class="stat">
        <div class="container container_slim">
            <div class="stat-inner">
                <div id="animation-anchor-1"></div>
                <h3 class="text-bold text-white stat-fade">Оказывает <span class="text-orange">финансовую поддержку субъектам деятельности </span>в сфере промышленности  по приоритетным направлениям развития.</h3><br><br>
                <h3 class="text-bold text-white stat-fade">Предоставляет льготные займы по проектам</h3>
            </div>
        </div>
        <div class="container stat-numbers">
            <div class="stat-fade">
                <div class="text-bold text-white">емкостью <span class="text-bold__small">от</span></div>
                <div class="orange__number"><span class="number number_40"></span></div>
                <div class="text-bold text-white text-right">млн руб</div>
            </div>
            <div class="stat-line"></div>
            <div class="stat-fade">
                <div class="text-bold text-white">на срок  <span class="text-bold__small">от</span></div>
                <div class="orange__number small-margin">
                    <div class="number_custom">20</div>
                    <div class="text-bold text-white"><span class="text-bold__small">до</span></div>
                    <div class="number_custom orange">500</div>
                </div>
                <div class="text-bold text-white text-right">млн руб.</div>
            </div>
            <div class="stat-line"></div>
            <div class="stat-fade">
                <div class="text-bold text-white">на сумму  <span class="text-bold__small">от</span></div>
                <div class="orange__number"><span class="number number_5"></span></div>
                <div class="text-bold text-white text-right">лет</div>
            </div>
            <div class="stat-line"></div>
            <div class="stat-fade">
                <div class="text-bold text-white">под</div>
                <div class="orange__number"><span class="number number_5"></span><span class="stat-numbers__percent">%</span></div>
                <div class="text-bold text-white text-right">годовых</div>
            </div>
        </div>
        <div id="animation-anchor-2"></div>
        <div class="news-more">
            <button class="button button_yellow">Получить заем фонда развития Югры</button>
        </div>
    </section>
    <section class="stat-white">
        <div class="line line_orange line_orange-stat-white" id="while-line-2"></div>
        <div class="line line_black line_black-stat-white" id="while-line-1"></div>
        <div class="container stat-white-head">
            <h3 class="text-bold stat-white-fade fixed"><span class="text-orange">Софинансирует проекты </span>совместно с фондом развития промышленности РФ.</h3>
            <div class="stat-white-number number_custom stat-white-fade"> <span>70</span>
                <div class="stat-white-desc">РФ<span>%</span></div>
            </div>
            <div class="stat-white-number number_custom big stat-white-fade"><span>30</span>
                <div class="stat-white-desc">Югра<span>%</span></div>
            </div>
            <div id="animation-anchor-3"></div>
            <div class="container container_slim stat-white-inner">
                <h3 class="text-bold stat-white-fade">развивает <span class="text-orange">промышленную инфраструктуру</span></h3>
            </div>
            <div class="container white-bottom">
                <div class="stat-numbers stat-numbers_white">
                    <div class="stat-white-fade">
                        <div class="text-bold">учавствует в создании</div>
                        <div class="orange__number"><span class="number number_4"></span><span class="stat-numbers__percent">-x</span></div>
                        <div class="text-bold text-right">индустриальных<br>парков</div>
                    </div>
                    <div class="stat-line stat-line_light"></div>
                    <div class="stat-white-fade">
                        <div class="text-bold">определил</div>
                        <div class="orange__number"><span class="number number_50"></span><span class="stat-white-fade mar-left">
                    <div class="text-bold">прощадок</div>
                    <div>в муниципальных <br>образованиях Югры<br>для размещения <br>промышленных объектов</div></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shape_stat-white2" id="shape-white-2"></div>
        <div class="shape shape_stat-white1" id="shape-white-1"></div>
        <div class="polygon polygon_stat-white"></div>
    </section>
    <section class="stat-window">
        <div class="container">
            <div class="one-window">
                <div class="one-window__item">
                    <div class="big-71"></div>
                    <div>
                        <div class="one-window__title">мера<br>поддержки</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="supports">
        <div class="container">
            <h2 class="supports__title">Выберите меру поддержки воспользовавшись <span class="text-orange">НАВИГАТОРОМ</span></h2>
            <div class="news-more">
                <button class="button button_yellow">подобрать меру поддержки</button>
            </div>
        </div>
    </section>
    <?
    $GLOBALS['FILTER_EVENTS'] = [
        '>=PROPERTY_date_to' => date('Y-m-d')
    ];
    ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "main-events",
        array(
            "ACTIVE_DATE_FORMAT" => "j F Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "N",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "FILTER_EVENTS",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "2",
            "IBLOCK_TYPE" => "lists",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "4",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Мероприятия",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "date_from",
                1 => "date_to",
                2 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "PROPERTY_date_from",
            "SORT_BY2" => "ID",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N",
            "COMPONENT_TEMPLATE" => "main-events"
        ),
        false
    );?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "main-news",
        array(
            "ACTIVE_DATE_FORMAT" => "j F Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "1",
            "IBLOCK_TYPE" => "-",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "4",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "important",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "PROPERTY_important",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N",
            "COMPONENT_TEMPLATE" => "main-news"
        ),
        false
    );?>
