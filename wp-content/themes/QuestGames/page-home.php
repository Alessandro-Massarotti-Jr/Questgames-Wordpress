<?php
/*
Template Name: Home
*/
?>

<?php
$gameArgs = array(
    'post_type' => 'product',
    'post_status' => 'published'
);
$games = new WP_Query($gameArgs);

$bannerArgs = array(
    'post_type' => 'product',
    'post_status' => 'published',
    'posts_per_page' => 3,
);

$banner = new WP_Query($bannerArgs);

$categoriesArgs = array(
    'taxonomy' => 'product_cat',
);
$all_categories = get_categories($categoriesArgs);

// echo '<div style="background-color:#ffffff">';
// var_dump($all_categories);
// echo '</div>';

?>

<?php get_header(); ?>

<div class="home">



    <div class="bannerContainer">
        <div class="banner" id="bannerHome">
            <?php if ($banner->have_posts()) : while ($banner->have_posts()) : $banner->the_post() ?>
                    <a href="<?php echo the_permalink() ?>" class="bannerItem">
                        <h2 class="bannerTitle"><?php the_title(); ?></h2>
                        <div class="bannerItemImage">
                            <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                        </div>
                    </a>
            <?php endwhile;
            endif; ?>
        </div>
        <div class="bannerNav">
            <label for="bannerNav1">
                <input class="BannerNavBtn" type="radio" name="radio-btn" id="bannerNav1" onchange="banner1()">
                <span></span>
            </label>
            <label for="bannerNav2">
                <input class="BannerNavBtn" type="radio" name="radio-btn" id="bannerNav2" onchange="banner2()">
                <span></span>
            </label>
            <label for="bannerNav3">
                <input class="BannerNavBtn" type="radio" name="radio-btn" id="bannerNav3" onchange="banner3()">
                <span></span>
            </label>
        </div>
    </div>
    <div class="all-Path">
        <p>Jogos em destaque</p>
    </div>
    <div class="all-games">
        <div class="grid-container">
            <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
                    <div class="container-shopGames">
                        <div class="container-img">
                            <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                        </div>
                        <div class="container-txt">
                            <p><?php the_title(); ?></p>
                            <a href="<?php echo the_permalink() ?>">
                                <ion-icon class="icons" name="cart"></ion-icon>
                            </a>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>

</div>

<div class="all-gamesTitle">
    <p>Categorias</p>
</div>
<div class="all-categories">
    <?php 
    $count = 0;
    ?>
    <?php foreach ($all_categories as $category) : ?>
        <?php
        
         
        $category_id =  $category->term_id;
        $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
        $category_image = wp_get_attachment_url($thumbnail_id);
        $category_link = get_term_link($category_id, 'product_cat');
        ?>
        <?php
        $count++;
        if ($count < 5) {?>
            <div class="category_card">
                <div class="category_card__content">
                    <h3 class="category_title"><?php echo $category->name ?></h3>
                </div>
                <div class="category_card__image">
                    <img src="<?php echo $category_image; ?>" alt="<?php echo $category->name ?>">
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>
</div>

<div class="all-Path">
    <p>Análises de usuários</p>
</div>
<div class="all-review">
    <div class="container-review">
        <div class="container-review-img">
            <img src="wp-content/uploads/test/aaaa.png" alt="">
        </div>
        <div class="container-review-txt">
            <div class="title">
                <p>{Título game} {like or deslike)</p>
            </div>
            <div class="description">
                <p>Lorem ipsum dolor sit amet. Ab architecto repellat et sint galisum in nostrum nihil non rerum voluptate. Sed nisi praesentium aut doloribus alias ut voluptate dolores. At consequatur voluptatem in labore natus qui maiores quam et velit cupiditate aut dolor nesciunt. Ut rerum quod qui inventore enim et sapiente minus nam esse commodi. Aut quam voluptatem non suscipit dolores cum aspernatur molestias cum rerum magni est molestiae provident id facilis rerum sit expedita distinctio. Et repudiandae voluptates quo eius voluptas quo iste aut eligendi architecto qui aspernatur quaerat id dolor deleniti ut libero eligendi? Aut Quis nihil At recusandae rerum sit magni aliquam ut aliquid quis hic repellendus quos eos voluptas aliquam qui sint animi. Ut veritatis saepe qui fugiat nulla cum numquam soluta sit repellendus quisquam eos molestias sint.</p>
            </div>
        </div>
    </div>
</div>

<div class="all-comunidade">
    <p>Path notes recentes</p>
</div>

<div class="all-pathnotes">
    <div class="container-path">
        <div class="container-img-sereia">
            <img src="wp-content/uploads/test/sereia.png" alt="">
        </div>
        <div class="container-path-txt">
            <div class="container-img-post">
                <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="">
            </div>
            <p class="title">Titulo</p>
            <p>Lorem ipsum dolor sit amet. Ab architecto repellat et sint galisum in nostrum nihil non rerum voluptate. Sed nisi praesentium aut doloribus alias ut voluptate dolores. At consequatur voluptatem in labore natus qui maiores quam et velit cupiditate aut dolor nesciunt. Ut rerum quod qui inventore enim et sapiente minus nam esse commodi. Aut quam voluptatem non suscipit dolores cum aspernatur molestias cum rerum magni est molestiae provident id facilis rerum sit expedita distinctio. Et repudiandae voluptates quo eius voluptas quo iste aut eligendi architecto qui aspernatur quaerat id dolor deleniti ut libero eligendi? Aut Quis nihil At recusandae rerum sit magni aliquam ut aliquid quis hic repellendus quos eos voluptas aliquam qui sint animi. Ut veritatis saepe qui fugiat nulla cum numquam soluta sit repellendus quisquam eos molestias sint.</p>
        </div>
        <div class="container-img-guerreiro">
            <img src="wp-content/uploads/test/guerreiro.png" alt="">
        </div>
    </div>
</div>

<div class="all-comunidade">
    <p>Artes Populares</p>
</div>

<div class="all-games">
    <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
            <div class="container-artGames">
                <div class="container-imgArt">
                    <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                </div>
                <div class="container-text">
                    <p><?php the_title(); ?></p>
                    <p>{Author}</p>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>