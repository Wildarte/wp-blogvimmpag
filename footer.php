<footer class="footer container-full">
        <div class="footer_content container">
            <div class="col footer_col_1">
                <header class="header_footer_col_1">
                    <h3>Sobre</h3>
                </header>
                
                <p><?= get_bloginfo('description'); ?></p>
            </div>
            <div class="col footer_col_2">
                <header class="header_footer_col_2">
                    <h3>Redes Sociais</h3>
                </header>
                <ul class="footer_list_social">
                    <?php
                        $f_facebook = get_option('show_facebook');
                        $f_instagram = get_option('show_instagram');
                        $f_linkedin = get_option('show_linkedin');
                        $f_twitter = get_option('show_twitter');
                        $f_whatsapp = get_option('show_whatsapp');
                    ?>
                    <?php if($f_linkedin): ?>
                        <li class="icon-linkedin"><a href="<?= $f_linkedin ?>"><i class="bi bi-linkedin"></i></a></li>
                        <?php endif; ?>
                        <?php if($f_facebook): ?>
                        <li class="icon-facebook"><a href="<?= $f_facebook; ?>"><i class="bi bi-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if($f_instagram): ?>
                        <li class="icon-instagram"><a href="<?= $f_instagram ?>"><i class="bi bi-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if($f_twitter): ?>
                        <li class="icon-twitter"><a href="<?= $f_twitter ?>"><i class="bi bi-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if($f_whatsapp): ?>
                        <li class="icon-whatsapp"><a href="<?= $f_whatsapp ?>"><i class="bi bi-whatsapp"></i></a></li>
                        <?php endif; ?>
                </ul>
            </div>
            <div class="col footer_col_3">
                <?php 
                    $telefone = get_option("show_telefone");
                    $email = get_option('show_email');
                ?>
                <?php if(!empty($email) || !empty($telefone)): ?>
                <header class="header_footer_col_3">
                    <h3>Contato</h3>
                </header>
                
                <ul class="footer_contato">
                <?php if(!empty($email)): ?>
                        <li class=""><a href="mailto:<?= get_option("show_email") ?>"><i class="bi bi-envelope"></i> <?= get_option("show_email") ?></a></li>
                        <?php endif; ?>
                        <?php if(!empty($telefone)): ?>
                        <li class=""><a href="tel:<?= get_option("show_telefone") ?>"><i class="bi bi-telephone"></i> <?= get_option("show_telefone") ?></a></li>
                        <?php endif; ?>
                </ul>
                <?php endif; ?>
                <ul class="footer_categoria">
                <?php
                    
                    $terms = get_terms([
                        'taxonomy' => 'category',
                        'hide_empty' => false
                    ]);
                    foreach($terms as $term){
                        echo "<li><a href='". get_home_url() ."/category/". $term->name. "'>".$term->name."</a></li>";        
                    }
                    
                ?>
                </ul>
            </div>
        </div>
        <div class="footer_copy">
            <p><?= date('Y') ?> - Todos os direitos reservados</p>
        </div>
    </footer>
    <a href="https://api.whatsapp.com/send?phone=&amp;text=" target="_blank" style="position:fixed;bottom:15px;right:15px; z-index: 1000">
    <svg style="background-color: #fff; border-radius: 50%; padding: 0px; box-shadow: 1px 1px 10px #999" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="#34af23" d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"></path></svg>
    </a>
    

   
    <?php wp_footer(); ?>
    <script>
        
        
    </script>
</body>
</html>