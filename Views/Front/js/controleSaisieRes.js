function verif() {
    var error = true;
    var numerotel = document.getElementById('numerotel').value;
    var nombre = document.getElementById('nombre').value;
    if (numerotel.length == "") {
        document.getElementById('labelnumero').innerHTML = "Tapez votre numéro telephone!";
        error = false;
    } else
    if (numerotel.length != 8) {
        document.getElementById('labelnumero').innerHTML = "Tapez un numéro valide!";
        error = false;
    }

    if (nombre == "") {
        document.getElementById('labelnombre').innerHTML = "Tapez le nombre!";
        error = false;
    }
    return error;
}