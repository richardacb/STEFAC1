document
    .querySelector("#edit_opt")
    .addEventListener("submit", function (event) {
        let prof_principal = document.querySelector("#prof_principal").value;
        let prof_auxiliar = document.querySelector("#prof_auxiliar").value;
        if (
            prof_principal === prof_auxiliar &&
            prof_principal !== "" &&
            prof_auxiliar !== ""
        ) {
            document.querySelector("#err_prof").innerHTML =
                "Los Profesores deben ser Diferentes";
            event.preventDefault();
        }
        if (prof_principal === "" && prof_auxiliar === "") {
            document.querySelector("#err_prof").innerHTML = "Campos Requeridos";
            event.preventDefault();
        }
    });
