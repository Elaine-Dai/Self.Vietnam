(function($) {



    $(function() {

        $('.subpage').on("mouseover", function() {
            $(this).children('.subpage__box').css("color", "yellow");
            $(this).children('.subpage__box').stop().animate({
                bottom: "30px",

            }, "500");


        });

        $('.subpage').on("mouseout", function() {
            $(this).children('.subpage__box').css("color", "#FFF");
            $(this).children('.subpage__box').stop().animate({
                bottom: "-45px",

            }, "500");


        });


    });

})($)