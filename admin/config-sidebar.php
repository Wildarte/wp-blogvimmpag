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

    add_settings_field("show_cor_sidebar", "Cor de fundo da barra lateral", "display_cor_sidebar", "options_sidebar", "sidebar_section");
    add_settings_field("show_cor_text_sidebar", "Cor de fundo da barra lateral", "display_cor_text_sidebar", "options_sidebar", "sidebar_section");

    register_setting("sidebar_section", "show_cor_sidebar");
    register_setting("sidebar_section", "show_cor_text_sidebar");
}
function display_sidebar_options_content(){
    ?>
        <hr>
        <h2>Configurações da Barra lateral</h2>

    <?php
}
add_action("admin_init", "display_fields_sidebar");

function display_cor_sidebar(){
    $get_color_sidebar = get_option('show_cor_sidebar');
    ?>
        <style>
            .btn_color_sidebar{
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
            .btn_color_sidebar:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_sidebar" id="show_cor_sidebar" value="<?= $get_color_sidebar == "" ? "#120A8F" : $get_color_sidebar; ?>">
        <span class="btn_color_sidebar">&#8635;</span>
        <script>
            document.querySelector(".btn_color_sidebar").addEventListener("click", function(){
                document.getElementById("show_cor_sidebar").value = "#120A8F";
            });
        </script>
    <?php
}
function display_cor_text_sidebar(){
    $get_color_text_sidebar = get_option('show_cor_text_sidebar');
    ?>
        <style>
            .btn_color_text_sidebar{
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
            .btn_color_text_sidebar:hover{
                cursor: pointer;
            }
        </style>

        <input type="color" name="show_cor_text_sidebar" id="show_cor_text_sidebar" value="<?= $get_color_text_sidebar == "" ? "#ffffff" : $get_color_text_sidebar; ?>">
        <span class="btn_color_text_sidebar">&#8635;</span>
        <script>
            document.querySelector(".btn_color_text_sidebar").addEventListener("click", function(){
                document.getElementById("show_cor_text_sidebar").value = "#ffffff";
            });
        </script>
    <?php
}

function display_fields_sidebar_posts(){
    add_settings_section("sidebar_section_posts","","display_sidebar_posts_content", "options_sidebar");

    add_settings_field("show_posts_sidebar", "Forma de listagem dos Posts", "display_posts_sidebar", "options_sidebar", "sidebar_section_posts");
    add_settings_field("show_posts_sidebar_category", "", "display_posts_sidebar_category", "options_sidebar", "sidebar_section_posts");
    add_settings_field("show_posts_sidebar_keyword", "", "display_posts_sidebar_keyword", "options_sidebar", "sidebar_section_posts");

    register_setting("sidebar_section", "show_posts_sidebar");
    register_setting("sidebar_section", "show_posts_sidebar_category");
    register_setting("sidebar_section", "show_posts_sidebar_keyword");
   
}
add_action('admin_init', 'display_fields_sidebar_posts');

function display_sidebar_posts_content(){
    ?>
        <hr>
        <h2>Posts da barra lateral</h2>
    <?php
}
function display_posts_sidebar(){
    $get_option_posts_sidebar = get_option('show_posts_sidebar');
    ?>
        <select name="show_posts_sidebar" id="show_posts_sidebar">
            <option value="lastPost" <?= $get_option_posts_sidebar == "lastPost" ? "selected" : ""; ?>>Últimos posts</option>
            <option value="category" <?= $get_option_posts_sidebar == "category" ? "selected" : ""; ?>>Categoria</option>
            <option value="keyword" <?= $get_option_posts_sidebar == "keyword" ? "selected" : ""; ?>>Palavra-chave</option>
            <option value="moreread" <?= $get_option_posts_sidebar == "moreread" ? "selected" : ""; ?>>Mais lidos</option>
        </select>
    <?php
}

function display_posts_sidebar_category(){
    $get_show_post_sidebar = get_option('show_posts_sidebar');
    $get_category = get_option('show_posts_sidebar_category');
    ?>
        <select name="show_posts_sidebar_category" id="show_posts_sidebar_category" style="display:<?= $get_show_post_sidebar == "category" ? "display" : "none" ?>">
            <?php $name_term = get_nameterm_by_slugterm($get_category); ?>
            <option value="<?= $get_category ?>"><?= $name_term; ?></option>
            <?php $term_id = get_idterm_by_slugterm($get_category); ?>
            <?php
                $terms = get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                    'exclude' => $term_id
                ]);
                foreach($terms as $term){
                    echo "<option value='".$term->slug."'>".$term->name. "</option>";      
                }  
            ?>
        </select>
    <?php
}

function display_posts_sidebar_keyword(){
    $get_show_post_sidebar2 = get_option('show_posts_sidebar');
    $get_keyword = get_option('show_posts_sidebar_keyword');
    ?>
        <input type="text" name="show_posts_sidebar_keyword" id="show_posts_sidebar_keyword" style="display: <?= $get_show_post_sidebar2 == "keyword" ? "display" : "none" ?>" placeholder="keyword..." value="<?= $get_keyword; ?>">

        <script>
            document.getElementById("show_posts_sidebar").addEventListener("change", function(){
                var val_type = document.getElementById("show_posts_sidebar").value;

                switch(val_type){
                    case "category":
                        document.getElementById("show_posts_sidebar_category").style.display = "inline-block";
                        document.getElementById("show_posts_sidebar_keyword").style.display = "none";
                    break;
                    case "keyword":
                        document.getElementById("show_posts_sidebar_keyword").style.display = "inline-block";
                        document.getElementById("show_posts_sidebar_category").style.display = "none";
                    break;
                    default:
                        document.getElementById("show_posts_sidebar_keyword").style.display = "none";
                        document.getElementById("show_posts_sidebar_category").style.display = "none";
                }
            })
        </script>
        
    <?php
}

?>
