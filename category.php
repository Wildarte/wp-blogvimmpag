<?php get_header(); $categoria = get_the_category()[0]->slug; ?>
    
    <div class="categoria_intro">
        <h2><strong>Categoria: </strong><?= get_the_category()[0]->name; ?></h2>
    </div>

    <main class="container main" style="padding: 60px 0;">
        
        <section class="section_posts">

            <?php
                
                $args_category_page = [
                    'post_type' => 'post',
                    'category_name' => $categoria
                ];

                $result_category_page = new WP_Query($args_category_page);

                if($result_category_page->have_posts()):
                    while($result_category_page->have_posts()):
                        $result_category_page->the_post();

            ?>

            <article class="single_card card_post">
                <div class="post_image">
                    <?php 
                        $thumb_category_post = get_the_post_thumbnail_url(null, 'medium');
                        $thumb_category_post == "" ? $thumb_category_post = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                    ?>
                    <div class="post_image_content" style="background-image: url('<?= $thumb_category_post ?>');">

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

        <?php include('inc/aside.php') ?>

    </main>

<?php get_footer(); ?>