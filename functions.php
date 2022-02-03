<?php

    //register styles
    function blogvimmpag_styles(){
        wp_register_style('reset', get_template_directory_uri()."/assets/css/reset.css", [], false, false);
        wp_register_style('my-style', get_template_directory_uri()."/assets/css/style.css", [], false, false);
        wp_register_style('style-category', get_template_directory_uri()."/assets/css/categoria.css", [], false, false);
        wp_register_style('style-post', get_template_directory_uri()."/assets/css/post.css", [], false, false);
        wp_register_style('style-search', get_template_directory_uri()."/assets/css/search.css", [], false, false);

        wp_enqueue_style(['reset','my-style','style-category', 'style-post','style-search']);
    }
    add_action('wp_enqueue_scripts', 'blogvimmpag_styles');


    //register scripts and styles
    function blogvimmpag_scripts(){
        wp_register_script('my-script', get_template_directory_uri()."/assets/js/script.js", [], false, true);

        wp_enqueue_script(['my-script']);
    }
    add_action('wp_enqueue_scripts', 'blogvimmpag_scripts');
    
    // gerenciamento de logo
    function ed_custom_logo() {
        add_theme_support('custom-logo'); 
    }
    add_action('after_setup_theme', 'ed_custom_logo'); // carrega parametros de suporte do tema

    // Funções para Limpar o Header
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'start_post_rel_link', 10, 0 );
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Habilitar Menus
    add_theme_support('menus');//

    //register menu
    function register_my_menu() {
        register_nav_menu('menu-principal',__( 'Menu Principal' ));
    }
    add_action( 'init', 'register_my_menu' );

    //add support to thumbnail post
    add_theme_support( 'post-thumbnails', ['post']);

     //add custom length to excerpt
     function my_excerpt_length($length){
        return 25;
    }
    add_filter('excerpt_length', 'my_excerpt_length');

    include('admin/panel.php');

    //get name term by slug term
    function get_nameterm_by_slugterm($slugTerm){
        $get_id_term_query = [
            'taxonomy' => 'category',
            'hide_empty' => false,
            'slug' => $slugTerm,
        ];
        $get_id_term = get_terms($get_id_term_query);

        if($get_id_term){
            return $get_id_term[0]->name;
            echo "retornou true";
        }else{
            false;
            echo "retornou false";
        }
    }

    function get_idterm_by_slugterm($slugTerm){
        $get_id_term_query = [
            'taxonomy' => 'category',
            'hide_empty' => false,
            'slug' => $slugTerm,
        ];
        $get_id_term = get_terms($get_id_term_query);

        if($get_id_term){
            return $get_id_term[0]->term_id;
            echo "retornou true";
        }else{
            false;
            echo "retornou false";
        }
    }

    //function for count view more popular posts
    function wpb_set_post_views($postID) {
        $count_key = 'wpb_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
    //To keep the count accurate, lets get rid of prefetching
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

?>