<?php 

    $subsite = elgg_extract("subsite", $vars, elgg_get_site_entity());
    $profile_fields = elgg_extract("profile_fields", $vars, false);
    $main_fields_configuration = subsite_manager_get_main_profile_fields_configuration(true);
    $show_buttons = elgg_extract("show_buttons", $vars, true);
    $registration_text = elgg_get_plugin_setting("registration_text", "rijkshuisstijl");

    $sticky_fields = elgg_get_sticky_values("subsite_missing_profile_fields");
    elgg_clear_sticky_form("subsite_missing_profile_fields");
    
    $user = elgg_get_logged_in_user_entity();
    
    if(!empty($profile_fields)){
        
        $fields = elgg_extract("fields", $profile_fields);
        $categories = elgg_extract("categories", $profile_fields);
        
        // show different categories        
        foreach($categories as $cat_guid => $category){
            // get nice category title
            $category_title = "";
            
            if(count($categories) > 1){
                if($cat_guid == 0){
                    $category_title = elgg_echo("profile_manager:categories:list:default");
                } else {
                    $category_title = $category->getTitle();
                }
            }
            
            // show profile fields
            $field_data = "";
            foreach($fields[$cat_guid] as $field){
                $metadata_name = $field->metadata_name;
                $metadata_type = $field->metadata_type;
                
                $field_options = $field->getOptions();
                $field_title = $field->getTitle();
                
                $value = elgg_extract("custom_profile_fields_" . $metadata_name, $sticky_fields, $user->get($metadata_name));
                
                // make field
                $field_class = "";
                if(($field->mandatory == "yes") || (isset($main_fields_configuration[$metadata_name]) && ($main_fields_configuration[$metadata_name]["mandatory"] === "yes"))){
                    $field_class = "mandatory";
                }
                
                $field_data .= "<div class='" . $field_class . "'>";
                $field_data .= "<label>" . $field_title . "</label>";
                
                if($hint = $field->getHint()){
                    $field_data .= "<span class='custom_fields_more_info' id='more_info_". $metadata_name . "'></span>";
                    $field_data .= "<span class='custom_fields_more_info_text' id='text_more_info_" . $metadata_name . "'>" . $hint . "</span>";
                }
                            
                $field_data .= elgg_view("input/" . $metadata_type, array(
                    "name" => "custom_profile_fields_" . $metadata_name,
                    "value" => $value,
                    "options" => $field_options
                ));
                $field_data .= "</div>";
            }
            
            $category_data .= $field_data;
        }
        
        $form_body .= elgg_view_module("info", $categories_title , $category_data);
        
        if($show_buttons){
            $form_body .= "<div class='elgg-foot'>";
            $form_body .= elgg_view("input/hidden", array("name" => "subsite_guid", "value" => $subsite->getGUID()));
            $form_body .= elgg_view("input/submit", array("value" => elgg_echo("submit")));
            $form_body .= "</div>";
        }

        ?>
        <h1 class="rhs-splash__title">
            <?php echo elgg_echo("register"); ?>
        </h1>
        <?php if ($registration_text): ?>
            <p class="rhs-form__element rhs-form__element--text">
                <?php echo $registration_text; ?>
            </p>
        <?php endif; ?>
        <?php
        echo "<div id='subsite-manager-subsites-join-missing-fields-wrapper'>";
        echo $form_body;
        echo "</div>";
        
        ?>
        <script type="text/javascript">
            $('#subsite-manager-subsites-join-missing-fields-wrapper .mandatory>label').append('*');

            $('#subsite-manager-subsites-join-missing-fields-wrapper').parents('form').submit(function(){
                var error_count = 0;
                var result = false;

                var $form = $(this);
                
                $form.find('.mandatory input, .mandatory select, .mandatory textarea').each(function(index, elem){
                    
                    switch($(elem).attr("type")){
                        case "radio":
                        case "checkbox":
                            $(elem).parent(".mandatory").removeClass("profile_manager_register_missing");
    
                            if($form.find("input[name='" + $(elem).attr("name") + "']:checked").length == 0){
                                
                                $(elem).parent(".mandatory").addClass("profile_manager_register_missing");
                                error_count++;
                            }
                            
                            break;
                        case "select":
                            $(elem).removeClass("profile_manager_register_missing");

                            if($form.find("select[name='" + $(elem).attr("name") + "'] option:selected").val() == ""){
                                $(elem).addClass("profile_manager_register_missing");
                                error_count++;
                            }
                            
                            break;
                        default:
                            $(elem).removeClass("profile_manager_register_missing");
    
                            if($(elem).val() == ""){
                                $(elem).addClass("profile_manager_register_missing");
                                error_count++;
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
        </script>
        <?php 
    }