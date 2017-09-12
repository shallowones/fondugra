<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
?>
<div class="main-news-item">
    <? if (isset($arResult['DISPLAY_PROPERTIES']['recipient_support']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="main-news-item__title h4">Наименование меры поддержки</div>
            <div class="main-news-item__title"><?= $arResult['DISPLAY_PROPERTIES']['recipient_support']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['limits_budgetary']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="main-news-item__title h4">Лимиты бюджетных ассигнований для исполнения государственной поддержки на
                очередной финансовый год и плановый период
            </div>
            <div class="main-news-item__title"><?= $arResult['DISPLAY_PROPERTIES']['limits_budgetary']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['conditions_transfer']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="main-news-item__title h4">Условия предоставления</div>
            <div class="main-news-item__title"><?= $arResult['DISPLAY_PROPERTIES']['conditions_transfer']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['other']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="main-news-item__title h4">Прочее</div>
            <div class="main-news-item__title"><?= $arResult['DISPLAY_PROPERTIES']['other']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>

    <br>
    <div class="main-news-item__title h4"> ДОКУМЕНТЫ ДЛЯ ПОЛУЧАТЕЛЯ</div>
</div>
<? if (isset($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'])): ?>
    <? foreach ($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
        <a class="link_clear_elem" href="<?= $arFile['SRC'] ?>">
            <div>
                <?= $arFile['name'] ?> (<?= $arFile['size'] ?>)
            </div>
        </a>
    <? endforeach; ?>
<? endif; ?>
<? $this->SetViewTarget('organizationInfo'); ?>
<? if ($arResult['organization']): ?>
    <div class="main-news-item">
            <div class="main-news-item__title h2">Ответственный исполнитель</div>
            <div><b><?= $arResult['organization']['name'] ?></b></div>
            <? if ($arResult['organization']['phone']): ?>
                    <div class="main-news-item__title h4">Телефон:
                        <span class="main-news-item__title"><?= $arResult['organization']['phone'] ?></span>
                    </div>
            <? endif; ?>
            <? if ($arResult['organization']['email']): ?>
                    <div class="main-news-item__title h4">E-mail:
                        <span class="main-news-item__title">
                            <a href="mailto:<?= $arResult['organization']['email'] ?>">
                                <?= $arResult['organization']['email'] ?>
                            </a> </span>
                    </div>
            <? endif; ?>
            <? if ($arResult['organization']['link']): ?>
                    <div class="main-news-item__title h4">Сайт:
                        <span class="main-news-item__title"><a href="<?= $arResult['organization']['link'] ?>"
                                                 target="_blank"><?= $arResult['organization']['link'] ?></a></span>
                    </div>
            <? endif; ?>
            <? if ($arResult['organization']['address']): ?>
                    <div class="main-news-item__title h4">Адрес:
                     <span class="main-news-item__title"><?= $arResult['organization']['address'] ?></span>
                    </div>
            <? endif; ?>
            <? if ($arResult['organization']['schedule']): ?>
                    <div class="main-news-item__title h4">График работы:
                        <span class="main-news-item__title"><?= $arResult['organization']['schedule'] ?></span>
                    </div>
            <? endif; ?>
    </div>
<? endif; ?>
<? $this->EndViewTarget(); ?>
