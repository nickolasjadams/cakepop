if (window.localStorage.getItem("nav") == "less") {
	toggleNav();
}

function toggleNav() {
	$(".sidenav").toggleClass("less");
	$("#nav-toggle").toggleClass("less");
	if ($(".sidenav").hasClass("less")) {
		window.localStorage.setItem("nav", "less");
	} else {
		window.localStorage.setItem("nav", "more");
	}

}

// event listeners
if ($("#nav-toggle").length) {
	document.querySelector("#nav-toggle").addEventListener("click", function() {
		toggleNav();
	});
}