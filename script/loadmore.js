function loadMore(){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if(this.readyState === 4 && this.status===200){

            document.getElementById("more").innerHTML = this.responseText;

        }
    };

    xhttp.open("GET", "more.txt", true);

    xhttp.send();
}