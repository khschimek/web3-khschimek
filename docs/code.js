number = 0;

function alert() {
    number += 1;
    document.getElementById("number").innerHTML = number;
}

function start() {
    document.getElementById("number").innerHTML = number;
}
