function checkEmail(email)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function verif() 
{
    var errors = "<ul>";

    var username = document.querySelector('#username').value;
    var password = document.querySelector('#password').value;
    var confirmation = document.querySelector('#confirmation').value;
    var email = document.querySelector('#email').value;
    var phone = document.querySelector('#phone').value;
    var form = document.getElementById('form');


    form.addEventListener('submit', (e) => {

        if (username.length > 10) 
        {
            errors += "<li>Le nom d'utilisateur ne doit pas dépasser 10 caractères</li>";
        }

        if (password != confirmation) 
        {
            errors += "<li>Les mots de passe ne correspondent pas</li>";
        }

        if (!checkEmail(email)) {
            errors += "<li>L'email est invalide</li>";

        }

        if (phone.length != 8) 
        {
            errors += "<li>Numéro de téléphone erroné</li>";

        }

        if(errors !== "<ul>")
        {
            
            document.querySelector('#erreur').style.color = 'white';
            document.getElementById('erreur').innerHTML = errors;
            e.preventDefault()
    
        }
    })
}

