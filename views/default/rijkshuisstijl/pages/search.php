<?php
$display_query = $vars['display_query']; // is sanitized
$results = $vars['results'];

$filter_type = $vars['filter_type'];
$filter_subtype = $vars['filter_subtype'];
?>

<div class="rhs-content-header rhs-content-header__search-results">
    <div class="rhs-container">
      <div class="rhs-row">
        <div class="rhs-col-md-9">
          <form class="rhs-forum-action__search">
            <label for="search" class="rhs-forum-action__search__label">
              <span class="rhs-icon-circle-arrow"></span>
              <span class="rhs-icon-search"></span>
            </label>
            <button type="submit" class="rhs-autocomplete__submit-button">
              <span class="rhs-icon-search"></span>
            </button>
            <input name="q" id="search" placeholder="<?php echo elgg_echo("search"); ?>" autocomplete="off" class="rhs-forum-action__search__input" value="<?php echo $display_query; ?>">
            <div class="rhs-autocomplete">
              <div class="rhs-autocomplete__results"></div>
              <button type="submit" class="rhs-autocomplete__more">
                <?php echo elgg_echo('rijkshuisstijl:search:view_all_results'); ?>
              </button>
            </div>
          </form>
        </div>
        <div class="rhs-col-md-3">
          <span class="rhs-search-results__amount">
            <?php echo $results['count']; ?> <?php echo elgg_echo('rijkshuisstijl:search:results'); ?>
          </span>
        </div>
      </div>
      <div class="rhs-content-header__menu">
        <a href="/search?q=<?php echo $display_query; ?>" class="rhs-content-header__link <?php echo (!$filter_subtype) ? "active" : ""; ?>">
        <?php echo elgg_echo("rijkshuisstijl:all"); ?> (<?php echo $results['count']; ?>)
        </a>
        <?php foreach ($results['count_per_subtype'] as $subtype => $count): ?>
          <a href="/search?q=<?php echo $display_query; ?>" class="rhs-content-header__link <?php echo ($subtype == $filter_subtype) ? "active" : ""; ?>">
          <?php echo elgg_echo("item:object:" . $subtype); ?> (<?php echo $count; ?>)
          </a>
        <?php endforeach; ?>
      </div>
    </div>
</div>

<div class="rhs-container">
  <div class="rhs-row">
    <?php
    echo elgg_view('elasticsearch/search/list', array(
        'results' => $results,
        'params' => array(
            'limit' => $limit,
            'offset' => $offset,
            'query' => $query,
            'search_type' => $search_type,
            'type' => $type,
            'subtype' => $subtype,
            'container_guid' => $container_guid
        )
    ));
    ?>
  </div>
</div>