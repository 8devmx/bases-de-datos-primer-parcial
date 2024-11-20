colorPicker.addEventListener("input", actualizarPrimero, false);
colorPicker.addEventListener("change", watchColorPicker, false);

function watchColorPicker(event) {
    document.querySelectorAll("nombrecat").forEach(function (nombrecat) {
        nombrecat.style.color = event.target.value;
    });
}

muestrario.select();

var muestrario;
var colorPredeterminado = "#0000ff";

window.addEventListener("load", startup, false);

function startup() {
    muestrario = document.querySelector("#nombrecat");
    muestrario.value = colorPredeterminado;
    muestrario.addEventListener("input", actualizarPrimero, false);
    muestrario.addEventListener("change", actualizarTodo, false); 
    muestrario.select();
    }

function actualizarPrimero(event) {
    var nombrecat = document.querySelector("nombrecat");
    
    if (nombrecat) {
    nombrecat.style.color = event.target.value;
    }
}
function actualizarTodo(event) {
    document.querySelectorAll("nombrecat").forEach(function (nombrecat) {
        nombrecat.style.color = event.target.value;
    });
}

function actualizarTodo(event) {
    document.querySelectorAll("nombrecat").forEach(function (nombrecat) {
        nombrecat.style.color = event.target.value;
    });
    }
