<?php

add_submenu_page(
    "theme-options",
    "Configuração de Posts",
    "Configuração de Posts",
    "manage_options",
    "options_list_posts",
    "callback_posts_option"
);

function callback_posts_option(){
    ?>
    <div>
        
        <?php settings_errors(); ?>
        <h1>Configuração da exibição dos Posts</h1>
        <form method="post" action="options.php">
            <?php
            
                //add_settings_section callback is displayed here. For every new section we need to call settings_fields.
                settings_fields("posts_section");
                
                // all the add_settings_field callbacks is displayed here
                
                do_settings_sections("options_list_posts");

                // Add the submit button to serialize the options
                submit_button();
                
            ?>         
        </form>
    </div>
    <?php
}

function display_fields_posts(){
    
    add_settings_section("posts_section", "", "display_posts_options_content", "options_list_posts");

    add_settings_field("show_post_destaque", "Selecione o post de destaque", "display_post_destaque", "options_list_posts", "posts_section");
    add_settings_field("show_post_destaque_onoff", "ON/OFF Post Destaque", "display_post_destaque_onoff", "options_list_posts", "posts_section");
    add_settings_field("show_post_destaque_pagination", "Exibir em paginação", "display_post_destaque_pagination", "options_list_posts", "posts_section");

    register_setting("posts_section", "show_post_destaque");
    register_setting("posts_section", "show_post_destaque_onoff");
    register_setting("posts_section", "show_post_destaque_pagination");
}

function display_posts_options_content(){
    ?>
    <hr>
        <h2>Configuração Post em Destaque</h2>
    <?php
}
add_action("admin_init", "display_fields_posts");

function display_post_destaque(){
    $post_destaque_select = get_option('show_post_destaque');
    ?>
        <select class="select_post_destaque" name="show_post_destaque" id="show_post_destaque">
            <?php
                $args_post_destaque = [
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                ];
                $result_post_destaque = new WP_query($args_post_destaque);

            if($result_post_destaque->have_posts()): while($result_post_destaque->have_posts()): $result_post_destaque->the_post(); ?>
                <option value="<?= get_the_ID(); ?>" <?= $post_destaque_select == get_the_ID() ? "selected" : "" ?>><?= the_title(); ?></option>
            <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
        </select>
        <div style="margin: 20px 0 0;">
                <?php
                    $args_post_destaque_selected = [
                        'post_type' => 'post',
                        'p' => $post_destaque_select
                    ];
                    $result_post_destaque_selected = new WP_query($args_post_destaque_selected);
                    $post_selected = "";
                    if($result_post_destaque_selected->have_posts()): $result_post_destaque_selected->the_post();
                        $post_selected = get_the_title();
                    endif;
                ?>
            <p> Post em destaque: <strong style="font-size: 1.2em"><?= $post_selected != "" ? $post_selected : ""; ?> </strong></p>
        </div>
        <br>

        <script src="<?= get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
        <link href="<?= get_template_directory_uri(); ?>/assets/css/slimselect.min.css" rel="stylesheet" />
        <script src="<?= get_template_directory_uri(); ?>/assets/js/slimselect.min.js"></script>
        <script>
            //console.log(selects);
            var select = new SlimSelect({
                select: '.select_post_destaque'
            });
        </script>
    <?php
}

function display_post_destaque_onoff(){
    ?>
        
        <style>.switch{position:relative;display:inline-block;width:50px;height:24px}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:green;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:"";height:16px;width:16px;left:4px;bottom:4px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked+.slider{background-color:#999}input:focus+.slider{box-shadow:0 0 1px #2196f3}input:checked+.slider:before{-webkit-transform:translateX(26px);-ms-transform:translateX(26px);transform:translateX(26px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}</style>
        <label class="switch">
            <input type="checkbox" name="show_post_destaque_onoff" id="show_post_destaque_onoff" <?= get_option('show_post_destaque_onoff') == "on" ? "checked" : "" ?>>
            <span class="slider round"></span>
        </label>
        
    <?php
}

function display_post_destaque_pagination(){
    ?>
        <style>.switch{position:relative;display:inline-block;width:50px;height:24px}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:green;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:"";height:16px;width:16px;left:4px;bottom:4px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked+.slider{background-color:#999}input:focus+.slider{box-shadow:0 0 1px #2196f3}input:checked+.slider:before{-webkit-transform:translateX(26px);-ms-transform:translateX(26px);transform:translateX(26px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}</style>
        <label class="switch">
            <input type="checkbox" name="show_post_destaque_pagination" id="show_post_destaque_pagination" <?= get_option('show_post_destaque_pagination') == "on" ? "checked" : "" ?>>
            <span class="slider round"></span>
        </label>
    <?php
}
?>