+function ($) {
    $(".modal-button").click(function () {
        var target = "figure.popup."+$(this).attr("data-modal");
        $("body").addClass("noscroll");
        $(target).show().addClass('visible');
    });

    $(".close-modal").click(function () {
        $("body").removeClass("noscroll");
        $(this).closest("figure.popup").removeClass('visible').hide();
    });

    $(".wp-video").each(function () {
       //console.log(video);
        $(this).appendTo("#videos_wrap");
    });

    $("iframe").each(function () {
        //console.log(video);
        $(this).appendTo("#videos_wrap");
    });

    $("#videos_wrap").insertAfter("#gallery-container");


    $( "select#city_list" ).change(function () {
            var cat = $( "select#city_list option:selected" ).html();
            var coords = $( "select#city_list option:selected" ).data("coords");
            var adminurl = $(this).data("admin-url");
            set_map_sign(cat,coords);
            load_ajax_posts(cat,adminurl,coords);
        })
        .change();

    $( "div.city-dot" ).click(function () {
        var cat = $( this ).data("category");
        var coords = $( this ).data("coords");
        var adminurl = $("select#city_list").data("admin-url");
        set_map_sign(cat,coords);
        load_ajax_posts(cat,adminurl,coords);
    });

    $("div.democracy").each(function () {
        $(this).find("input[type=submit]").removeClass().addClass("btn btn-block gold-button");
    });

    $(".post-ratings").each(function () {
        var imgPath = $(this).find("img.post-ratings-image").attr("src");
        var containsFoo = imgPath.indexOf('plugins');
        imgPath = imgPath.substring(0,imgPath.indexOf('plugins'));
        imgPath += 'themes/electrosouz/img/heart.png';
        //$(this).find("img.post-ratings-image").attr("src",imgPath);
        console.log(imgPath);
    });


    function set_map_sign(cat,coords) {
        if ((coords) && (coords.indexOf(',') >= 0)) {
            coords = coords.split(",");

            var mapwidth = 1000;//$(".map-container").outerWidth();
            var mapheight = 457;//$(".map-container").outerHeight();
            var coordx = coords[0]/mapwidth*100;
            var coordy = coords[1]/mapheight*100;
            if (coordx > 90) { coordx = 85; }
            if (coordx < 10) { coordx = 9; }
            $("#map_sign").css("left",coordx+'%').css("top",coordy+'%').html(cat).show();

        } else {
            $("#map_sign").html("").hide();
        }
    }


    function load_ajax_posts(cat,adminurl,coords) {
        var $content = $('.ajax_posts');
        var $loader = $('select#city_list');


        if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: adminurl,
                data: {
                    'cat': cat,
                    'action': 'electro_more_post_ajax'
                },
                beforeSend : function () {
                    $content.addClass('post_loading_loader').html('');
                },
                success: function (data) {
                    var $data = $(data);
                    if ($data.length) {
                        var $newElements = $data.css({ opacity: 0 });
                        var $first_prof_url = $($newElements[0]).find(".prof-url>a").attr("href");
                        $("div#map_sign").append("<a target='_blank' href='"+$first_prof_url+"'>&nbsp;</a>");
                        $content.append($newElements);
                        $newElements.animate({ opacity: 1 });
                        $content.removeClass('post_loading_loader');
                        //alert($("#profs_list>.prof-item:first-of-type>.prof-url").html);
                        goToByScroll('profs_list');
                    } else {
                        $content.removeClass('post_loading_loader').addClass('post_no_more_posts').html('');
                    }
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    //$content.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
                    console.log('Error');
                    console.log(jqXHR);
                },
            });
        }
        return false;
    }


    function goToByScroll(id){
        // Remove "link" from the ID
        id = id.replace("link", "");
        // Scroll
        $('html,body').animate({
                scrollTop: $("#"+id).offset().top},
            'slow');
    }


}(jQuery);