const validation = new JustValidate("#registrazione");

validation
    .addField("#nome", [
        {
            rule: "required",
            errorMessage: 'Il nome è richiesto'
        }
    ])
    .addField("#cognome", [
        {
            rule: "required",
            errorMessage: 'Il cognome è richiesto'
        }
    ])
    .addField("#email", [
        {
            rule: "required", 
        },
        {
            rule: "email",
            errorMessage: 'Inserire una email valida'
        },
        {
            validator: (value) => () => {
                return fetch("valida_email.php?email=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "L'email è utilizzata da un altro utente."
        }
    ])
    .addField("#password", [
        {
            rule: "required",
            errorMessage: 'Questo campo deve essere riempito'
        },
        {
            rule: "password",
            errorMessage: 'La password deve contenere almeno 8 caratteri e un numero'
        }
    ])
    .addField("#conferma_password", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Le password devono combaciare"
        }
    ])
    .addField("#campo", [
        {
            rule: "required",
            errorMessage: 'Questo campo deve essere riempito'
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });