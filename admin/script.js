function loadContent(page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main-content").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", page + ".php", true);
    xhttp.send();
  }






 