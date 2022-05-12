<?php
/*
Template Name: Categorias
*/
?>
<?php
$categoriesArgs = array(
    'taxonomy' => 'product_cat',
);
$all_categories = get_categories($categoriesArgs);
?>
<?php get_header(); ?>
<div class="categorias">
    <div class="categorias__title">
     <h1>Categorias</h1>
    </div>
    <div class="categorias__cards">
        <?php foreach ($all_categories as $category) : ?>
            <?php $icone_id =  get_term_meta($category->term_id, 'icone', true);
            $icone_url = wp_get_attachment_url($icone_id);
            ?>
            <?php if ($icone_url) : ?>

                <div class="categoryCard">
                    <div class="categoryCard__image">
                        <img src="<?php echo $icone_url ?>" alt="<?php echo $category->name ?>">
                    </div>
                    <h2 class="categoryCard__title"><?php echo $category->name ?></h2>
                    <p class="categoryCard__description"><?php echo $category->description ?></p>
                    <a class="categoryCard__button" href="/">ver jogos</a>
                </div>
            <?php else : ?>
                <div class="categoryCard">
                    <div class="categoryCard__image">
                        <span>
                            <ion-icon name="game-controller-outline"></ion-icon>
                        </span>
                    </div>
                    <h2 class="categoryCard__title"><?php echo $category->name ?></h2>
                    <p class="categoryCard__description"><?php echo $category->description ?></p>
                    <a class="categoryCard__button" href="/">ver jogos</a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>


</div>
<?php get_footer(); ?>