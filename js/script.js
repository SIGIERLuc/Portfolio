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


