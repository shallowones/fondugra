<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
    <div class="contacts">
        <? $APPLICATION->IncludeComponent("bitrix:news.list", "directory-contacts", Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
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
            "IBLOCK_ID" => "16",    // Код информационного блока
            "IBLOCK_TYPE" => "services",    // Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
            "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "20",    // Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
            "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
            "PAGER_TITLE" => "Сотрудники",    // Название категорий
            "PARENT_SECTION" => "",    // ID раздела
            "PARENT_SECTION_CODE" => "",    // Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(    // Свойства
                0 => "job",
                1 => "job_marker",
                2 => "email",
                3 => "on_br",
                4 => "",
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
        ),
            false
        ); ?>
        <div class="contacts__item">
            <div class="contacts__item-left">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/contact_stat_req.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
            <div class="contacts__item-right">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "inc/contact_bank_req.txt",
                    Array(),
                    Array("MODE" => "text")
                ); ?>
            </div>
        </div>
    </div>
    <div class="map-block">
        <? $APPLICATION->IncludeFile(
            SITE_DIR . "inc/contact_address.txt",
            Array(),
            Array("MODE" => "text")
        ); ?>
    </div>
    <div class="map">
        <?$APPLICATION->IncludeComponent(
            "bitrix:map.yandex.view",
            ".default",
            array(
                "CONTROLS" => array(
                    0 => "ZOOM",
                    1 => "MINIMAP",
                    2 => "TYPECONTROL",
                    3 => "SCALELINE",
                ),
                "INIT_MAP_TYPE" => "MAP",
                "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:61.008426519236615;s:10:\"yandex_lon\";d:68.99968493549325;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:68.997496252938;s:3:\"LAT\";d:61.008587976062;s:4:\"TEXT\";s:31:\"улица Энгельса, 45\";}}}",
                "MAP_HEIGHT" => "320",
                "MAP_ID" => "",
                "MAP_WIDTH" => "960",
                "OPTIONS" => array(
                    0 => "ENABLE_SCROLL_ZOOM",
                    1 => "ENABLE_DBLCLICK_ZOOM",
                    2 => "ENABLE_DRAGGING",
                ),
                "COMPONENT_TEMPLATE" => ".default"
            ),
            false
        );?>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>