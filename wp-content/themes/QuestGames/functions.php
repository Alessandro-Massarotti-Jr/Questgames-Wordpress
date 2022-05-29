<?php

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


function add_theme_styles()
{
    //  wp_enqueue_style( 'nome', 'url ou local do arquivo', array(dependencias), 'versão Ex: 1.0, 1.2', tipo de midia que o css se aplica ou max width);
    wp_enqueue_style('header', get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style('SingleProduct', get_template_directory_uri() . '/assets/css/singleProduct.css');
    wp_enqueue_style('Home', get_template_directory_uri() . '/assets/css/home.css');
    wp_enqueue_style('Biblioteca', get_template_directory_uri() . '/assets/css/biblioteca.css');
    wp_enqueue_style('Cadastro', get_template_directory_uri() . '/assets/css/cadastro.css');
    wp_enqueue_style('Login', get_template_directory_uri() . '/assets/css/login.css');
    wp_enqueue_style('perfil', get_template_directory_uri() . '/assets/css/perfil.css');
    wp_enqueue_style('search', get_template_directory_uri() . '/assets/css/search.css');
    wp_enqueue_style('categorias', get_template_directory_uri() . '/assets/css/categorias.css');
    wp_enqueue_style('categoriasJogos', get_template_directory_uri() . '/assets/css/categoriasJogos.css');
    wp_enqueue_style('woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
}


function add_theme_scripts()
{
    //	wp_enqueue_script( 'nome', 'url ou local do arquivo', array(dependencias), 'versão Ex: 1.0, 1.2' , posição do script(false no header, true no footer));
    wp_enqueue_script('header', get_template_directory_uri() . '/assets/js/header.js');
    wp_enqueue_script('home', get_template_directory_uri() . '/assets/js/home.js', array(), '1.0', true);
    wp_enqueue_script('categorias', get_template_directory_uri() . '/assets/js/categorias.js');

    //ion-icon
    wp_enqueue_script('ion-icons-module', 'https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js', array(), '5.5.2', true);
    wp_enqueue_script('ion-icons-nomodule', 'https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js', array(), '5.5.2', true);

    // jQuery.
    wp_enqueue_script('jquery');

    // Ajax.
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/morePostsSearch.js', array('jquery'));
    wp_enqueue_script('library', get_template_directory_uri() . '/assets/js/library.js', array('jquery'));
    wp_localize_script('ajax-script', 'ajax_posts', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_localize_script('library', 'library-ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'add_theme_styles');
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Register a new sidebar simply named 'sidebar'
function add_widget_Support()
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
// Hook the widget initiation and run our function
add_action('widgets_init', 'add_Widget_Support');

function woo_load_response_modal($passed, $product_id, $quantity)
{
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];
        $product_cart_id = $cart_item['product_id'];
        $product_in_cart_id = $product->get_ID();
        $product_in_cart = wc_get_product($product_in_cart_id);
        if ($product_in_cart_id == $product_id) {
            $passed = false;
        } else {
            $passed = true;
        }
    }
    if ($passed == true) {
        wp_enqueue_script('modalSuccess', get_template_directory_uri() . '/assets/js/modalSuccess.js', array(), '1.0', true);
    } else {
        wp_enqueue_script('modalError', get_template_directory_uri() . '/assets/js/modalError.js', array(), '1.0', true);
    }
    return $passed;
}
add_filter('woocommerce_add_to_cart_validation', 'woo_load_response_modal', 10, 3);

function questgames_admin_color_scheme()
{
    //Get the theme directory
    $theme_dir = get_stylesheet_directory_uri();

    //Questgames
    wp_admin_css_color(
        'questgames',
        __('Questgames'),
        $theme_dir . '/questgames.css',
        array('#151617', '#fff', '#0c9e35', '#0c9e35')
    );
}
add_action('admin_init', 'questgames_admin_color_scheme');



function more_post_ajax()
{

    $gameName = (isset($_POST['gameName'])) ? $_POST['gameName'] : '';
    $gameCategory = (isset($_POST['gameCategory'])) ? $_POST["gameCategory"] : '';
    $gameOrder = (isset($_POST['gameOrder'])) ? $_POST['gameOrder'] : '';

    header("Content-Type: text/html");


    $search_games_args = array(
        'numberposts'    => -1,
        'post_type'        => 'product',
        'product_cat' => $gameCategory,
        'orderby'   => 'name',
        'order' => $gameOrder,
        's' => $gameName,

    );

    $search_games = new WP_Query($search_games_args);
    $out = '';
    $out .= '<h1 class="search__info">Resultados para busca: <span>' . $gameName . '</span></h1>';
    $out .= '<div class="search__results" >';
    if ($search_games->have_posts()) : while ($search_games->have_posts()) : $search_games->the_post();

            $game_link = get_the_permalink();
            $game_title = get_the_title();
            $game_image = get_the_post_thumbnail_url();

            $out .= '<a class="search__results__card" href="' . $game_link . '">
                    <div class="search__results__card__image">
                        <img src="' . $game_image . '" alt="' . $game_title . '">
                     </div>
                     <h2 class="search__results__card__title">' . $game_title . '</h2>
                 </a>';

        endwhile;
        $out .= '</div>';
        wp_reset_postdata();
        die($out);

    else :
        $out .= '<h1 class="search__results__noResults">Sem Resultados</h1>';
        $out .= '</div>';
        die($out);
    endif;
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

function library_ajax()
{
    include_once(get_template_directory() . '/page-biblioteca.php');
}
add_action('wp_ajax_nopriv_library_ajax', 'library_ajax');
add_action('wp_ajax_more_library_ajax', 'library_ajax');

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');



function create_review()
{
    register_post_type(
        'reviews',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Reviews'),
                'singular_name' => __('reviews')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'reviews'),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_review');


function create_path()
{
    register_post_type(
        'pathnotes',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Pathnotes'),
                'singular_name' => __('pathnotes')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'pathnotes'),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_path');
