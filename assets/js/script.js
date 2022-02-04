//menu
if(document.querySelector('.btn_menu')){
    const btn_open_menu = document.querySelector('.btn_menu');
    const btn_close_menu = document.querySelector('.btn_close_menu');

    btn_open_menu.addEventListener('click', function(){
        document.querySelector('.header_bar_content nav.menu').classList.remove('close_menu_mobile');
        document.querySelector('.header_bar_content nav.menu').classList.add('open_menu_mobile');
    });
    btn_close_menu.addEventListener('click', function(){
        document.querySelector('.header_bar_content nav.menu').classList.remove('open_menu_mobile');
        document.querySelector('.header_bar_content nav.menu').classList.add('close_menu_mobile');
    });

    const submenus = document.querySelectorAll('.header_bar_content nav.menu ul li.menu-item-has-children');

    submenus.forEach((item) => {
        item.addEventListener('click', function(){
            this.querySelector('ul.sub-menu').classList.toggle('open_submenu_mobile');
        });
    });
}