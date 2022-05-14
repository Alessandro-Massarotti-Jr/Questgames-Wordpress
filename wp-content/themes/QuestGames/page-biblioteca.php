<?php
/*
Template Name: Biblioteca
*/
?>

<?php
global $post;
$a=1; $b=1; $c=1; $d=1; $e=1; $f=1;
$gameArgs = array(
    'post_type' => 'product',
    'post_status' => 'published'
);

// $categoriesArgs = array(
//     'taxonomy' => 'product_cat',
// );

// $all_categories = get_categories($categoriesArgs);

$games = new WP_Query($gameArgs);
?>

<!-- <?php $current_user = wp_get_current_user();
$downloads = wc_get_customer_available_downloads($current_user->id);
var_dump($downloads);
?> -->

<?php get_header() ?>
<div class="container-master">
    <div class="container-left">
        <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
                <div onclick="clickGame()" class="container-game" id="container-games<?php echo $e++ ?>">
                    <div class="container-image-small">
                        <img id="gameImg<?php echo $f++ ?>" src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                    </div>
                    <div class="container-col">
                        <p id="gameName<?php echo $a++ ?>"><?php the_title() ?></p>
                        <p id="gameAuthor<?php echo $b++ ?>">Autor: <?php the_author() ?> </p>
                        <p id="gameDate<?php echo $c++ ?>"><?php the_date() ?></p>

                        <!-- <p id="gameCategory"></?php ?></p> -->

                        <p id="gameSize<?php echo $d++ ?>">Tamanho do arquivo: </p>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>


    </div>

    <div class="container-right">
        <div class="container-top-image">
            <div id="container-img" class="container-image-big">
                <img id="rightImg" src="" alt="">
            </div>
        </div>
        <div class="container-bot-infos">
            <div class="container-infos">
                <p id="rightName"></p>
                <p id="rightAuthor"></p>
                <p id="rightDate"></p>
                <p id="rightSize"></p>
                <a id="buttonDownload" href="">Baixar</a>
            </div>
        </div>
    </div>

</div>
<script>
   
  
    function clickGame() {
        var count = document.getElementsByClassName("container-game").length+1;
        var game = this.event.target.id;
        document.getElementById("buttonDownload").style.display = "inline";
        document.getElementById("container-img").style.display = "block";

        

        for(var i = 1; i < count; i++){
        if (game == "gameName"+i || game == "gameAuthor"+i || game == "gameDate"+i || game == "gameSize"+i || game == "container-games"+i || game == "gameImg"+i)  {
            name = document.getElementById("gameName"+i).textContent;
            document.getElementById("rightName").innerHTML = name;
            author = document.getElementById("gameAuthor"+i).textContent;
            document.getElementById("rightAuthor").innerHTML = author;
            date = document.getElementById("gameDate"+i).textContent;
            document.getElementById("rightDate").innerHTML = date;
            size = document.getElementById("gameSize"+i).textContent;
            document.getElementById("rightSize").innerHTML = size;
            var img = document.getElementById("gameImg"+i).src;
            document.getElementById("rightImg").src = img;
        }
    }
    }
</script>
<?php get_footer() ?>