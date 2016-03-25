(function ($) {

    var intervalId = setInterval(function () {
        $("#refreshButton").click();
    }, 3000);


    $('#refreshButton').click(function () {
        var data = '';
        $.ajax({
            type: "POST",
            url: "/main/posts",
            data: data,
            dataType: "html",
            success: function (response) {
                $("#result").html(response);
            },
            error: function (response) {
                $("#result").html("error");
            }
        })
    });

    $('#submit').click(function () {
        clearInterval(intervalId);
        $("#sent").html('Sending message to server...');
        var data = $('form').serialize();
        $.ajax({
            type: "POST",
            url: "/main/AddMessage",
            data: data,
            dataType: "html",
            success: function (response) {
                $("#sent").html(response);
            },
            error: function (response) {
                $("#sent").html("error");
            }
        });
        var intervalId = setInterval(function () {
            $("#refreshButton").click();
        }, 3000);
    });

})(jQuery);