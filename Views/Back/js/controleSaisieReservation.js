function verif() {
    var error = true;
    var id_client = document.getElementById('idclient');
    var ddl = document.getElementById("idclient");
    var card = ddl.options[ddl.selectedIndex].value;
    var numerotel = document.getElementById('numerotel').value;
    var date = document.getElementById('date').value;
    var nombre = document.getElementById('nombre').value;
    if (card == "") {
        document.getElementById('labelidclient').innerHTML = "Choisir le nom!";
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
    if (date == "") {
        document.getElementById('labeldate').innerHTML = "La date est obligatoire!";
        error = false;

    } else {

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("labeldate").setAttribute("max", today);

    }
    if (nombre == "") {
        document.getElementById('labelnombre').innerHTML = "Tapez le nombre!";
        error = false;
    }
    return error;
}