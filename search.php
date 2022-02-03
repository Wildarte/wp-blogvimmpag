<?php get_header(); 
$s = $_GET['s'];
?>
    
    <div class="pesquisa_intro">
        <h2><strong>"<?= $s ?>"</strong></h2>
    </div>

    <main class="container main">

        <?php
            $args_search_page = [
                'post_type' => 'post',
                's' => $s
            ];
            $results_search_page = new WP_Query($args_search_page);
        ?>
        <?php if($results_search_page->have_posts()): ?>
        <header class="header_pesquisa_page">
            
            <h3>Resultados da pesquisa por: <strong>"<?= $s ?>"</strong> </h3>
            
            <hr>
        </header>
        
        <section class="section_posts">

            <?php

                if($results_search_page->have_posts()):
                    while($results_search_page->have_posts()):
                        $results_search_page->the_post();

            ?>

            <article class="single_card card_post">
                <div class="post_image">
                    <?php 
                        $thumb_search_post = get_the_post_thumbnail_url(null, 'medium');
                        $thumb_search_post == "" ? $thumb_search_post = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                    ?>
                    <div class="post_image_content" style="background-image: url('<?= $thumb_search_post ?>');">

                    </div>
                </div>
                <header class="post_header">
                    <h2><?= get_the_title(); ?></h2>
                    <p class="post_resume">
                    <?= get_the_excerpt(); ?>
                    </p>
                </header>
                
                <a class="post_link" href="<?= get_the_permalink(); ?>"></a>
            </article>
            <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
            

            <div class="controll_posts">
                <?php previous_posts_link('<i class="bi bi-caret-left-fill"></i>'); ?>
                <?php next_posts_link('<i class="bi bi-caret-right-fill"></i>'); ?>
            </div>

        </section>

        <?php else: 
            
            $args = [
                'post_type' => 'post'
            ];
            $results = new WP_Query($args);
        ?>
            
        <header class="header_pesquisa_page">

            <h3>Nenhum resultado para <strong>"<?= $s ?>"</strong></h3>
            <h3>Talvez você goste dos seguintes resultados</h3>

        </header>

        <section class="section_posts">
            <?php if($results->have_posts()): while($results->have_posts()): $results->the_post(); ?>
            <article class="single_card card_post">
                <div class="post_image">
                    <?php 
                        $thumb_search_post = get_the_post_thumbnail_url(null, 'medium');
                        $thumb_search_post == "" ? $thumb_search_post = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                    ?>
                    <div class="post_image_content" style="background-image: url('<?= $thumb_search_post ?>');">

                    </div>
                </div>
                <header class="post_header">
                    <h2><?= get_the_title(); ?></h2>
                    <p class="post_resume">
                    <?= get_the_excerpt(); ?>
                    </p>
                </header>
                
                <a class="post_link" href="<?= get_the_permalink(); ?>"></a>
            </article>
            <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>

            <div class="controll_posts">

                <?php previous_posts_link('<i class="bi bi-caret-left-fill"></i>'); ?>
                <?php next_posts_link('<i class="bi bi-caret-right-fill"></i>'); ?>

            </div>
        </section>

        <?php endif; include('inc/aside.php') ?>
    </main>

<?php get_footer(); ?>