<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php wpb_set_post_views(get_the_ID()); ?>
    <?php 
        $thumb_single_post_header = get_the_post_thumbnail_url(null, 'normal');
        $thumb_single_post_header == "" ? $thumb_single_post_header = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
    ?>
    <div class="header_post container-full" style="background-image: url('<?= $thumb_single_post_header ?>');">
        <div class="header_post_content container-full">
            <h2 class="container"><?= get_the_title() ?></h2>
        </div>
        
    </div>

    <main class="post_page container">
        <div class="post_page_author">
            <p class="">
                <span class="post_page_thumb_author">
                    <?php
                        $mail_user = strval(get_the_author_meta('user_email', false));
                        $img_user = get_avatar_url($mail_user, '32', '', '', null);
                        $img_user == "" ? $img_user = get_template_directory_uri()."/assets/img/user-default.png" : "";
                    ?>
                    <img src="<?= $img_user; ?>" alt="">
                </span>
                Giorgio M. D.  -  12/01/2022
            </p>

        </div>

        <!-- style for post content -->
        <style>
            .content_post ul{
                list-style: disc;
                margin: 40px;
            }
            .content_post ul li{
                font-size: 1.2em;
                font-weight: 300;
                line-height: 2em;
            }
            .content_post img{
                width: 100%;
                height: 420px;
                margin: 15px 0;
                object-fit: cover;
            }
            @media(max-width: 600px){
                .content_post img{
                    height: auto;
                }
            }
        </style>
        <article class="content_post">
            <?php 
                $thumb_single_post = get_the_post_thumbnail_url(null, 'normal');
                $thumb_single_post == "" ? $thumb_single_post = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
            ?>
            <div class="thumb_post_content" style="background-image: url('<?= $thumb_single_post ?>');"></div>
            <?= get_the_content(); ?>
            <!-- 
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, eius quae possimus, laboriosam nisi repellat debitis explicabo consequuntur omnis officiis porro dolores vitae quia ad autem quibusdam nihil eos mollitia doloribus reprehenderit libero? Veritatis, voluptatum harum dolorum praesentium fugit officiis.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aperiam doloribus eius est rem voluptatum error earum? A modi magnam voluptatem obcaecati maxime in. Cumque similique tempore vitae animi molestias.
            </p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae voluptate enim nesciunt laborum itaque accusamus.</p>
            <img src="./assets/img/single-post/post-test2.jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptates sapiente, ducimus eum maxime sunt quod. Ab, earum.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, fugiat amet magnam autem, incidunt vero, aliquid harum voluptate asperiores consequatur iste! Deserunt, cum labore!</p>
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, suscipit earum?</li>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing.</li>
            </ul>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae voluptate enim nesciunt laborum itaque accusamus.</p>
            <img src="./assets/img/single-post/post-test.jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptates sapiente, ducimus eum maxime sunt quod. Ab, earum.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, fugiat amet magnam autem, incidunt vero, aliquid harum voluptate asperiores consequatur iste! Deserunt, cum labore!</p>
 -->
            <hr class="hr_pos_post_content">

            <div class="share_post">
                <h5>Compartilhe</h5>
                <ul class="share_post_links">
                    <li>
                        <a href="http://"><i class="bi bi-twitter"></i></a>
                    </li>
                    <li>
                        <a href="http://"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li>
                        <a href="http://"><i class="bi bi-whatsapp"></i></a>
                    </li>
                    <li>
                        <a href="http://"><i class="bi bi-link-45deg"></i></a>
                    </li>
                </ul>
            </div>

        </article>

        
        
        <section class="post_indication">
            <?php

                $args_list_single_post = [
                    'post_type' => 'post',
                    'category_name' => get_the_category()[0]->name,
                    'order' => 'DESC',
                    'posts_per_page' => 3,
                    'post__not_in' => [get_the_ID()]
                ];

                $result_list_single_post = new WP_Query($args_list_single_post);
                if($result_list_single_post->have_posts()):
                    
            ?>
            <header class="post_indication_header">
                <h3>Artigos Relacionados</h3>
            </header>

            <section class="section_posts_page_post">
                <?php
                    while($result_list_single_post->have_posts()): $result_list_single_post->the_post();
                ?>
            
                <article class="single_card card_post">
                    <?php 
                        $thumb_post_single = get_the_post_thumbnail_url(null, 'medium');
                        $thumb_post_single == "" ? $thumb_post_single = get_template_directory_uri().'/assets/img/posts/thumb-post.jpg' : "";
                    ?>
                    <div class="post_image">
                        <div class="post_image_content" style="background-image: url('<?= $thumb_post_single; ?>');">

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


            </section>
        </section>

    </main>
    <?php endwhile; endif; ?>

    <?php get_footer(); ?>
