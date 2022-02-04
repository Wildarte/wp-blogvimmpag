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

    add_settings_field("show_num_whatsapp", "Número do WhatsApp", "display_num_whatsapp", "options_list_whatsapp", "whatsapp_section");
    add_settings_field("show_onoff_whatsapp", "ON/OFF WhatsApp", "display_onoff_whatsapp", "options_list_whatsapp", "whatsapp_section");

    register_setting("whatsapp_section", "show_num_whatsapp");
    register_setting("whatsapp_section", "show_onoff_whatsapp");
}

function display_whatsapp_options_content(){
    ?>
    <hr>
        <h2>Configuração do whatsapp</h2>
    <?php
}
add_action("admin_init", "display_fields_whatsapp");

function display_num_whatsapp(){
    ?>
        <input type="text" name="show_num_whatsapp" id="show_num_whatsapp" value="<?= get_option('show_num_whatsapp'); ?>">
    <?php
}


function display_onoff_whatsapp(){
    ?>
        <style>.switch{position:relative;display:inline-block;width:50px;height:24px}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:green;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:"";height:16px;width:16px;left:4px;bottom:4px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked+.slider{background-color:#999}input:focus+.slider{box-shadow:0 0 1px #2196f3}input:checked+.slider:before{-webkit-transform:translateX(26px);-ms-transform:translateX(26px);transform:translateX(26px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}</style>
        <label class="switch">
            <input type="checkbox" name="show_onoff_whatsapp" id="show_onoff_whatsapp" <?= get_option('show_onoff_whatsapp') == "on" ? "checked" : "" ?>>
            <span class="slider round"></span>
        </label>
    <?php
}

?>