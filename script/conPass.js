function confirmPass() {
    var confirm = document.getElementById('confirmPass');

    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('confirm');

    var good = "#66cc66";
    var bad = "#ff6666";

    if (pass1.value === pass2.value) {
        pass1.style.backgroundColor = good;
        pass2.style.backgroundColor = good;
    } else {
        pass2.style.backgroundColor = bad;
    }

}

$(function () {
    $("#password").complexify({}, function (valid, complexity) {
        $("#progressbar").progressbar({
            value: complexity
        });
    });

});