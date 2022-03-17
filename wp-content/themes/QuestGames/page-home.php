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
<div class="bannerContainer">
    <div class="banner" id="bannerHome">
        <?php if ($banner->have_posts()) : while ($banner->have_posts()) : $banner->the_post() ?>
                <a href="<?php echo the_permalink() ?>" class="bannerItem">
                <h2 class="bannerTitle"><?php the_title();?></h2>
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

<?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
        <div style="background-color: white; margin-top:40px;">
            <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
            <h1><?php the_title(); ?></h1>
            <a href="<?php echo the_permalink() ?>">Ver mais</a>
        </div>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>