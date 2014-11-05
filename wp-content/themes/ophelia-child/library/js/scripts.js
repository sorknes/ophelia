// Responsive nav
var nav = responsiveNav("#nav", {
	transition: 284,
	label: "Menu",
	customToggle: "#nav-toggle",
});

jQuery(function() {
    jQuery('.page-scroll li a, .intro-btn a').bind('click', function(event) {
        var $anchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: ((jQuery($anchor.attr('href')).offset().top) - 79)
        }, 1500, 'easeInOutExpo');
        
        event.preventDefault();
    });
});