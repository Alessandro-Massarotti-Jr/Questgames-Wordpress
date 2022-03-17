<?php
$post_id = get_the_ID();
$product = wc_get_product($post_id);
$price = $product->get_price();
?>


<?php get_header(); ?>

<div class="gamePage">

    <div class="banner">
        <img class="img" src="<?php echo get_field('banner') ?>" alt="<?php the_title() ?>">
    </div>

    <div class="all-lines">
        <div class="line1">
            <h1 class="gamename"><?php the_title() ?></h1>

            <form class="cart" action="<?php echo the_permalink(); ?>" method="post" enctype="multipart/form-data">

                <div class="quantity hidden">
                    <input type="hidden" id="quantity_6223b8ec1d34b" class="qty" name="quantity" value="1">
                </div>

                <button type="submit" name="add-to-cart" value="<?php echo the_ID() ?>" class="btncompra">Comprar R$ <?php echo $price ?></button>

            </form>

        </div>


        <div class="line2">
            <div class="gamedescription">
                <div class="gameContent"> <?php echo get_the_content() ?> </div>
                <p class="gameContent"><?php echo get_field('desenvolvedor') ?></p>
            </div>
            <div class="gameimages">
                <img src="<?php echo get_field('imagem-1') ?>" alt="<?php the_title() ?>">
                <img src="<?php echo get_field('imagem-2') ?>" alt="<?php the_title() ?>">
                <img src="<?php echo get_field('imagem-3') ?>" alt="<?php the_title() ?>">
            </div>
        </div>s
    </div>



    <h3>ID: <?php echo the_ID() ?></h3>


    <!-- <img src="<?php the_post_thumbnail_url('post_image') ?>" alt=""> -->


</div>

<?php get_footer(); ?>