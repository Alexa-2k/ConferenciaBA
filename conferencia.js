let nombre = document.getElementById("nombre");
let apellido = document.getElementById("apellido");
var correo = document.getElementById("correo");
var cantidad = document.getElementById("input-cantidad");
var categ = document.getElementById("input-categoria");
var verifMail = true;
var verifNomb = true;
var verifApell = true;

let precio = 200;

function borrarData() {
     nombre.value = "";
     apellido.value = "";
     correo.value = "";
     cantidad.value = "0";
     categ.value = "1";
     document.getElementById("calculado").textContent = "Total a pagar:  $  ";

}

function dataInput() {
    validateData()
    validateEmail();
    if ((verifMail == false) || (verifNomb == false) || (verifApell == false)) {
        cantidad.value = "";
      }
     calcTotal();   
     verifMail = true ;
     verifNomb = true;
     verifApell = true;   
}

function validateEmail() {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo.value)){
        verifMail = true;   
    } else {
        correo.value = ""
        alertaMail();
        verifMail = false;   
}}

function validateData () {
    if ((nombre.value == "") ||(apellido.value == "" )) {
        alertaNombre();
        verifNomb = false;
        verifApell = false;  
    }  
}

function noAlertaMail() { 
    document.getElementById("alerta-email").style.display = 'none';
}

function alertaMail() {
    document.getElementById("alerta-email").style.display = 'block';
}

function alertaNombre() {
    document.getElementById("alerta-nombre").style.display = 'block';
}

function noAlertaNombre () {
    document.getElementById("alerta-nombre").style.display = 'none';
}

function alertaCantidad() {
    document.getElementById("alerta-cantidad").style.display = 'block';
}

function noAlertaCantidad () {
    document.getElementById("alerta-cantidad").style.display = 'none';
}

function noAlertaUser() { 
    document.getElementById("alerta-user").style.display = 'none';
} 
function alertaUser() {
    document.getElementById("alerta-user").style.display = 'block';
}

function calcTotal() {
    let cant = cantidad.value;
    cant = Number(cant);
    while (cant < 0 || (!Number.isInteger(cant))) { 
        alertaCantidad();
        cantidad.value = 0;
        cant = 0;
    } 
    let cat = categ.value;
    let descuento= (cant * cat);
    let precioFinal = (precio * descuento).toFixed(2);
    let textoTotal = document.getElementById("calculado").textContent = "Total a pagar: $ " + precioFinal;   
    
    if (precioFinal !=0) {
    muestraTotal(); }
}

function muestraTotal(){
    if (verifMail == true && verifNomb == true && verifApell == true) {
    let tipoEntrada = "";
    let precioCategoria = categ.value;
     switch (precioCategoria) {
        case "0.2" : 
        tipoEntrada = "Estudiante";
        break;
        case "0.5" : 
        tipoEntrada = "Trainee";
        break;
        case "0.85" : 
        tipoEntrada = "Junior";
        break;
        case "1" : 
        tipoEntrada = "General";
        break;
        
    }

    let nombreCliente = document.getElementById("li-nombre").textContent = nombre.value + " " + apellido.value ;
    let emailCliente = document.getElementById("li-email").textContent = "E-mail: " +  correo.value;
    let listCant = document.getElementById("li-cantidad").textContent = "Cantidad de entradas: " +  cantidad.value;  
    let listCateg = document.getElementById("li-categoria").textContent = "Categoría: " + tipoEntrada; //categ.value
    
    precioCategoria = parseFloat(precioCategoria)*precio;
    let listPrecio = document.getElementById("li-precioUnit").textContent = "Precio unitario: $ " + (precioCategoria); 
   
    let listTotal = document.getElementById("li-total").innerText = "Total: $  " +  (Number(cantidad.value) * (categ.value*precio)).toFixed(2) ; 

    document.getElementById("totalOK").style.display = 'block';
    } 
}

function noAlertaTotal () {
    document.getElementById("totalOK").style.display = 'none';
}

