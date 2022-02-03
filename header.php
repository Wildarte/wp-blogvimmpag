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
        <div class="header_over container-full" style="background-color: <?= get_option('show_cor_bar_top'); ?>;">
            <div class="container header_over_container">
                <ul class="header_over_contato">
                    <?php $email = get_option('show_email'); ?>
                    <?php if(!empty($email)): ?>
                    <li class="header_email"><a href="mailto:<?= get_option("show_email") ?>"><i class="bi bi-envelope"></i> <?= get_option("show_email") ?></a></li>
                    <?php endif; ?>
                    <?php $telefone = get_option("show_telefone"); ?>
                    <?php if(!empty($telefone)): ?>
                    <li class="header_tel"><a href="tel:<?= get_option("show_telefone") ?>"><i class="bi bi-telephone"></i> <?= get_option("show_telefone") ?></a></li>
                    <?php endif; ?>
                </ul>
                <ul class="header_over_social">
                    <?php
                        $h_facebook = get_option('show_facebook');
                        $h_instagram = get_option('show_instagram');
                        $h_linkedin = get_option('show_linkedin');
                        $h_twitter = get_option('show_twitter');
                        $h_whatsapp = get_option('show_whatsapp');
                    ?>
                    <?php if($h_linkedin): ?>
                    <li class="icon-linkedin"><a href="<?= $h_linkedin ?>"><i class="bi bi-linkedin"></i></a></li>
                    <?php endif; ?>
                    <?php if($h_facebook): ?>
                    <li class="icon-facebook"><a href="<?= $h_facebook; ?>"><i class="bi bi-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if($h_instagram): ?>
                    <li class="icon-instagram"><a href="<?= $h_instagram ?>"><i class="bi bi-instagram"></i></a></li>
                    <?php endif; ?>
                    <?php if($h_twitter): ?>
                    <li class="icon-twitter"><a href="<?= $h_twitter ?>"><i class="bi bi-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if($h_whatsapp): ?>
                    <li class="icon-whatsapp"><a href="<?= $h_whatsapp ?>"><i class="bi bi-whatsapp"></i></a></li>
                    <?php endif; ?>
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
                    <a class="link_logo" href="<?= get_home_url(); ?>">
                        <img src="<?=  esc_url( $logo[0] )  ?>" alt="">
                    </a>
                </div>
                <?php
                    $desable_menu = get_option('show_desable_menu');
                    if($desable_menu != "on"):
                ?>
                <span class="btn_menu"><i class="bi bi-list"></i></span>
                <nav class="menu">
                    <div class="header_mobile_menu">
                        <a class="link_logo_mobile" href="<?= get_home_url(); ?>">
                            <img src="<?=  esc_url( $logo[0] )  ?>" alt="">
                        </a>
                        <span class="btn_close_menu">
                            <i class="bi bi-x-lg"></i>
                        </span>
                    </div>
                    
                    <?php
                        $args = array(
                            'menu' => 'Menu principal',
                            'theme_location' => 'menu-principal',
                            'container' => false
                        );
                        wp_nav_menu( $args );
                    ?>
                </nav>
                <?php endif; ?>
                <div class="header_cta">
                    <a href="<?= get_option('show_link_geral'); ?>" style="background-color: <?= get_option('show_cor_btn_geral'); ?>; color: <?= get_option('show_cor_text_btn_geral'); ?>">
                        <?= get_option('show_cta_geral'); ?>
                    </a>
                </div>
            </div>   
        </div>
    </div>
</header>