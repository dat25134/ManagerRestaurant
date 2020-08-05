$(document).on({
    ajaxStart: function () {
        $(".spinner").show();
    },
    ajaxStop: function () {
         $(".spinner").hide();
    },
    ajaxError: function () {
        $(".spinner").hide();
    }
});
