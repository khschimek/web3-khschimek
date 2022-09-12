function load() {
    document.getElementById("number").innerHTML = number;
}

function reset() {
    number = 0;
    load();
}

function plusOne() {
    number += 1;
    load();
}

function plusTen() {
    number += 10;
    load();
}

function plusHundred() {
    number += 100;
    load();
}
