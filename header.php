<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?= wp_title(); ?></title>
    <!-- wordpress head -->
    <?php wp_head(); ?>
    <!-- wordpress head -->
</head>
<body>
    
<header class="header container-full">
        <div class="container-full header_content">
            <div class="header_over container-full">
                <div class="container header_over_container">
                    <ul class="header_over_contato">
                        <li class="header_email"><a href="mailto:contato@meusite.com.br"><i class="bi bi-envelope"></i>contato@meusite.com.br</a></li>
                        <li class="header_tel"><a href="tel:+5511999999999"><i class="bi bi-telephone"></i> +55 11 9 9999-9999</a></li>
                    </ul>
                    <ul class="header_over_social">
                        <li class="icon-linkedin"><a href="http://"><i class="bi bi-linkedin"></i></a></li>
                        <li class="icon-facebook"><a href="http://"><i class="bi bi-facebook"></i></a></li>
                        <li class="icon-instagram"><a href="http://"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>     
            </div>
            <div class="header_bar container-full">
                <div class="header_bar_content container">
                    <div class="header_link_logo">
                        <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        ?>
                        <a class="link_logo" href="<?php home_url(); ?>">
                            <img src="<?=  esc_url( $logo[0] )  ?>" alt="">
                        </a>
                    </div>
                    <span class="btn_menu" style="display: none;"><i class="bi bi-list"></i></span>
                    <nav class="menu" style="display: none;">
                        <ul>
                            <li><a href="http://">Site</a></li>
                            <li><a href="http://">Sobre</a></li>
                            <li><a href="http://">Contato</a></li>
                        </ul>
                    </nav>
                    <div class="header_cta">
                        <a href="http://">
                            Simule Agora
                        </a>
                    </div>
                </div>   
            </div>
        </div>
    </header>