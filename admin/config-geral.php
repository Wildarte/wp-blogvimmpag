<?php

add_submenu_page(
    'theme-options',
    'Configurações Gerais',
    'Configurações Gerais',
    'manage_options',
    'option_geral',
    'callback_geral'
);

function callback_geral(){
    ?>
        <div>
            <?php settings_errors(); ?>
            <h1>Configurações gerais</h1>
            <form action="options.php" method="post">

                <?php

                    settings_fields("geral_section");

                    do_settings_sections("option_geral");

                    submit_button();

                ?>

            </form>
        </div>
    <?php
}

function display_fields_geral(){
    add_settings_section("geral_section","","display_geral_options_content", "option_geral");

    add_settings_field("show_geral", "config", "display_config","opti   on_geral", "geral_section");

    register_setting("geral_section", "show_geral");
}

function display_geral_options_content(){
    ?>
        <hr>
        <h2>Configurações Gerais</h2>
    <?php
}
add_action("admin_init", "display_fields_geral");
?>