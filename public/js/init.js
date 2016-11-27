function userName(){
    var response = document.getElementById('username').value;
    location = "/check/" + response;
    return false;
}
