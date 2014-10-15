// Responsive nav
var nav = responsiveNav("#nav", {
	transition: 284,
	label: "Menu",
	customToggle: "#nav-toggle",
});

// Scrollspy
jQuery('body').scrollspy({ target: '.navbar-example' })