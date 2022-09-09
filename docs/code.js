number = 0;

function load() {
    document.getElementById("number").innerHTML = number;
}

function plusPointZeroZeroOne() {
    number += 0.001;
    load();
}

function plusPointZeroOne() {
    number += 0.01;
    load();
}

function plusPointOne() {
    number += 0.1;
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
    number += 10;
    load();
}
