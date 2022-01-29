<?php

add_submenu_page(
    'theme-options',
    'Barra Lateral',
    'Barra Lateral',
    'manage_options',
    'options_sidebar',
    'callback_sidebar'
);

function callback_sidebar(){
    ?>

        <div>

            <?php settings_errors(); ?>
            <h1>Configurações da barra lateral</h1>
            <form action="options.php" method="post">

                <?php

                    settings_fields("sidebar_section");

                    do_settings_sections("options_sidebar");

                    submit_button();
                ?>

            </form>

        </div>

    <?php
}

function display_fields_sidebar(){
    add_settings_section("sidebar_section","","display_sidebar_options_content", "options_sidebar");

    add_settings_field("sweqw", "Cor de fundo da barra lateral", "dislay_cor_sidebar", "options_sidebar", "sidebar_section");

    register_setting("sidebar_section", "de");
}
function display_sidebar_options_content(){
    ?>

        <hr>
        <h2>Configurações da Barra lateral</h2>

    <?php
}
add_action("admin_init", "display_fields_sidebar");
?>