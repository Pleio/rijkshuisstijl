//<script>
elgg.provide("elgg.tinymce");

elgg.tinymce.init = function() {
    $(".elgg-input-longtext").parents("form").submit(function() {
        tinyMCE.triggerSave();
    });

    var toolbar = "bold,italic,forecolor,numlist,bullist,link,image,embed";

    if (elgg.is_admin_logged_in()) {
        toolbar = "bold,italic,forecolor,numlist,bullist,link,image,embed,code";
    }

    tinymce.PluginManager.add('placeholder', function(editor) {
        editor.on('init', function() {
            var label = new Label;

            onBlur();

            tinymce.DOM.bind(label.el, 'click', onFocus);
            editor.on('focus', onFocus);
            editor.on('blur', onBlur);
            editor.on('change', onBlur);
            editor.on('setContent', onBlur);

            function onFocus(){
                if(!editor.settings.readonly === true){
                    label.hide();
                }
                editor.execCommand('mceFocus', false);
            }

            function onBlur(){
                if(editor.getContent() == '') {
                    label.show();
                }else{
                    label.hide();
                }
            }
        });

        var Label = function(){
            var placeholder_text = editor.getElement().getAttribute("placeholder") || editor.settings.placeholder;
            var placeholder_attrs = editor.settings.placeholder_attrs || {style: {
                fontFamily: '"ROsanswebtext_regular", sans-serif',
                fontSize: '1.8rem',
                color: '#B4B4B4',
                position: 'absolute',
                top:0,
                left:0,
                padding: '1.1rem 1rem 1.1rem 1.25rem',
                width:'98%',
                overflow: 'hidden'
            }};
            var contentAreaContainer = editor.getContentAreaContainer();

            tinymce.DOM.setStyle(contentAreaContainer, 'position', 'relative');

            // Create label el
            this.el = tinymce.DOM.add( contentAreaContainer, "p", placeholder_attrs, placeholder_text );
        }

        Label.prototype.hide = function(){
            tinymce.DOM.setStyle( this.el, 'display', 'none' );
        }

        Label.prototype.show = function(){
            tinymce.DOM.setStyle( this.el, 'display', '' );
        }
    });

    tinyMCE.init({
        mode: "specific_textareas",
        editor_selector: "elgg-input-longtext",
        menubar: false,
        plugins: "autoresize,lists,spellchecker,fullscreen,paste,image,link,placeholder,code,textcolor",
        relative_urls: false,
        body_id: "content-editable",
        remove_script_host: false,
        document_base_url: elgg.config.wwwroot,
        menu: {},
        setup: function(editor) {
            editor.addButton("embed", {
                icon: "embed",
                onclick: function(e) {
                    elgg.embed.textAreaId = editor.id;
                    $.fancybox({
                        href:"/embed"
                    })
                }
            })
        },
        toolbar1: toolbar,
        browser_spellcheck: true,
        media_strict: false,
        content_css: "/css/rijkshuisstijl.css?v=<?php echo $CONFIG->lastcache; ?>",
        image_advtab: elgg.is_admin_logged_in(),
        language: "<?php echo get_language(); ?>"
    });
}

elgg.register_hook_handler("init", "system", elgg.tinymce.init);