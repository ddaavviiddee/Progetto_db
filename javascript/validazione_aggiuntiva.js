const validation = new JustValidate("#registrazione"); // Utilizziamo un drop-in chiamato just_validate, qui vengono apportate le modifiche per la nostra applicazione

// Validazione client-side

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
            validator: (value) => () => {                                        // Questo validator controlla se una email è già in utilizzo nel DB.
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
    .onSuccess((event) => {
        document.getElementById("registrazione").submit();
    });