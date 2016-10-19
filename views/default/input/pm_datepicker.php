<?php
$name = elgg_extract("name", $vars);
?>

<div class="rhs-form__date__input rhs-form__date__input--day">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text--hidden">
            Dag
        </span>
        <input name="<?php echo $name; ?>[]" type="number" min="1" max="31" placeholder="dag" data-validation="number=1-31" data-gotonextfield="splash-month" data-gotonextfield-validation="\d\d" class="rhs-form__input rhs-form__input--small-right-inset js-validateInput">
    </label>
</div>

<div class="rhs-form__date__input rhs-form__date__input--month">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text--hidden">
            Maand
        </span>
        <input name="<?php echo $name; ?>[]" type="number" min="1" max="12" placeholder="maand" data-validation="number=1-12" data-gotonextfield="splash-year" data-gotonextfield-validation="\d\d" class="rhs-form__input rhs-form__input--small-right-inset js-validateInput">
    </label>
</div>

<div class="rhs-form__date__input rhs-form__date__input--year">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text--hidden">
            Jaar
        </span>
        <input name="<?php echo $name; ?>[]" type="number" min="1900" placeholder="jaar" data-validation="number=1900-" class="rhs-form__input rhs-form__input--small-right-inset js-validateInput">
    </label>
</div>