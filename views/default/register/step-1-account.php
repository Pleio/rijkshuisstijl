<h1 class="rhs-splash__title">
    <?php echo elgg_echo("register"); ?>
    <span class="rhs-splash__title--lighter-font">
        <?php echo $vars["step"][0]; ?>/<?php echo $vars["step"][1]; ?>
    </span>
</h1>

<a href="/login" title="Terug naar login" class="rhs-splash__close">
    Terug naar login
</a>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo("rijkshuisstijl:register:name"); ?>*</span>
        <?php
        echo elgg_view("input/text", array(
            "name" => "name",
            "placeholder" => elgg_echo("rijkshuisstijl:register:name"),
            "class" => "rhs-form__input js-validateInput",
            "autofocus" => "autofocus",
            "data-validation" => ".{4,}",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:register:name:error")
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo("email"); ?>*</span>
        <?php
        echo elgg_view("input/text", array(
            "name" => "email",
            "placeholder" => elgg_echo("email"),
            "class" => "rhs-form__input js-validateRegisterEmail",
            "data-validation" => ".+@.+",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:register:email:error")
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo("password"); ?>*</span>
        <?php
        echo elgg_view("input/password", array(
            "id" => "password",
            "name" => "password",
            "value" => $password,
            "class" => "rhs-form__input js-validateInput",
            "placeholder" => elgg_echo("rijkshuisstijl:register:password:placeholder", array($CONFIG->min_password_length)),
            "data-validation" => ".{" . $CONFIG->min_password_length . ",}",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:register:password:error")
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo("passwordagain"); ?>*</span>
        <?php
        echo elgg_view("input/password", array(
            "name" => "password2",
            "value" => $password2,
            "class" => "rhs-form__input js-validateInput",
            "placeholder" => elgg_echo("rijkshuisstijl:register:password:enter_again"),
            "data-validation" => "duplicateOf=password",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:register:password_again:error")
        ));
        ?>
    </label>
</p>


<p class="rhs-form__actions">
    <?php echo elgg_view("output/url", array(
        "href" => "#",
        "text" => elgg_echo("rijkshuisstijl:previous"),
        "class" => "rhs-button rhs-button--link",
        "data-step-previous" => ""
    )); ?>

    <?php echo elgg_view("input/button", array(
        "href" => "/login",
        "value" => elgg_echo("rijkshuisstijl:next"),
        "class" => "rhs-button rhs-button--color-septenary rhs-button--disabled",
        "data-step-next" => ""
    )); ?>
</p>