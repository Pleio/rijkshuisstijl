//<script>
elgg.provide("elgg.profile_manager");

var profile_manager_register_form_timers = new Array();

elgg.profile_manager.init = function(){
    // tab switcher on edit form
    $("#profile_manager_profile_edit_tabs a").click(function(){
        var id = $(this).attr("href").replace("#", "");
        $("#profile_manager_profile_edit_tabs li").removeClass("elgg-state-selected");
        $(this).parent().addClass("elgg-state-selected");
    
        $('#profile_manager_profile_edit_tab_content_wrapper>div').hide();
        $('#profile_manager_profile_edit_tab_content_' + id).show();
    });
    
    hash = window.location.hash;
    if(hash && $("#profile_manager_profile_edit_tabs " + hash).length > 0){
        $tab = $("#profile_manager_profile_edit_tabs " + hash + " a:visible");
        if($tab.length > 0){
            $tab.click();
        } else {
            $("#profile_manager_profile_edit_tabs a:first:visible").click();
        }
    } else {
        $("#profile_manager_profile_edit_tabs a:first:visible").click();
    }

    // registration form adjustments
    
    // validate on submit
    $(".elgg-form-register").live("submit", function(){
        var error_count = 0;
        var result = false;

        var $form = $(this);
        var selProfileType =  $("#custom_profile_fields_custom_profile_type").val();
        if(selProfileType == ""){
            selProfileType = 0;
        }
        
        $form.find(".mandatory").find("input, select, textarea").each(function(index, elem){
            
            switch($(elem).attr("type")){
                case "radio":
                case "checkbox":
                    $(elem).parent(".mandatory").removeClass("profile_manager_register_missing");

                    // check parents
                    var $parents = $(elem).parents(".profile_manager_register_category");
                    if(($parents.length == 0) || ($parents.hasClass("category_" + selProfileType) || $parents.hasClass("category_0"))){
                        if($form.find("input[name='" + $(elem).attr("name") + "']:checked").length == 0){
                            
                            $(elem).parent(".mandatory").addClass("profile_manager_register_missing");
                            error_count++;
                        }
                    }
                    break;
                default:
                    $(elem).removeClass("profile_manager_register_missing");
                    // also remove class from multiselect element
                    $(elem).next(".ui-multiselect").removeClass("profile_manager_register_missing");

                    // check parents
                    var $parents = $(elem).parents(".profile_manager_register_category");
                    if(($parents.length == 0) || ($parents.hasClass("profile_type_" + selProfileType) || $parents.hasClass("profile_type_0"))){
                    
                        if($(elem).is("select")){
                            if(($(elem).val() == null) || ($(elem).val() == "")){
                                $(elem).addClass("profile_manager_register_missing");
                                // also add class to multiselect element
                                $(elem).next(".ui-multiselect").addClass("profile_manager_register_missing");
                                
                                error_count++;
                            }
                        } else {
                            if($(elem).val() == ""){
                                $(elem).addClass("profile_manager_register_missing");
                                error_count++;
                            }
                        }
                    }
                    break;
            }
        });
    
        if(error_count > 0){
            alert(elgg.echo("profile_manager:register:mandatory"));
        } else {
            result = true;
        }
    
        return result;
    });
}

// show description and fields based on selected profile type (profile edit)
elgg.profile_manager.change_profile_type = function(){
    var selVal = $('#custom_profile_type').val();
    
    $('.custom_fields_edit_profile_category').hide();
    $('.custom_profile_type_description').hide();

    if(selVal != ""){
        $('.custom_profile_type_' + selVal).show();
        $('#custom_profile_type_description_'+ selVal).show();
    }
    
    if($("#profile_manager_profile_edit_tabs li.elgg-state-selected:visible").length == 0){
        $('#profile_manager_profile_edit_tab_content_wrapper>div').hide();
        $("#profile_manager_profile_edit_tabs a:first:visible").click();
    }
}

//show description and fields based on selected profile type (register form)
elgg.profile_manager.change_profile_type_register = function(){
    var selVal = $('#custom_profile_fields_custom_profile_type').val();
    if(selVal == "" || selVal == "undefined"){
        selVal = 0;
    }

    // profile type description
    $('div.custom_profile_type_description').hide();
    $('#'+ selVal).show();

    // tabs
    var $tabs = $('#profile_manager_register_tabbed');
    if($tabs.length > 0){
        $tabs.find('li').hide();
        $tabs.find(".profile_type_0, .profile_type_" + selVal).show();
        if($tabs.find('li.selected:visible').length == 0){
            $tabs.find('li:visible:first>a').click();
        } else {
            $tabs.find('li.selected:visible').click();
        }
    } else {
        // list
        $(".profile_manager_register_category").hide();
        $(".profile_manager_register_category.profile_type_0, .profile_manager_register_category.profile_type_" + selVal).show();
    }
}

// tab switcher on register form
elgg.profile_manager.toggle_tabbed_nav = function(div_id, element){
    $content_container = $('#profile_manager_register_tabbed').next();
    $content_container.find('>div').hide();
    $content_container.find('>div.category_' + div_id).show();

    $('#profile_manager_register_tabbed li.elgg-state-selected').removeClass('elgg-state-selected');
    $(element).parent('li').addClass("elgg-state-selected");
}

//register init hook
elgg.register_hook_handler("init", "system", elgg.profile_manager.init);