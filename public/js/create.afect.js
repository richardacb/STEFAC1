document
    .querySelector("#create_afect")
    .addEventListener("submit", function (event) {
        let prof_afect = document.querySelector("#profesor_afectado_id").value;
        let prof_suplente = document.querySelector("#profesor_suplente_id").value;
        if (
            prof_afect === prof_suplente &&
            prof_afect !== "" &&
            prof_suplente !== ""
        ) {
            document.querySelector("#err_prof").innerHTML =
                "Los Profesores deben ser Diferentes";
            event.preventDefault();
        }

    });
