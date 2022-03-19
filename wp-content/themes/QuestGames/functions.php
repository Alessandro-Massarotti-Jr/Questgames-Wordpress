<?php

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function add_theme_styles() {
    //  wp_enqueue_style( 'nome', 'url ou local do arquivo', array(dependencias), 'versão Ex: 1.0, 1.2', tipo de midia que o css se aplica ou max width);
    wp_enqueue_style('header', get_template_directory_uri().'/assets/css/header.css');
    wp_enqueue_style('footer', get_template_directory_uri().'/assets/css/footer.css');
    wp_enqueue_style('SingleProduct',get_template_directory_uri().'/assets/css/singleProduct.css');
    wp_enqueue_style('Home',get_template_directory_uri().'/assets/css/home.css');
    wp_enqueue_style('Cadastro',get_template_directory_uri().'/assets/css/cadastro.css');
    wp_enqueue_style('Login',get_template_directory_uri().'/assets/css/login.css');
}


function add_theme_scripts() {
    //	wp_enqueue_script( 'nome', 'url ou local do arquivo', array(dependencias), 'versão Ex: 1.0, 1.2' , posição do script(false no header, true no footer));
    wp_enqueue_script('header',get_template_directory_uri().'/assets/js/header.js');
    wp_enqueue_script('home',get_template_directory_uri().'/assets/js/home.js',array(),'1.0',true);

    //ion-icon

    wp_enqueue_script('ion-icons-module','https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js', array(),'5.5.2', true );
    wp_enqueue_script('ion-icons-nomodule','https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js', array(),'5.5.2', true );

}

add_action( 'wp_enqueue_scripts', 'add_theme_styles' );
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Register a new sidebar simply named 'sidebar'
function add_widget_Support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_Widget_Support' );