function verif() 
{

    var nom = document.querySelector('#nom').value;
    var prenom = document.querySelector('#prenom').value;
    var age = document.querySelector('#age').value;
    var titreEmploi = document.querySelector('#titreEmploi').value;
    var tel = document.querySelector('#numeroTelephone').value;
    var form = document.getElementById('form');
    var errorElement = document.getElementById('error');


    form.addEventListener('submit', (e) => {
        let messages = []
        if (nom.length > 10) {
            messages.push("La longueur du nom doit pas dépasser 10 caractères");

        }

        if (prenom.length > 10) {
            messages.push("La longueur du prenom doit pas dépasser 10 caractères");

        }

        if (age === "") {
            messages.push("L'age est obligatoire");

        }

        if (titreEmploi === "select") {
            messages.push("Le titre d'emploi est obligatoire");

        }

        if (tel.length != 8) 
        {
            messages.push("Numéro de téléphone erroné");

        }

        if (messages.length > 0) {
            e.preventDefault()
            errorElement.innerText = messages.join(', ');
        }

    })
}

