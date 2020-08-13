$( function() {
    var languages = {
        init: function() {
            var _self = this;

            if ( $(".js-select_lang").length ) {
                $(".js-select_lang").click( function() {
                    var lang = $(this).attr("data-lang");
                    window.open("/?updatelang="+lang);
                } );
            }
        }
    }.init();

    var modalcookie = {
        init: function () {
            var _self = this;

            if ( $(".js-modalcookie-close").length ) {
                $(".js-modalcookie-close").click(function() {
                    $("#modcookie").hide();

                    return false;
                });
            }
        }
    }.init();

    var leftmenu = {
        init: function () {
            var _self = this;

            $(".site-menu_left .current-page").parents("ul").css("display","block");
        }
    }.init();
});