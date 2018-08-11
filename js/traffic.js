(function($) {



    $(function() {


        var x = document.querySelectorAll(".traBox");
        var y = document.querySelectorAll(".traText");

        $(x[0]).on("mouseover", function() {
            $(y[0]).css("display", "block");
            $(y[1]).css("display", "none");
            $(y[2]).css("display", "none");
        });
        $(x[1]).on("mouseover", function() {
            $(y[0]).css("display", "none");
            $(y[1]).css("display", "block");
            $(y[2]).css("display", "none");
        });
        $(x[2]).on("mouseover", function() {
            $(y[0]).css("display", "none");
            $(y[1]).css("display", "none");
            $(y[2]).css("display", "block");
        });


    });

})($)