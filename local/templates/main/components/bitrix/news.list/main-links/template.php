<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>

<section class="banners banners_invert">
    <div class="container">
        <div class="banner-list">
            <div class="slider-bottom main-slider">
                <? foreach ($arResult["ITEMS"] as $arGroup): ?>
                    <? foreach ($arGroup as $arItem): ?>
                        <a class="banner__item" href="<?= $arItem['link'] ?>" target="_blank">
                            <div class="banner-image">
                                <img
                                        class="banner__image"
                                        src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                        alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                        title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                />
                            </div>
                            <div class="banner-text">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </div>
                        </a>
                    <? endforeach; ?>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</section>
