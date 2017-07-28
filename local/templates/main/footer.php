<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<!-- класс .banners_invert можно убрать, блок с баннерами станет серым-->
<section class="banners banners_invert">
    <div class="container">
        <div class="row banner-list">
            <div class="col">
                <a class="banner__item" href="#">
                    <div class="banner-image">
                        <img class="banner__image" src="<?= SITE_TEMPLATE_PATH ?>/upload/banner2.png">
                    </div>
                    <div class="banner-text">
                        <span class="banner-text__bold">
                            Единый сайт исполнительных органов государственной власти
                        </span>
                        Ханты-Мансийского автономного округа – Югры
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="banner__item" href="#">
                    <div class="banner-image">
                        <img class="banner__image" src="<?= SITE_TEMPLATE_PATH ?>/upload/banner2.png">
                    </div>
                    <div class="banner-text">
                        <span class="banner-text__bold">Инвестиционный портал </span>
                        Ханты-Мансийского автономного округа – Югры
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="banner__item" href="#">
                    <div class="banner-image">
                        <img class="banner__image" src="<?= SITE_TEMPLATE_PATH ?>/upload/banner2.png">
                    </div>
                    <div class="banner-text">
                        <span class="banner-text__bold">Инвестиционная карта</span>
                        Ханты-Мансийского автономного округа – Югры
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="headline headline_footer">
            <div class="copyright">Фонд развития Югры © 2017</div>
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
        <div class="to-top"><a class="to-top__link" href="#">наверх</a></div>
    </div>
</footer>
</div>
</body>
</html>