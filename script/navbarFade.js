//Jquery function to fade navbar

window.addEventListener("scroll", function() {
    if (window.scrollY > 25) {
        $('.navbar-fixed-top').fadeOut();
    }
    else {
        $('.navbar-fixed-top').fadeIn();
    }
},false);

