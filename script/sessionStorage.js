if (window.sessionStorage) {

    var userName = document.getElementById("name");
    if (sessionStorage.feedbackdata) {
        userName.value = sessionStorage.feedbackdata;
    }
    userName.onkeyup = function (e) {
        sessionStorage.feedbackdata = this.value;
    }
}

