<?php

function add_new_menu_itens(){

    add_menu_page(
        'Configuração do Tema',
        'Configuração do tema',
        '',
        'theme-options',
        100
    );

    include('config-geral.php');
    include('config-posts.php');
    include('config-contato.php');
    include('config-sidebar.php');
    include('config-whatsapp.php');

}
add_action("admin_menu", "add_new_menu_itens");
?>