<?php
$full_view = isset($vars['full_view']) ? $vars['full_view'] : false;
?>

<?php if (!$full_view): ?>
<div class="rhs-row">
  <div class="rhs-col-md-12">
    <h2 class="rhs-home__subtitle">Nieuws</h2><a href="/news" title="..." class="rhs-home__readmore">Alles</a>
  </div>
</div>
<div class="rhs-row">
  <div class="rhs-col-md-12">
<?php endif ?>

    <div class="rhs-news__featured-article">
      <div class="rhs-article rhs-article--content-right">
        <div style="background-image: url('<?php echo rijkshuisstijl_asset("image/woman.jpg"); ?>');" class="rhs-article__image"></div>
        <div class="rhs-article__content">
          <h2 class="rhs-article__title">Busciis a in non eium xplabo ratectatae</h2><span class="rhs-article__category">Toeslagen</span>
          <p class="rhs-article__text" style="word-wrap: break-word;">Nuscianditate secatin ulliti audanih illendisciis explabo ratectatae. Is rendi lorem ipsum. Nuscianditate secatin ulliti audanih illendisciis explabo ratectatae. Is rendi lorem ipsum</p>
          <div class="rhs-article__read-more"><a href="#" title="Titel hier.." class="rhs-read-more"><span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Lees meer</a></div>
        </div>
      </div>
    </div>

    <?php if ($full_view): ?>
      <div class="rhs-news__filter">
        <div class="rhs-row">
          <div class="rhs-col-md-4 rhs-col-lg-3">
            <div class="selecter  closed" tabindex="0"><select name="category" id="category" class="selecter-default selecter-element" tabindex="-1">
              <option value="all" selected="">Alle categoriën</option>
              <option value="nieuws">Nieuws</option>
              <option value="jurisprudentie">Jurisprudentie</option>
              <option value="uitgelicht">Uitgelicht</option>
            </select><span class="selecter-selected">Alle categoriën</span><div class="selecter-options"><span class="selecter-item selected" data-value="all">Alle categoriën</span><span class="selecter-item" data-value="nieuws">Nieuws</span><span class="selecter-item" data-value="jurisprudentie">Jurisprudentie</span><span class="selecter-item" data-value="uitgelicht">Uitgelicht</span></div></div>
          </div>
          <div class="rhs-col-md-4 rhs-col-lg-3">
            <div class="selecter  closed" tabindex="0"><select name="theme" id="thema" class="selecter-default selecter-element" tabindex="-1">
              <option value="all" selected="selected">Alle thema's</option>
              <option value="inkomstenbelasting">Inkomstenbelasting</option>
              <option value="loonheffing">Loonheffing</option>
              <option value="omzetbelasting">Omzetbelasting</option>
              <option value="toeslagen">Toeslagen</option>
              <option value="vennootschapsbelasting">Vennootschapsbelasting</option>
            </select><span class="selecter-selected">Alle thema's</span><div class="selecter-options"><span class="selecter-item selected" data-value="all">Alle thema's</span><span class="selecter-item" data-value="inkomstenbelasting">Inkomstenbelasting</span><span class="selecter-item" data-value="loonheffing">Loonheffing</span><span class="selecter-item" data-value="omzetbelasting">Omzetbelasting</span><span class="selecter-item" data-value="toeslagen">Toeslagen</span><span class="selecter-item" data-value="vennootschapsbelasting">Vennootschapsbelasting</span></div></div>
          </div>
        </div>
      </div>
    <?php endif ?>

    <?php if (!$full_view): ?>
      <div class="rhs-news-list-wrapper">
    <?php endif; ?>

      <div class="rhs-news-list"><a href="news-item.html" title="Titel van het artikel hier.." class="rhs-news-list__item"><span class="rhs-news-list__item__date">03-02-2016</span><span class="rhs-news-list__item__title">Belangrijkste wijzigingen belastingen 2016 aangepast</span><span class="rhs-news-list__item__category"><span class="rhs-icon-jurisprudentie rhs-news-list__item__category__icon"></span>Vennootschapsbelasting</span></a><a href="news-item.html" title="Titel van het artikel hier.." class="rhs-news-list__item"><span class="rhs-news-list__item__date">03-02-2016</span><span class="rhs-news-list__item__title">Belangrijkste wijzigingen belastingen 2016 aangepast</span><span class="rhs-news-list__item__category"><span class="rhs-icon-featured rhs-news-list__item__category__icon"></span>Toeslagen</span></a><a href="news-item.html" title="Titel van het artikel hier.." class="rhs-news-list__item"><span class="rhs-news-list__item__date">03-02-2016</span><span class="rhs-news-list__item__title">Belangrijkste wijzigingen belastingen 2016 aangepast</span><span class="rhs-news-list__item__category">Toeslagen</span></a><a href="news-item.html" title="Titel van het artikel hier.." class="rhs-news-list__item"><span class="rhs-news-list__item__date">03-02-2016</span><span class="rhs-news-list__item__title">Belangrijkste wijzigingen belastingen 2016 aangepast</span><span class="rhs-news-list__item__category">Toeslagen</span></a></div>

    <?php if (!$full_view): ?>
      </div>
    <?php endif ?>

    <?php if ($full_view): ?>
      <div class="rhs-news__pagination">
        <div class="rhs-pagination"><a href="#" title="Volgende pagina" class="rhs-pagination__previous disabled"><span class="rhs-icon-angle-left rhs-pagination__icon"></span></a>
          <form action="#" class="rhs-pagination__form">
            <input name="page-number" id="page-number" value="1" class="rhs-pagination__input"><span class="rhs-pagination__maximum">van 64</span>
          </form><a href="#" title="Volgende pagina" class="rhs-pagination__next"><span class="rhs-icon-angle-right rhs-pagination__icon"></span></a>
        </div>
      </div>
    <?php endif ?>

<?php if (!$full_view): ?>
  </div>
</div>
<?php endif ?>
