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

if($_REQUEST["slow_vision"] === "Y"){
    $_SESSION["slow_vision"] = "Y";
    LocalRedirect("/fpu/characteristic/");
}

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
    ],
    'addString' => [
        '<link rel="shortcut icon" href="' . $pathTplMain . '/favicon.ico" type="image/x-icon">'
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
                    SITE_DIR . "inc/hdr_icons.php",
                    Array('SEARCH_ID' => 'hdr_search'),
                    Array("MODE" => "text")
                ); ?>
                <div class="head-info">
                    <div class="head-info__item">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/hdr_email.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/hdr_ask_question.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                    <div class="head-info__item">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/hdr_phone.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/hdr_fax.txt",
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
                <h1 class="intro__title" id="intro-title">
                    <? $APPLICATION->IncludeFile(
                        SITE_DIR . "inc/gos_fond_rezvitiy.txt",
                        Array(),
                        Array("MODE" => "text")
                    ); ?>
                </h1>
                <div class="intro-text">
                    <div class="intro-text__left" id="intro-text-left">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/sodeystvuet_formirov_gos_politiki.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                    <div class="intro-text__right" id="intro-text-right">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/vnedril_22_predlozheniy.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
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
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/okazyvaet_finansovuu_podderzhku.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
        </div>
        <div class="container stat-numbers">
            <div class="stat-fade">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/podderzhka_emkostu.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
            <div class="stat-line"></div>
            <div class="stat-fade">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/podderzhka_na_srok.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
            <div class="stat-line"></div>
            <div class="stat-fade">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/podderzhka_na_summu.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
            <div class="stat-line"></div>
            <div class="stat-fade">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/podderzhka_pod_5_procentov.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
        </div>
        <div id="animation-anchor-2"></div>
        <div class="news-more">
            <? $APPLICATION->IncludeFile(
                SITE_DIR . "inc/poluchit_zaem_fonda_razvitiy.txt",
                Array(),
                Array("MODE" => "text")
            ); ?>
        </div>
    </section>
    <section class="stat-white">
        <div class="line line_orange line_orange-stat-white" id="while-line-2"></div>
        <div class="line line_black line_black-stat-white" id="while-line-1"></div>
        <div class="container stat-white-head">
            <h3 class="text-bold stat-white-fade fixed">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/sofinansiruet_proekty.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </h3>
            <div class="stat-white-number number_custom stat-white-fade">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/sofinansiruet_proekty_70.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
            <div class="stat-white-number number_custom big stat-white-fade">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/sofinansiruet_proekty_30.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
            <div id="animation-anchor-3"></div>
            <div class="container container_slim stat-white-inner">
                <h3 class="text-bold stat-white-fade">
                    <? $APPLICATION->IncludeFile(
                        SITE_DIR . "inc/razvivaet_prom_infra.txt",
                        Array(),
                        Array("MODE" => "text")
                    ); ?>
                </h3>
            </div>
            <div class="container white-bottom">
                <div class="stat-numbers stat-numbers_white">
                    <div class="stat-white-fade">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/uchavstvuet_v_sozdanii.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                    <div class="stat-line stat-line_light"></div>
                    <div class="stat-white-fade">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/opredelil_ploshadok.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="container space-b">
                <div class="stat-white-fade">
                    <a class="button button_yellow" href="http://investugra.ru/rus/cabinet/type-request/" target="_blank">
                        Стать резидентом индустриального парка
                    </a>
                </div>
                <div class="stat-white-fade">
                    <a class="button button_yellow" href="http://map.investugra.ru/?lng=ru" target="_blank">
                        Подобрать площадку
                    </a>
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
                    <? $APPLICATION->IncludeFile(
                        SITE_DIR . "inc/kolichestvo_mer_podderzhki.txt",
                        Array(),
                        Array("MODE" => "text")
                    ); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="supports">
        <div class="container">
            <? $APPLICATION->IncludeFile(
                SITE_DIR . "inc/vyberite_meru_podderzhki.txt",
                Array(),
                Array("MODE" => "text")
            ); ?>
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
		"FILTER_NAME" => "",
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
		"SORT_BY2" => "",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "",
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
