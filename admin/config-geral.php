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

    add_settings_field("show_desable_menu", "Habilitar Menu", "display_desable_menu", "option_geral", "geral_section");
    add_settings_field("show_cor_bar_top", "Cor da barra superior", "display_cor_bar_top", "option_geral", "geral_section");
    add_settings_field("show_cor_header", "Cor de fundo (cabeçalho home)", "display_cor_header", "option_geral", "geral_section");
    add_settings_field("show_cor_title_header", "Cor do título home", "display_cor_title_header", "option_geral", "geral_section");
    add_settings_field("show_cor_footer", "Cor do rodapé", "display_cor_footer", "option_geral", "geral_section");
    add_settings_field("show_cor_text_footer", "Cor do texto do rodapé", "display_cor_text_footer", "option_geral", "geral_section");

    register_setting("geral_section", "show_desable_menu");
    register_setting("geral_section", "show_cor_bar_top");
    register_setting("geral_section", "show_cor_bar_header");
    register_setting("geral_section", "show_cor_title_header");
    register_setting("geral_section", "show_cor_footer");
    register_setting("geral_section", "show_cor_text_footer");
}
add_action("admin_init", "display_fields_geral");

function display_geral_options_content(){
    ?>
        <hr>
        <h2>Configurações Gerais</h2>
    <?php
}

function display_desable_menu(){
    ?>
        <style>.switch{position:relative;display:inline-block;width:50px;height:24px}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:green;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:"";height:16px;width:16px;left:4px;bottom:4px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked+.slider{background-color:#999}input:focus+.slider{box-shadow:0 0 1px #2196f3}input:checked+.slider:before{-webkit-transform:translateX(26px);-ms-transform:translateX(26px);transform:translateX(26px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}</style>
        <label class="switch">
            <input type="checkbox" name="show_desable_menu" id="show_desable_menu" <?= get_option('show_desable_menu') == "on" ? "checked" : "" ?>>
            <span class="slider round"></span>
        </label>
    <?php
}

function display_cor_bar_top(){
    $get_color_bar_top = get_option('show_cor_bar_top');
    ?>
        <style>
            .btn_color_bar_top{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_color_bar_top:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_bar_top" id="show_cor_bar_top" value="<?= $get_color_bar_top == "" ? "#120A8F" : $get_color_bar_top; ?>">
        <span class="btn_color_bar_top">&#8635;</span>
        <script>
            document.querySelector(".btn_color_bar_top").addEventListener("click", function(){
                document.getElementById("show_cor_bar_top").value = "#120A8F";
            });
        </script>
    <?php
}

function display_cor_header(){
    $get_color_header = get_option('show_cor_bar_header');
    ?>
        <style>
            .btn_color_header{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_color_header:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_bar_header" id="show_cor_bar_header" value="<?= $get_color_header == "" ? "#120A8F" : $get_color_header; ?>">
        <span class="btn_color_header">&#8635;</span>
        <script>
            document.querySelector(".btn_color_header").addEventListener("click", function(){
                document.getElementById("show_cor_bar_header").value = "#120A8F";
            });
        </script>
    <?php
}

function display_cor_title_header(){
    $get_color_title_header = get_option('show_cor_title_header');
    ?>
        <style>
            .btn_color_title_header{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_color_title_header:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_title_header" id="show_cor_title_header" value="<?= $get_color_title_header == "" ? "#DBAA00" : $get_color_title_header; ?>">
        <span class="btn_color_title_header">&#8635;</span>
        <script>
            document.querySelector(".btn_color_title_header").addEventListener("click", function(){
                document.getElementById("show_cor_title_header").value = "#DBAA00";
            });
        </script>
    <?php
}
function display_cor_footer(){
    $get_color_footer = get_option('show_cor_footer');
    ?>
        <style>
            .btn_cor_footer{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_cor_footer:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_footer" id="show_cor_footer" value="<?= $get_color_footer == "" ? "#120A8F" : $get_color_footer; ?>">
        <span class="btn_cor_footer">&#8635;</span>
        <script>
            document.querySelector(".btn_cor_footer").addEventListener("click", function(){
                document.getElementById("show_cor_footer").value = "#120A8F";
            });
        </script>
    <?php
}
function display_cor_text_footer(){
    $get_color_text_footer = get_option('show_cor_text_footer');
    ?>
        <style>
            .btn_cor_text_footer{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_cor_text_footer:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_text_footer" id="show_cor_text_footer" value="<?= $get_color_text_footer == "" ? "#ffffff" : $get_color_text_footer; ?>">
        <span class="btn_cor_text_footer">&#8635;</span>
        <script>
            document.querySelector(".btn_cor_text_footer").addEventListener("click", function(){
                document.getElementById("show_cor_text_footer").value = "#ffffff";
            });
        </script>
    <?php
}


function display_fields_geral_cta(){
    add_settings_section("geral_cta_section","","display_geral_cta_options_content", "option_geral");

    add_settings_field("show_cta_geral", "texto do botão", "display_cta_geral", "option_geral", "geral_cta_section");
    add_settings_field("show_link_geral", "link do botão", "display_link_geral", "option_geral", "geral_cta_section");
    add_settings_field("show_cor_btn_geral", "lcor bot botão", "display_cor_btn_geral", "option_geral", "geral_cta_section");
    add_settings_field("show_cor_text_btn_geral", "cor bot botão", "display_cor_text_btn_geral", "option_geral", "geral_cta_section");

    register_setting("geral_section", "show_cta_geral");
    register_setting("geral_section", "show_link_geral");
    register_setting("geral_section", "show_cor_btn_geral");
    register_setting("geral_section", "show_cor_text_btn_geral");
}
add_action("admin_init", "display_fields_geral_cta");

function display_geral_cta_options_content(){
    ?>
        <hr>
        <h2>Configuração do CTA</h2>
    <?php
}
function display_cta_geral(){
    ?>
        <input type="text" name="show_cta_geral" id="show_cta_geral" value="<?= get_option('show_cta_geral') == "" ? "Simule Agora" : get_option('show_cta_geral'); ?>">
    <?php
}
function display_link_geral(){
    ?>
        <input type="url" name="show_link_geral" id="show_link_geral" value="<?= get_option('show_link_geral'); ?>">
    <?php
}
function display_cor_btn_geral(){
    $get_color_btn_geral = get_option('show_cor_btn_geral');
    ?>
        <style>
            .btn_color_geral{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_color_geral:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_btn_geral" id="show_cor_btn_geral" value="<?= $get_color_btn_geral == "" ? "#120A8F" : $get_color_btn_geral; ?>">
        <span class="btn_color_geral">&#8635;</span>
        <script>
            document.querySelector(".btn_color_geral").addEventListener("click", function(){
                document.getElementById("show_cor_btn_geral").value = "#120A8F";
            });
        </script>
    <?php
}

function display_cor_text_btn_geral(){
    $get_color_btn_geral = get_option('show_cor_text_btn_geral');
    ?>
        <style>
            .btn_color_text_geral{
                display: inline;
                border: none;
                height: 27px;
                width: 27px;
                padding: 2px;
                border: 1px solid #333;
                border-radius: 50%;
                color: #000;
                font-size: 1.4em;
                font-weight: 600;
            }
            .btn_color_text_geral:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_text_btn_geral" id="show_cor_text_btn_geral" value="<?= $get_color_btn_geral == "" ? "#ffffff" : $get_color_btn_geral; ?>">
        <span class="btn_color_text_geral">&#8635;</span>
        <script>
            document.querySelector(".btn_color_text_geral").addEventListener("click", function(){
                document.getElementById("show_cor_text_btn_geral").value = "#ffffff";
            });
        </script>
    <?php
}

?>