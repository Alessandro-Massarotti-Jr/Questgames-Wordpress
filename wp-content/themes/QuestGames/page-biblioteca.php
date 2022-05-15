<?php
/*
Template Name: Biblioteca
*/
?>

<?php
global $post;
$a=1; $b=1; $c=1; $d=1; $e=1; $f=1; $g=1;
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


<?php get_header() ?>


<?php $current_user = wp_get_current_user();
$downloads = wc_get_customer_available_downloads($current_user->id);
?>


<div class="container-master">
    <div class="container-left">
        <?php foreach($downloads as $download): ?>
            <?php 
                $download_url = $download['download_url'];
                $download_post_id = $download[ 'product_id'];
                $download_title = $download['product_name'];
                $download_developer = get_field('desenvolvedor',$download_post_id);
                $download_image = get_the_post_thumbnail_url($download_post_id,'post_image');
                $download_launch_date = get_the_date('d/m/y', $download_post_id)
                ?>
                <div onclick="clickGame()" class="container-game" id="container-games<?php echo $e++ ?>">
                    <div class="container-image-small">
                        <img id="gameImg<?php echo $f++ ?>" src="<?php echo $download_image ?>" alt="<?php the_title() ?>">
                    </div>
                    <div class="container-col">
                        <p id="gameName<?php echo $a++ ?>"><?php echo  $download_title ?></p>
                        <p id="gameAuthor<?php echo $b++ ?>">Autor: <?php echo $download_developer ?> </p>
                        <p id="gameDate<?php echo $c++ ?>"><?php echo $download_launch_date ?></p>
                        <input type="hidden" name="" id="downloadLink<?php echo $g++ ?>" baixar="<?php echo $download_url?>">
                        <!-- <p id="gameCategory"></?php ?></p> -->

                        <p id="gameSize<?php echo $d++ ?>">Tamanho do arquivo: </p>
                    </div>
                </div>
        <?php endforeach; ?>


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
        if (game == "gameName"+i || game == "gameAuthor"+i || game == "gameDate"+i || game == "gameSize"+i || game == "container-games"+i || game == "gameImg"+i || game=="downloadLink"+i)  {
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
            var downloadLinkinput = document.querySelector('#downloadLink'+i);
            var downloadLink = downloadLinkinput.getAttribute('baixar');
            document.querySelector("#buttonDownload").href = downloadLink;
        }
    }
    }
</script>
<?php get_footer() ?>