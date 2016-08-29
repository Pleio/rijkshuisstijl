<?php
$plugins = elgg_get_plugin_setting("plugins", "tinymce_extended");
if(empty($plugins)){
    $plugins = elgg_echo("tinymce_extended:defaults:plugins");
}

$menu1 = elgg_get_plugin_setting("menu1", "tinymce_extended");
if(empty($menu1)){
    $menu1 = elgg_echo("tinymce_extended:defaults:menu1");
}

$menu2 = elgg_get_plugin_setting("menu2", "tinymce_extended");
$menu3 = elgg_get_plugin_setting("menu3", "tinymce_extended");

$valid_elements = elgg_get_plugin_setting("valid_elements", "tinymce_extended");
if(empty($valid_elements)){
    $valid_elements = elgg_echo("tinymce_extended:defaults:valid_elements");
}

?>
//<script>
elgg.provide('elgg.tinymce');

/**
 * Toggles the tinymce editor
 *
 * @param {Object} event
 * @return void
 */
elgg.tinymce.toggleEditor = function(event) {
    event.preventDefault();

    var target = $(this).attr('href');
    var id = $(target).attr('id');
    if (tinyMCE.get(id).isHidden()) {
        tinyMCE.editors[id].show();
        $(this).html(elgg.echo('tinymce:remove'));
    } else {
        tinyMCE.editors[id].hide();
        $(this).html(elgg.echo('tinymce:add'));
    }
}

/**
 * TinyMCE initialization script
 *
 * You can find configuration information here:
 * http://tinymce.moxiecode.com/wiki.php/Configuration
 */
elgg.tinymce.init = function() {
    $('.tinymce-toggle-editor').live('click', elgg.tinymce.toggleEditor);

    $('.elgg-input-longtext').parents('form').submit(function() {
        tinyMCE.triggerSave();
    });

    var calculateHeight = function($id) {
        var maxHeight = 500;
        var minHeight = 150;
        var height = 80 + $id.contents().find('body').height();
            height = height > maxHeight ? maxHeight : height;
            height = height < minHeight ? minHeight : height;
        return height;
    };

    tinyMCE.init({
        mode: "specific_textareas",
        editor_selector: "elgg-input-longtext",
        menubar: false,
        plugins: "lists,<?php echo $plugins;?>,noneditable,wordcount",
        relative_urls: false,
        body_id: 'content-editable',
        remove_script_host: false,
        document_base_url: elgg.config.wwwroot,
        menu: {},
        toolbar1: "<?php echo $menu1;?>",
        browser_spellcheck: true,
        media_strict: false,
        content_css: "/cache/css/default/rijkshuisstijl.css",
        image_advtab: true,
        language: "<?php echo get_language(); ?>",
        extended_valid_elements: "<?php echo $valid_elements;?>",
        setup : function(ed) {
            tinymceObject = ed;

            setTimeout( function(){
                var $id = $('#'+$(ed).attr('id')+'_ifr');

                $id.contents().find('body, html')
                .css({minHeight: 'auto', height: 'auto'});
                $id.css({ height:calculateHeight($id) });
            }, 200);

            ed.on('keydown', function(e) {
                var $id = $('#'+$(ed).attr('id')+'_ifr');

                setTimeout( function(){
                    $id.css({ height:calculateHeight($id) });
                }, 30);
            });

            ed.on('blur', function(e) {
                var $id = $('#'+$(ed).attr('id')+'_ifr');

                $id.css({ height:calculateHeight($id) });
            });
       }
    });
}

elgg.register_hook_handler('init', 'system', elgg.tinymce.init);