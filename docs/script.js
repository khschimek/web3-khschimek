function update(day, number) {
    if (number == -1) {
        document.getElementById(day).innerHTML = "Not Walked";
    }
    else {
        document.getElementById(day).innerHTML = "Walked";
    }
}
function processing(response) {
    if (response.op == "update") {
        update(response.day, response.value);
    }
    else {
        update(1, response.sunValue);
        update(2, response.monValue);
        update(3, response.tuesValue);
        update(4, response.wednesValue);
        update(5, response.thursValue);
        update(6, response.friValue);
        update(7, response.saturValue);
    }
}
//---------------------------------------------------------------------------------------------
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
        processing(response);
    }
    else {
        alert(response.message);
    }
}

function updateServer(day) {
    url = "http://localhost/server.php";
    method = "POST";
    request = {'op': 'update', 'day': day};
    SendRequestToServer(url,method,request,
        (response)=>ProcessResponse(response));
}

function talkToServer() {
    url = "http://localhost/server.php";
    method = "POST";
    request = {'op': 'talk'};
    SendRequestToServer(url,method,request,
        (response)=>ProcessResponse(response));
}