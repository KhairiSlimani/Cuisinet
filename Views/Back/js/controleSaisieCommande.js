function verif() {
    var error = true;
    var nomClient = document.getElementById('nomclient').value;
    var adresse = document.getElementById('adresse').value;
    var numerotel = document.getElementById('numerotel').value;
    var idPlat = document.getElementById('idPlat');
    var ddl = document.getElementById("idPlat");
    var card = ddl.options[ddl.selectedIndex].value;
    if (nomClient.length > 8) {
        document.getElementById('labelnomclient').innerHTML = "Tapez le nombre!";
        error = false;
    }
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
    if (card == "") {
        document.getElementById('labelidPlat').innerHTML = "Choisir l'id de plat!";
        error = false;
    }
    return error;
}