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
    <p>Path Notes Populares</p>
</div>
     <div class="all-games">
    <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
            <div class="container-shopGames">
                <div class="container-img">
                <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                </div>
                <p><?php the_title(); ?></p>
                <a href="<?php echo the_permalink() ?>">Ir para página</a>
            </div>
    <?php endwhile;
    endif; ?>
    </div>

</div>

<div class="all-gamesTitle">
    <p>Lançamentos Populares</p>
</div>
<div class="all-newGames">
    <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
            <div class="container-newGames">
                <div class="container-img-desc">
                    <div class="container-img">
                        <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>" alt="">
                    </div>
                    <?php 
                    $gameId = get_the_ID();
                    $categorias = get_the_terms( $gameId, 'product_cat' );?>
                    <p>{<?php echo $categorias[0]->name; ?>}</p>
                    <p><?php the_title(); ?></p>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</div>

<div class="all-Path">
    <p>Path Notes Populares</p>
</div>

<div class="all-pathnotes">
    <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
            <div class="container-newGames">
            </div>
    <?php endwhile;
    endif; ?>
    <div class="container-path">
        <div class="container-top">
            <p>Tittle</p>
        </div>
        <div class="container-bot">
            <p>Lorem ipsum dolor sit amet. Ab architecto repellat et sint galisum in nostrum nihil non rerum voluptate. Sed nisi praesentium aut doloribus alias ut voluptate dolores. At consequatur voluptatem in labore natus qui maiores quam et velit cupiditate aut dolor nesciunt. Ut rerum quod qui inventore enim et sapiente minus nam esse commodi. Aut quam voluptatem non suscipit dolores cum aspernatur molestias cum rerum magni est molestiae provident id facilis rerum sit expedita distinctio. Et repudiandae voluptates quo eius voluptas quo iste aut eligendi architecto qui aspernatur quaerat id dolor deleniti ut libero eligendi? Aut Quis nihil At recusandae rerum sit magni aliquam ut aliquid quis hic repellendus quos eos voluptas aliquam qui sint animi. Ut veritatis saepe qui fugiat nulla cum numquam soluta sit repellendus quisquam eos molestias sint.</p>
        </div>        
    </div>
    
</div>

<div class="all-comunidade">
    <p>Artes Populares</p>
</div>

<div class="all-games">
    <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
            <div class="container-shopGames">
                <div class="container-img">
                <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                </div>
                <p><?php the_title(); ?></p>
                <a href="<?php echo the_permalink() ?>">Ir para página</a>
            </div>
    <?php endwhile;
    endif; ?>
    </div>

<?php get_footer(); ?>