jQuery(document).ready(function($) {

    // $ Works! You can test it with next line if you like

    function load_posts() {
        $('.search__loading').addClass('active')

        var str =
            '&gameName=' +
            gameName +
            '&gameCategory=' +
            gameCategory +
            '&gameOrder=' +
            gameOrder +
            '&action=more_post_ajax'
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: ajax_posts.ajax_url,
            data: str,
            success: function(data) {
                $('.search__loading').removeClass('active')

                var $data = $(data)
                console.log($data);
                $('#results').html($data)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown)
            }
        })
        return false
    }

    var gameName = ''
    $(this).on('change', '#gameName', function() {
        gameName = $(this).val()
    })

    var gameCategory = ''
    $(this).on('change', '#gameCategory', function() {
        gameCategory = $(this).val()
    })

    var gameOrder = 'ASC'
    $(this).on('change', '#gameOrder', function() {
        gameOrder = $(this).val()

    })

    $(this).on('click', '#more_posts', function() {
        console.log("button");
        console.log("nome: " + gameName)
        console.log("categoria: " + gameCategory)
        console.log("ordem: " + gameOrder)
        load_posts()
    })

});