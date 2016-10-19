<?php
$becon_enabled = elgg_is_active_plugin("pleio_beconnummer");

if (!$becon_enabled) {
    register_error("BECON plugin is not enabled");
}

$becon = get_input("becon");
if ($becon && pleio_beconnummer_validate_beconnummer($becon)) {
    echo json_encode(["is_valid" => true]);
} else {
    echo json_encode(["is_valid" => false]);
}