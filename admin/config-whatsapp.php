<?php

add_submenu_page(
    "theme-options",
    "whatsapp",
    "whatsapp",
    "manage_options",
    "options_list_whatsapp",
    "callback_whatsapp_option"
);

function callback_whatsapp_option(){
    ?>
    <div>
        
        <?php settings_errors(); ?>
        <h1>Configuração do whatsapp</h1>
        <form method="post" action="options.php">
            <?php
            
                //add_settings_section callback is displayed here. For every new section we need to call settings_fields.
                settings_fields("whatsapp_section");
                
                // all the add_settings_field callbacks is displayed here
                
                do_settings_sections("options_list_whatsapp");

                // Add the submit button to serialize the options
                submit_button();
                
            ?>         
        </form>
    </div>
    <?php
}

function display_fields_whatsapp(){
    
    add_settings_section("whatsapp_section", "", "display_whatsapp_options_content", "options_list_whatsapp");

    add_settings_field("show_slide_post", "Forma de listagem dos slider post", "display_slide_post", "options_list_whatsapp", "whatsapp_section");

    register_setting("whatsapp_section", "show_slide_post");
}

function display_whatsapp_options_content(){
    ?>
    <hr>
        <h2>Configuração do whatsapp</h2>
    <?php
}
add_action("admin_init", "display_fields_whatsapp");


?>