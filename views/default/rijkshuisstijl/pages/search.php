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
            <input name="q" id="search" placeholder="<?php echo elgg_echo("search"); ?>" autocomplete="off" class="rhs-forum-action__search__input" value="<?php echo $vars['sanitized_query']; ?>">
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
            <?php echo $vars['total_results']['count']; ?> <?php echo elgg_echo('rijkshuisstijl:search:results'); ?>
          </span>
        </div>
      </div>
      <div class="rhs-content-header__menu">
        <?php foreach ($vars['types'] as $type): ?>
          <?php list($type, $subtype) = $type; ?>
          <a href="/search?q=<?php echo $vars['sanitized_query']; ?>&entity_type=<?php echo $type; ?><?php echo ($subtype) ? "&entity_subtype=" . $subtype : ""; ?>" class="rhs-content-header__link <?php echo ($vars['entity_subtype'] == $subtype) ? "active" : ""; ?>">
          <?php
            if ($subtype) {
              $count = isset($vars['total_results']['count_per_subtype'][$subtype]) ? $vars['total_results']['count_per_subtype'][$subtype] : 0;
            } else {
              $count = isset($vars['total_results']['count_per_type'][$type]) ? $vars['total_results']['count_per_type'][$type] : 0;
            }
          ?>
          <?php if ($subtype): ?>
            <?php echo elgg_echo("item:object:" . $subtype); ?> (<?php echo $count; ?>)
          <?php else: ?>
            <?php echo elgg_echo("item:" . $type); ?> (<?php echo $count; ?>)
          <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
</div>

<div class="rhs-container">
  <?php
  echo elgg_view('elasticsearch/search/list', array(
      'results' => $vars['results'],
      'params' => array(
          'limit' => $vars['limit'],
          'offset' => $vars['offset'],
          'query' => $vars['sanitized_query'],
          'search_type' => $vars['search_type'],
          'type' => $vars['type'],
          'subtype' => $vars['subtype'],
          'container_guid' => $vars['container_guid']
      )
  ));
  ?>
</div>