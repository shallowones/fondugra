<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="table black">
    <? if (isset($arResult['DISPLAY_PROPERTIES']['recipient_support']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="table-line-left">Наименование меры поддержки</div>
            <div class="table-line-right"><?= $arResult['DISPLAY_PROPERTIES']['recipient_support']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['limits_budgetary']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="table-line-left">Лимиты бюджетных ассигнований для исполнения государственной поддержки на
                очередной финансовый год и плановый период
            </div>
            <div class="table-line-right"><?= $arResult['DISPLAY_PROPERTIES']['limits_budgetary']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['conditions_transfer']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="table-line-left">Условия предоставления</div>
            <div class="table-line-right"><?= $arResult['DISPLAY_PROPERTIES']['conditions_transfer']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['other']['DISPLAY_VALUE'])): ?>
        <div class="table-line">
            <div class="table-line-left">Прочее</div>
            <div class="table-line-right"><?= $arResult['DISPLAY_PROPERTIES']['other']['DISPLAY_VALUE'] ?></div>
        </div>
    <? endif; ?>

<br>
	<div class="table-line-left">  ДОКУМЕНТЫ ДЛЯ ПОЛУЧАТЕЛЯ </div>
</div>
<? if (isset($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'])): ?>
    <? foreach ($arResult['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
        <a class="files__item" href="<?= $arFile['SRC'] ?>">
            <div class="files__item-format <?= $arFile['ext'] ?>"><?= $arFile['ext'] ?></div>
            <div class="files__item-desc">
                <?= $arFile['name'] ?> (<?= $arFile['size'] ?>)
            </div>
        </a>
    <? endforeach; ?>
<? endif; ?>
<? $this->SetViewTarget('organizationInfo'); ?>
<? if ($arResult['organization']): ?>
    <div class="inner-right">
        <div class="info">
            <div class="info-desc">Ответственный исполнитель</div>
            <div><b><?= $arResult['organization']['name'] ?></b></div>
            <br>
            <? if ($arResult['organization']['phone']): ?>
                <div class="info-line">
                    <div class="info-row label">Телефон:</div>
                    <div class="info-row"><?= $arResult['organization']['phone'] ?></div>
                </div>
            <? endif; ?>
            <? if ($arResult['organization']['link']): ?>
                <div class="info-line">
                    <div class="info-row label">Сайт:</div>
                    <div class="info-row"><a href="<?= $arResult['organization']['link'] ?>"
                                             target="_blank"><?= $arResult['organization']['link'] ?></a></div>
                </div>
            <? endif; ?>
            <? if ($arResult['organization']['address']): ?>
                <div class="info-line">
                    <div class="info-row label">Адрес:</div>
                    <div class="info-row"><?= $arResult['organization']['address'] ?></div>
                </div><br>
            <? endif; ?>
            <? if ($arResult['organization']['schedule']): ?>
                <div class="info-line">
                    <div class="info-row label">График работы:</div>
                    <div class="info-row"><?= $arResult['organization']['schedule'] ?></div>
                </div>
            <? endif; ?>
        </div>
    </div>
<? endif; ?>
<? $this->EndViewTarget(); ?>
