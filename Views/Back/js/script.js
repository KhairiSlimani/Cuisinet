function verif() 
{
    var errors = 0;

    var nom = document.querySelector('#nom').value;
    var prenom = document.querySelector('#prenom').value;
    var age = document.querySelector('#age').value;
    var titreEmploi = document.querySelector('#titreEmploi').value;
    var tel = document.querySelector('#numeroTelephone').value;
    var form = document.getElementById('form');


    form.addEventListener('submit', (e) => {

        if (nom.charAt(0) < 'A' || nom.charAt(0) > 'Z') {
            alert("Le nom doit commencer par une lettre Majuscule");
            errors = 1;
        }

        if (prenom.charAt(0) < 'A' || prenom.charAt(0) > 'Z') {
            alert("Le prenom doit commencer par une lettre Majuscule");
            errors = 1;
        }

        if (age === "") {
            alert("L'age est obligatoire");
            errors = 1;
        }

        if (titreEmploi === "select") {
            alert("Le titre d'emploi est obligatoire");
            errors = 1;
        }

        if (tel.length != 8) 
        {
            alert("Numéro de téléphone erroné");
            errors = 1;
        }

        if(errors == 1)
        {
            e.preventDefault()
        }

    })
}

