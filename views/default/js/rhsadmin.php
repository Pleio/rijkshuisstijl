//<script>
elgg.provide('elgg.rhsadmin');

elgg.rhsadmin.init = function() {
    $('[data-colorpicker]').change(function(e) {
        $(this).parent().parent().find("[data-color]").css("background-color", e.target.value);
    });
}

elgg.register_hook_handler('init', 'system', elgg.rhsadmin.init);