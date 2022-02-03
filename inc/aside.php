<?php
    $cor_sidebar = get_option('show_cor_sidebar');
    $cor_text_sidebar = get_option('show_cor_text_sidebar');
?>

<style>
    .sidebar .sidebar_content{
        background-color: <?= $cor_sidebar; ?>!important;
        color: <?= $cor_text_sidebar; ?>!important;
    }
    .sidebar_header form button.form_icon_search{
        background-color: <?= $cor_sidebar; ?>!important;
        opacity: .6;
    }
    
    .sidebar_header h3, .sidebar_posts_header h3, .sidebar_post_content h4, .sidebar_post_content p, .sidebar_categorias_header h3{
        color: <?= $cor_text_sidebar; ?>!important;
    }
    
</style>

<aside class="sidebar">
    <div class="sidebar_content">
        <header class="sidebar_header">
            <h3>Pesquise...</h3>
            <form action="<?= home_url(); ?>" method="get">
                <input type="text" name="s" id="" placeholder="...">
                <button type="submit" class="form_icon_search">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </header>
        <section class="sidebar_posts">
            <header class="sidebar_posts_header">
                <h3>Artigos mais lidos</h3>
            </header>
            <section class="sidebar_list_post">
                <?php

                    $get_metodo_list_post_sidebar = get_option('show_posts_sidebar');// retorna o método de listagem dos posts da lateral
                    $get_category = get_option('show_posts_sidebar_category');//retorna a categoria selecionada para o método de listagem por categoria
                    $get_keyword = get_option('show_posts_sidebar_keyword');//retorna a palavra-chave para o método de listagem por palavra-chave
                    switch($get_metodo_list_post_sidebar):
                        case "lastPost":
                            $args_list_post = [
                                'post_type' => 'post',
                                    'order' => 'DESC',
                                    'posts_per_page' => 3
                            ];
                        break;
                        case "category":
                            $args_list_post = [
                                'post_type' => 'post',
                                'category_name' => $get_category,
                                'order' => 'DESC',
                                'posts_per_page' => 3
                            ];
                        break;
                        case "keyword":
                            $args_list_post = [
                                'post_type' => 'post',
                                's' => $get_keyword,
                                'posts_per_page' => 3
                            ];
                        break;
                        case "moreread":
                            $args_list_post = [
                                'post_type' => 'post',
                                'order' => 'DESC',
                                'meta_key' => 'wpb_post_views_count',
                                'orderby' => 'meta_value_num',
                                'posts_per_page' => 3
                            ];
                        break;
                        default:
                            $args_list_post = [
                                'post_type' => 'post',
                                'order' => 'DESC',
                                'posts_per_page' => 3
                            ];
                    endswitch;

                    $result_list_post = new WP_Query($args_list_post);

                    if($result_list_post->have_posts()): while($result_list_post->have_posts()): $result_list_post->the_post();

                ?>
                <article class="sidebar_card_post">
                    <?php 
                        $thumb_post_sidebar = get_the_post_thumbnail_url(null, 'medium');
                        $thumb_post_sidebar == "" ? $thumb_post_sidebar = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                    ?>
                    <div class="sidebar_card_post_image" style="background-image: url('<?= $thumb_post_sidebar; ?>');">
                    </div>
                    <div class="sidebar_post_content">
                        <h4><?= get_the_title(); ?></h4>
                        <p><?= get_the_author(); ?>  -  <?= get_the_time("d/m/Y") ?></p>
                    </div>
                    <a class="link_post_sidebar" href="<?= get_the_permalink(); ?>"></a>
                </article>
                <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
                
            </section>
        </section>
        <div class="sidebar_categorias">
            <header class="sidebar_categorias_header">
                <h3>Categorias</h3>
            </header>
            <ul class="sidebar_list_categorias">
                <?php
                    
                    $terms = get_terms([
                        'taxonomy' => 'category',
                        'hide_empty' => false
                    ]);
                    foreach($terms as $term){
                        echo "<li><a href='". get_home_url() ."/category/". $term->slug. "'>".$term->name."</a></li>";        
                    }
                    
                ?>
            </ul>
        </div>
    </div>
</aside>