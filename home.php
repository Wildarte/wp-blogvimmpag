
<?php get_header(); ?>
    
    <div class="home_intro">
        <h1 class="home_title">Blog</h1>
    </div>

    <main class="container main">
        
        <section class="section_posts">
            <?php 
                $onoff_post_selected = get_option('show_post_destaque_onoff'); //retorna se a exibição do post de destaque está ativa
                $post_selected = get_option('show_post_destaque'); //retorna o ID do post de destaque
                $post_in_pagination = get_option('show_post_destaque_pagination'); //retorna se o post em destaque será exibido em páginas de paginações
                $show_post_in_pagination = "on"; //variavel que pode receber "off" caso a exibicao do post em destaque nao eseja ativa
                
                if(is_paged()):
                    if($post_in_pagination == "on"):
                        $show_post_in_pagination = "off";
                    endif;
                endif;

                if($onoff_post_selected != "on" && $show_post_in_pagination == "on"):
                    $args_post_selected = [
                        'post_type' => 'post',
                        'p' => $post_selected,  
                    ];
                    $return_post_selected = new WP_Query($args_post_selected);

                if($return_post_selected->have_posts()): $return_post_selected->the_post();
            ?>
                <div class="post_destaque">
                    <article class="card_post top_post">
                        <?php 
                            $thumb_post_destaque = get_the_post_thumbnail_url(null, 'medium');
                            $thumb_post_destaque == "" ? $thumb_post_destaque = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                        ?>
                        <div class="post_image_top" style="background-image: url('<?= $thumb_post_destaque ?>')"></div>
                        <header class="post_header_top">
                            <h2><?= get_the_title(); ?></h2>
                            <?php
                                $cats = get_the_category();
                                for($i = 0; $i < count($cats); $i++):    
                            ?>
                            <span class="post_categoria">
                                <?= $cats[$i]->name ?>
                            </span>
                            <?php endfor; ?>
                            
                            <p><?= get_the_excerpt(); ?></p>
                        </header>
                        <a class="post_link" href="<?= get_the_permalink(); ?>"></a>
                    </article>
                </div>
            <?php endif; endif; wp_reset_query(); wp_reset_postdata(); ?>
            
            <?php
               

                if(have_posts()): while(have_posts()): the_post();
            ?>
            <article class="single_card card_post">
                <div class="post_image">
                        <?php 
                            $thumb = get_the_post_thumbnail_url(null, 'thumbnail');
                            $thumb == "" ? $thumb = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                        ?>
                    <div class="post_image_content" style="background-image: url('<?= $thumb ?>')">

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

            <!-- 
            <article class="single_card card_post">
                <div class="post_image">
                    <div class="post_image_content" style="background-image: url('./assets/img/posts/post3.jpg');">

                    </div>
                </div>
                <header class="post_header">
                    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis.</h2>
                    <p class="post_resume">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dicta expedita nobis modi sint maiores vitae ex adipisci. Ratione, dolorem.
                    </p>
                </header>
                
                <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
            </article>
            <article class="single_card card_post">
                <div class="post_image">
                    <div class="post_image_content" style="background-image: url('./assets/img/posts/post4.jpg');">

                    </div>
                </div>
                <header class="post_header">
                    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis.</h2>
                    <p class="post_resume">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dicta expedita nobis modi sint maiores vitae ex adipisci. Ratione, dolorem.
                    </p>
                </header>
               
                <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
            </article>
            <article class="single_card card_post">
            <div class="post_image">
                    <div class="post_image_content" style="background-image: url('./assets/img/posts/post1.jpg');">

                    </div>
                </div>
                <header class="post_header">
                    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis.</h2>
                    <p class="post_resume">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dicta expedita nobis modi sint maiores vitae ex adipisci. Ratione, dolorem.
                    </p>
                </header>
                
                <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
            </article>
            <article class="single_card card_post">
            <div class="post_image">
                    <div class="post_image_content" style="background-image: url('./assets/img/posts/post2.jpg');">

                    </div>
                </div>
                <header class="post_header">
                    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis.</h2>
                    <p class="post_resume">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dicta expedita nobis modi sint maiores vitae ex adipisci. Ratione, dolorem.
                    </p>
                </header>
                
                <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
            </article>
            <article class="single_card card_post">
            <div class="post_image">
                    <div class="post_image_content" style="background-image: url('./assets/img/posts/post3.jpg');">

                    </div>
                </div>
                <header class="post_header">
                    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis.</h2>
                    <p class="post_resume">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dicta expedita nobis modi sint maiores vitae ex adipisci. Ratione, dolorem.
                    </p>
                </header>
               
                <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
            </article>
            <article class="single_card card_post">
            <div class="post_image">
                    <div class="post_image_content" style="background-image: url('./assets/img/posts/post4.jpg');">

                    </div>
                </div>
                <header class="post_header">
                    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis.</h2>
                    <p class="post_resume">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dicta expedita nobis modi sint maiores vitae ex adipisci. Ratione, dolorem.
                    </p>
                </header>
                
                <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
            </article>
            -->


            <div class="controll_posts">
                
                <?php previous_posts_link('<i class="bi bi-caret-left-fill"></i>'); ?>
                <?php next_posts_link('<i class="bi bi-caret-right-fill"></i>'); ?>
            </div>

        </section>

        <?php include('inc/aside.php') ?>

    </main>

    
<?php get_footer(); ?>

