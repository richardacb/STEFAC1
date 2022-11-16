document
    .querySelector("#generarhorario")
    .addEventListener("submit", function (event) {
        let seccion = document.querySelector("#seccion").value;
        let anno = document.querySelector("#anno").value;
        let semana = document.querySelector("#semana").value;
        if (seccion == "" || anno == "" || semana == "") {
            document.querySelector("#error_horario").innerHTML = "Todos los campos son requeridos";
            event.preventDefault();
        }
    });
