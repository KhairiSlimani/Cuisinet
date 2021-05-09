function verif() {
    var error = true;
    var adresse = document.getElementById('adresse').value;
    var numerotel = document.getElementById('numerotel').value;
    if (adresse == "") {
        document.getElementById('labeladresse').innerHTML = "Tapez l'adresse!";
        error = false;
    }
    if (numerotel.length == "") {
        document.getElementById('labelnumero').innerHTML = "Tapez votre numéro telephone!";
        error = false;
    } else
    if (numerotel.length != 8) {
        document.getElementById('labelnumero').innerHTML = "Tapez un numéro valide!";
        error = false;
    }

    return error;
}