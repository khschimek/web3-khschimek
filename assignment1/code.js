function load() {
    document.getElementById("number").innerHTML = number;
}

function reset() {
    number = 0;
    load();
}

function plusOne(mult) {
    number += mult*1;
    load();
}

function plusTen(mult) {
    number += mult*10;
    load();
}

function plusHundred(mult) {
    number += mult*100;
    load();
}
