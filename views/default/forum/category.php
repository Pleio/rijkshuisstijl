<?php
	//$group = elgg_get_page_owner_entity();

	$questions = elgg_extract("questions", $vars);
	$page = elgg_extract("page", $vars);
	$maxPage = elgg_extract("maxPage", $vars);
  $group = elgg_extract("group", $vars);

	function getNumAnswers($question)
	{
		$answerOptions = array(
			"type" => "object",
			"subtype" => "answer",
			"container_guid" => $question->getGUID(),
			"count" => true
		);

		$numAnswers = elgg_get_entities($answerOptions);
		return $numAnswers;
	}
?>

<div class="rhs-forum-section">
<div class="rhs-container">
  <h1 class="rhs-forum__title">Populair</h1>
  <div class="rhs-row">
    <div class="rhs-col-md-4 rhs-col-lg-3 rhs-col-lg-offset-3 rhs-pull-right"><a href="/questions/add/<?php echo $group->guid ?>" class="rhs-button rhs-button--primary rhs-button--inline rhs-forum-section__button">+ Een vraag stellen</a></div>
    <div class="rhs-col-md-4 rhs-col-lg-3">
      <div class="rhs-forum__filter">
        <select name="filter" id="filter" data-label="Filter" class="elgg-input-dropdown selecter-default">
          <option value="1" selected>Alles</option>
          <option value="2">Meest bekeken</option>
          <option value="3">Mijn Vragen</option>
        </select>
      </div>
    </div>
    <div class="rhs-col-md-4 rhs-col-lg-3">
      <div class="rhs-forum__filter">
        <select name="thema" id="thema" data-label="Alle thema's" class="elgg-input-dropdown selecter-default" onchange="window.location.replace('/forum/category/' + this.value)">
          <option value="0" <?php echo $group && $group->guid == 0 ? 'selected' : '' ?>>Alle thema's</option>
          <?php 
            $groups = rijkshuisstijl_get_featured_groups(); 
            foreach ($groups as $groupEntity)
              echo '<option value="' . $groupEntity->guid . '"' . ($group && $group->guid == $groupEntity->guid ? 'selected' : '') . '>' . $groupEntity->name . '</option>';
          ?>
        </select>
      </div>
    </div>
  </div>
</div>
</div>
<div class="rhs-forum-section rhs-forum-section--grey rhs-last-section">
<div class="rhs-container">
  <div class="rhs-row">
	  <?php 
	  	foreach ($questions as $question)
	  	{
	  		echo elgg_view("forum/categoryQuestionRow", array('question' => $question, 'group' => $group));
	  	}
	  ?>
  </div>
  <?php if ($maxPage > 1) : ?>
  <div class="forum__pagination">
    <div class="rhs-pagination"><a href="/forum/category/<?php echo $page - 1 ?>" title="Vorige pagina" class="rhs-pagination__previous <?php echo $page <= 0 ? 'disabled' : '' ?>"><span class="rhs-icon-angle-left rhs-pagination__icon"></span></a>
      <form action="#" class="rhs-pagination__form">
        <input name="page-number" id="page-number" value="<?php echo $page ?>" class="rhs-pagination__input"><span class="rhs-pagination__maximum">van <?php echo $maxPage ?></span>
      </form>
      <a href="/forum/category/<?php echo $page + 1 ?>" title="Volgende pagina" class="rhs-pagination__next <?php echo $page >= $maxPage ? 'disabled' : '' ?>"><span class="rhs-icon-angle-right rhs-pagination__icon"></span></a>
    </div>
  </div>
  <?php endif ?>
</div>
<div id="modal-item" tabindex="0" class="rhs-modal">
  <div data-modal-id="#modal-item" class="rhs-modal__background js-toggleModal"></div>
  <div class="rhs-modal__box"> 
    <button data-modal-id="#modal-item" class="rhs-modal__close js-toggleModal">Sluit modal</button>
    <h2 class="rhs-modal__title">Stel uw vraag</h2>
    <div class="rhs-modal__content">
      <form action="/forum-item.html" novalidate class="js-validateForm js-validateItemForm">
        <div class="rhs-row">
          <div class="rhs-col-sm-12">
            <div class="rhs-form__element">
              <label class="rhs-form__label"><span class="rhs-form__label-text rhs-form__label-text--hidden">Titel van de vraag</span>
                <input id="js-itemTitle" placeholder="Titel van de vraag" type="text" autofocus data-only-validate-on-submit data-validation=".{10,}" data-validationMessage="De titel van uw vraag is te kort" class="rhs-form__input js-validateInput">
              </label>
            </div>
          </div>
        </div>
        <div class="rhs-row">
          <div class="rhs-col-sm-12">
            <div class="rhs-form__element">
              <textarea id="js-initiateTinymce" placeholder="Uw vraag"></textarea>
            </div>
          </div>
        </div>
        <div class="rhs-row">
          <div class="rhs-col-md-5">
            <select id="js-itemTheme" name="thema" data-label="custom" class="selecter-default">
              <option value="" selected="selected">Kies een thema</option>
              <option value="5">Inkomstenbelasting</option>
              <option value="4">Loonheffingen</option>
              <option value="3">Omzetbelasting</option>
              <option value="2">Toeslagen</option>
              <option value="1">Vennootschapsbelasting</option>
            </select>
          </div>
          <div class="rhs-col-sm-12">
            <div class="rhs-form__actions">
              <button id="js-tinymceButton" data-modal-id="#modal-item" class="rhs-button rhs-button--color-septenary rhs-button--disabled">Vraag</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>