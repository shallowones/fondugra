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

$manifest = json_decode(file_get_contents(Application::getDocumentRoot() . SITE_TEMPLATE_PATH . '/dist/manifest.json'),
    true);

$page = [
    'addCss' => [
        SITE_TEMPLATE_PATH . '/dist/fonts/bundle.css',
        SITE_TEMPLATE_PATH . '/dist/css/' . $manifest['main.css'],
        SITE_TEMPLATE_PATH . '/plugins/fancybox/jquery.fancybox.min.css',
    ],
    'addJs' => [
        SITE_TEMPLATE_PATH . '/dist/js/vendor/' . $manifest['jquery.js'],
        SITE_TEMPLATE_PATH . '/plugins/fancybox/jquery.fancybox.min.js',
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

<body>
<div class="bx-panel"><? $APPLICATION->ShowPanel() ?></div>
<div class="page">
    <header class="header">
        <div class="container">
            <div class="headline"><a class="logo" href="/"></a>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/inc/hdr_icons.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
                <div class="head-info">
                    <div class="head-info__item">
                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/inc/hdr_email.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/inc/hdr_ask_question.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                    <div class="head-info__item">
                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/inc/hdr_phone.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/inc/hdr_fax.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="navigation">
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
    <? if ($boolHomePage): ?>
        <section class="slider">big black slider</section>
        <? $APPLICATION->IncludeComponent("bitrix:news.list", "main-icons", Array(
            "ACTIVE_DATE_FORMAT" => "j F Y",    // Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",    // Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
            "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",    // Учитывать права доступа
            "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
            "CACHE_TYPE" => "A",    // Тип кеширования
            "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
            "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
            "DISPLAY_DATE" => "N",    // Выводить дату элемента
            "DISPLAY_NAME" => "Y",    // Выводить название элемента
            "DISPLAY_PICTURE" => "N",    // Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "N",    // Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
            "FIELD_CODE" => array(    // Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",    // Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "8",    // Код информационного блока
            "IBLOCK_TYPE" => "services",    // Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
            "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "3",    // Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
            "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
            "PAGER_TITLE" => "Иконки",    // Название категорий
            "PARENT_SECTION" => "",    // ID раздела
            "PARENT_SECTION_CODE" => "",    // Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(    // Свойства
                0 => "link",
                1 => "css_class",
                2 => "",
            ),
            "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",    // Устанавливать статус 404
            "SET_TITLE" => "N",    // Устанавливать заголовок страницы
            "SHOW_404" => "N",    // Показ специальной страницы
            "SORT_BY1" => "SORT",    // Поле для первой сортировки новостей
            "SORT_BY2" => "ID",    // Поле для второй сортировки новостей
            "SORT_ORDER1" => "ASC",    // Направление для первой сортировки новостей
            "SORT_ORDER2" => "DESC",    // Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
            "COMPONENT_TEMPLATE" => "main-links"
        ),
            false
        ); ?>
    <? endif; ?>
