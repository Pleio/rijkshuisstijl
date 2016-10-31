<?php
gatekeeper();

elgg_load_css("splash");
elgg_load_js("splash");

elgg_unregister_css("rijkshuisstijl");
elgg_unregister_js("rijkshuisstijl");

if (!subsite_manager_on_subsite()) {
    forward("/");
}

$site = elgg_get_site_entity();
$user = elgg_get_logged_in_user_entity();

if ($site->isUser($user->guid)) {
    forward("/");
}

$missing_fields = subsite_manager_get_missing_subsite_profile_fields($user->getGUID());

$form_vars = array(
    "class" => "rhs-splash js-validateForm"
);

$body_vars = array(
    "subsite" => $site,
    "profile_fields" => $missing_fields
);


if ($site->canJoin()) {
    if (empty($missing_fields) || $user->isAdmin()) {
        $url = elgg_add_action_tokens_to_url($subsite->url . "action/subsites/add_user");
        forward($url);
    } else {
        $title = elgg_echo("subsite_manager:subsites:join:missing_fields");
        $content = elgg_view_form("subsites/join/missing_fields", $form_vars, $body_vars);
    }
} else {
    switch ($site->getMembership()) {
        case Subsite::MEMBERSHIP_APPROVAL:
        case Subsite::MEMBERSHIP_DOMAIN_APPROVAL:
            $title = elgg_echo("subsite_manager:subsites:join:request");
            $content = elgg_view_form("subsites/join/request_approval", $form_vars, $body_vars);
            break;
        case Subsite::MEMBERSHIP_DOMAIN:
            $domains = $site->domains;
            if (!empty($domains)) {
                // get domains to validate against
                $domains = string_to_tag_array($domains);
                $title = elgg_echo("subsite_manager:subsites:join:validate_domain");
                $body_vars["domains"] = $domains;
                $content = elgg_view_form("subsites/join/validate_domain", $form_vars, $body_vars);
            } else {
                register_error(elgg_echo("subsite_manager:subsites:join:validate_domain:error:domains"));
                forward($subsite->getOwnerEntity()->url . "subsites");
            }
            break;
    }
}

echo elgg_view_page($title, $content, "empty", array(
    'header' => elgg_view("rijkshuisstijl/elements/header")
));
