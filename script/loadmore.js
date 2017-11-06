
function loadMore(){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if(this.readyState === 4 && this.status===200){

            document.getElementById("more").innerHTML = this.responseText;

        }
    };

    xhttp.open("GET", "text/more.txt", true);

    xhttp.send();
}

function loadMore1() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if(this.readyState === 4 && this.status===200){

            document.getElementById("more1").innerHTML = this.responseText;

        }
    };

    xhttp.open("GET", "text/more1.txt", true);

    xhttp.send();

}