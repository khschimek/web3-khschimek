function SendRequestToServer(url, method, request, handler) {
    const xhttp = new XMLHttpRequest();
    const encodedRequest = JSON.stringify(request);
    const parameters = "request=" + encodeURIComponent(encodedRequest);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            json = JSON.parse(this.response);
            handler(json);
        }
    }
    if(method=="GET") {
        url = url + "?" + parameters;
    }
    xhttp.open(method, url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    console.log(encodedRequest);
    if(method=="POST") {
        xhttp.send(parameters);
    }
    else {
        xhttp.send();
    }
    console.log('server request sent');
}

function ProcessResponse(response) {
    if (response.status == "ok") {
        document.getElementById("z").value = response.value;
    }
    else {
        alert(response.message);
    }
}

function addOnServer() {
    const x=parseFloat(document.getElementById("x").value);
    const y=parseFloat(document.getElementById("y").value);
    url = "http://localhost/server.php";
    method = "POST";
    request = {'op': 'add', 'args': [x,y]};
    SendRequestToServer(url,method,request,
        (response)=>ProcessResponse(response));
}