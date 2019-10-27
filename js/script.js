$(function () {
    /**
    * Smooth scrolling to page anchor on click
    **/
    $("a[href*='#']:not([href='#'])").click(function () {
        if (
            location.hostname == this.hostname
            && this.pathname.replace(/^\//, "") == location.pathname.replace(/^\//, "")
        ) {
            var anchor = $(this.hash);
            anchor = anchor.length ? anchor : $("[name=" + this.hash.slice(1) + "]");
            if (anchor.length) {
                $("html, body").animate({ scrollTop: anchor.offset().top - 150 }, 1500);
            }
        }
    });
});
$(function () {
    /**
    * Smooth scrolling to the top of page
    **/
    $("#description").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500);
    })

});
$('.navbar-nav>li>a').on('click', function () {
    $('.navbar-collapse').collapse('hide');
});

$("#collapsedProject div:first-child").addClass("show");



$(document).ready(function () {
    $('#submitButton').click(function (e) {
        var userinput = $("#email").val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        if (pattern.test(userinput)) {

            var name = $("#name").val().toString();
            var email = $("#email").val().toString();
            var subject = $("#subject").val().toString();
            var message = $("#message").val().toString();

            $.post("./php/mail.php", {
                name: name,
                email: email,
                subject: subject,
                message: message
            }).done(function () {
                $('#name').val("");
                $('#email').val("");
                $('#subject').val("");
                $('#message').val("");
                $('#confirmation').html("Votre message a bien été envoyé");
            });
            e.preventDefault();
        }
        else {
            $('#confirmation').html("Votre adresse Email n'est pas au bon format");
        }
    });
});


