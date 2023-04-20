const validation = new JustValidate("#inserimento");

validation
    .addField("#nome_azienda", [
        {
            rule: "required",
            errorMessage: "Il nome dell'azienda è richiesto."
        }
    ])
    .addField("#posizione", [
        {
            rule: "required",
            errorMessage: "La posizione è richiesta."
        }
    ])
    .addField("#periodo", [
        {
            rule: "required",
            errorMessage: "Il periodo di lavoro è richiesto."
        }
    ])
    .addField("#stipendio", [
        {
            rule: "required",
            errorMessage: "Il stipendio è richiesto."
        }
    ])
    .addField("#indirizzo", [
        {
            rule: "required",
            errorMessage: "L'indirizzo dell'azienda è richiesto."
        }
    ])
    .addField("#ore", [
        {
            rule: "required",
            errorMessage: "Le ore sono richieste."
        }
    ])
    .addField("#posti_disponibili", [
        {
            rule: "required",
            errorMessage: "E' richiesto inserire i posti disponibili.."
        }
    ])
    .onSuccess((event) => {
        document.getElementById("inserimento").submit();
    });
    