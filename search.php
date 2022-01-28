<?php get_header(); 
$s = $_GET['s'];
?>
    
    <div class="pesquisa_intro">
        <h2><strong>"<?= $s ?>"</strong></h2>
    </div>

    <main class="container main">

        <header class="header_pesquisa_page">
            <h3>Resultados da pesquisa por: <strong>"<?= $s ?>"</strong> </h3>
            <hr>
        </header>
        
        <section class="section_posts">

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
                
                <a class="post_link" href="http://"></a>
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
                
                <a class="post_link" href="http://"></a>
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
               
                <a class="post_link" href="http://"></a>
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
                
                <a class="post_link" href="http://"></a>
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
                
                <a class="post_link" href="http://"></a>
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
               
                <a class="post_link" href="http://"></a>
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
                
                <a class="post_link" href="http://"></a>
            </article>

            <div class="controll_posts">
                <a class="btn_controll_posts" href="http://"><i class="bi bi-caret-left-fill"></i></a>
                <a class="btn_controll_posts" href="http://"><i class="bi bi-caret-right-fill"></i></a>
            </div>

        </section>

        <?php include('inc/aside.php') ?>

    </main>

<?php get_footer(); ?>