<?php
/* 
  Template Name:Search
*/
?>
<?php
$search = " ";

if ($_GET['search'] && !empty($_GET['search'])) {
    $search = $_GET['search'];
}


$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'orderby'   => 'title',
    'order' => 'ASC',
    's' => $search,

);

$query = new WP_Query($args);


$categoriesArgs = array(
    'taxonomy' => 'product_cat',
);
$all_categories = get_categories($categoriesArgs);

?>

<?php get_header() ?>


<div class="search">

    <div class="search__fields">
        <input type="text" name="gameName" id="gameName" placeholder="Pesquisar Games...">
        <select name="" id="gameCategory">
            <option value="">Categoria...</option>
            <?php foreach ($all_categories as $category) : ?>
                <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
            <?php endforeach; ?>
        </select>
        <select name="" id="gameOrder">
            <option value="ASC">A-Z</option>
            <option value="DESC">Z-A</option>
        </select>
        <button id="more_posts">
            <ion-icon name="search-outline"></ion-icon>
        </button>
    </div>

    <div id="results">
        <h1 class="search__info">Resultados para busca: <span><?php echo $search; ?></span></h1>
        <div class="search__results">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <a class="search__results__card" href="<?php the_permalink() ?>">
                        <div class="search__results__card__image">
                            <img src="<?php the_post_thumbnail_url("post_image") ?>" alt="<?php the_title() ?>">
                        </div>
                        <h2 class="search__results__card__title"><?php the_title() ?></h2>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <h1 class="search__results__noResults">Sem Resultados</h1>
            <?php endif;  ?>
        </div>
    </div>

    <div class="search__loading">
        <div class="search__loading__icon">
     <ion-icon name="sync-outline"></ion-icon>
     </div>
    </div>

</div>
<?php get_footer() ?>