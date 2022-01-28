
<?php get_header(); ?>
    
    <div class="home_intro">
        <h1 class="home_title">Blog</h1>
    </div>

    <main class="container main">
        
        <section class="section_posts">
            <div class="post_destaque">
                <article class="card_post top_post">
                    <div class="post_image_top" style="background-image: url('./assets/img/posts/post1.jpg')"></div>
                    <header class="post_header_top">
                        <h2>10 motivos para não atrasar o pagamento dos seus boletos no final de ano</h2>

                        <span class="post_categoria">Categoria</span>
                        
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur sint delectus magnam natus non itaque nobis et saepe consequatur illum ab commodi quasi tempora explicabo velit laborum, necessitatibus vel quidem.</p>
                    </header>
                    <a class="post_link" href="https://blogvimmpag.digisolucao.com/pagina-artigo.php"></a>
                </article>
            </div>
            
            <?php
                $args_post = [
                    'post_type' => 'post',
                    //'p' => "",
                    //'post__not_in' => ""
                ];
                $args_post = new WP_Query($args_post);

                if($args_post->have_posts()): while($args_post->have_posts()): $args_post->the_post();
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

                <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
                
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

            <div class="controll_posts">
                <a class="btn_controll_posts" href="http://"><i class="bi bi-caret-left-fill"></i></a>
                <a class="btn_controll_posts" href="http://"><i class="bi bi-caret-right-fill"></i></a>
            </div>

        </section>

        <?php include('inc/aside.php') ?>

    </main>

    
<?php get_footer(); ?>

