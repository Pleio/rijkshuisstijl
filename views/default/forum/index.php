<?php
	$group = elgg_get_page_owner_entity();
	$user = elgg_get_logged_in_user_entity();
	$interests = rijkshuisstijl_get_interests($user);

	$questions = elgg_extract("questions", $vars);
?>

<div class="rhs-forum-section">
	<div class="rhs-container">
		<div class="rhs-row">
			<div class="rhs-col-md-6">
				<div data-accordion-item class="rhs-card-list">
					<h3 data-accordion-trigger class="rhs-card-list__title">Recente vragen</h3>
					<div class="rhs-card-list__content">
						<?php 
							foreach ($questions as $question)
								echo elgg_view("forum/forumQuestionRow", array('question' => $question));
						?>
						<a href="/forum/category/" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more"><span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Alles</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="rhs-forum-section rhs-forum-section--grey rhs-last-section">
	<div class="rhs-container">
		<h2 class="rhs-forum-section__title">Thema's</h2>
		<div class="rhs-row">
			<?php foreach (rijkshuisstijl_get_featured_groups() as $group): ?>
		        <?php         
		          if ($user && !in_array($group->guid, $interests))
		            continue; 
		        ?>				
		        <div class="rhs-col-md-6">
		          <div data-accordion-item="" class="rhs-card-list">
		            <h3 data-accordion-trigger="" class="rhs-card-list__title"><?php echo $group->name; ?></h3>
		            <div class="rhs-card-list__content">
		              <?php 
		                foreach (rijkshuisstijl_get_latest_objects_from_group('question', $group) as $question)
		                  echo elgg_view("forum/forumQuestionRow", array('question' => $question));
		              ?>
		              <a href="/forum/category/<?php echo $group->guid ?>" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
		                <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Alles
		              </a>
		            </div>
		          </div>
		        </div>
	      	<?php endforeach; ?>
		</div>
	</div>
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