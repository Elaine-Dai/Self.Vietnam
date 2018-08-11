(function($) {



    $(function() {
        //nav expand
        $('.nav__button_expand').on('click', function() {

            $(this).hide(500);

            $(".nav").animate({
                left: "0"
            }, "500");


        });
        //nav close
        $('.nav__button_close').on('click', function() {
            $(".nav").animate({
                left: "-250px"
            }, "500");
            $('.nav__button_expand').show(500);
        });





    });

})($)