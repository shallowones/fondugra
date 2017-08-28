<nav class="head-nav">
      <form class="head-nav__link head-nav__link_search" action="/search/" method="get">
        <input class="search__checkbox" type="checkbox" id="<?= $arParams['SEARCH_ID'] ?>">
        <input class="search__text js-search-input-header" name="q">
        <label class="search__label" for="<?= $arParams['SEARCH_ID'] ?>"></label><span class="head-nav__desc">Поиск</span>
      </form>
    <a class="head-nav__link head-nav__link_map" href="#"></a>
    <a class="head-nav__link head-nav__link_eye" href="#"></a>
    <a class="head-nav__link head-nav__link_print" href="#"></a>
    <form class="head-nav__language js-lang" action="#">
        <select name="language">
            <option value="RU" selected>RU</option>
            <option value="RU">EN</option>
        </select>
    </form>
</nav>