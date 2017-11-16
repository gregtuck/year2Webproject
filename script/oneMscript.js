window.onload = function () {

    setMode();

};

function setMode() {
    var style = document.getElementById("theatre");
    var standard = document.getElementById("standard");


    style.onclick = function () {
        setStyle("css/theatreMode.css")
    };
    standard.onclick = function () {
        setStyle("css/oneMoment.css")
    }
}

function setStyle(style) {
    document.getElementById("pageStyle").setAttribute("href", style);
}

