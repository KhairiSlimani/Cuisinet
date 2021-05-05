
function verif()
{

    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirmation = document.getElementById('confirmation');
    const form = document.getElementById('form');
    const errorElement = document.getElementById('error');

    form.addEventListener('submit', (e) => {
        let messages = []
        if (username.value.length > 10) {
            messages.push("Le nom d'utilisateur ne doit pas dépasser 10 caractères");
        }

        if (password.value != confirmation.value) {
            messages.push("Les mots de passe ne correspondent pas");
        }

        if (messages.length > 0) {
            e.preventDefault()
            errorElement.innerText = messages.join(', ');
        }
    })

}
