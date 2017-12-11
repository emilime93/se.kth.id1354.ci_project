var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        var respone = xhttp.responseText;
        response = JSON.parse(respone);
        console.log(response);
    }
}
xhttp.open("GET", "data.json", true);
xhttp.send();


//  ENABLE THIS IF UNSURE OF JQUERY WOKRS
/*
window.onload = function() {
    if (window.jQuery) {
        // jQuery is loaded
        alert("jQuery works!");
    } else {
        // jQuery is not loaded
        alert("jQuery doesn't Work");
    }
}
*/