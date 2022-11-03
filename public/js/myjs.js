/*Select de la Página Horario*/
// $(document).ready(function Validaraño() {
//     if ($("#años").val() == "0") {
//         $("#semana").hide();
//         $("#grupos").hide();
//         $("#semana4to").hide();
//         $("#grupos4to").hide();

//         $("#años").change(function () {
//             if ($("#años").val() == "1") {
//                 $("#semana").hide();
//                 $("#grupos").hide();
//                 $("#semana4to").hide();
//                 $("#grupos4to").hide();
//             }
//             if ($("#años").val() == "2") {
//                 $("#semana").hide();
//                 $("#grupos").hide();
//                 $("#semana4to").hide();
//                 $("#grupos4to").hide();
//             }
//             if ($("#años").val() == "3") {
//                 $("#semana").hide();
//                 $("#grupos").hide();
//                 $("#semana4to").hide();
//                 $("#grupos4to").hide();
//             }
//             if ($("#años").val() == "4") {
//                 $("#semana").hide();
//                 $("#grupos").hide();
//                 $("#semana4to").show();
//                 $("#grupos4to").show();
//             }
//             if ($("#años").val() == "5") {
//                 $("#semana").show();
//                 $("#grupos").show();
//                 $("#semana4to").hide();
//                 $("#grupos4to").hide();
//             }
//         });
//     }
// });

/*Select de horario 5 seleccionar frecuencias
$(document).ready(function Validarfrecuencias5to(e){

    if ($("#frecuencias").val() == "0") {

        $("#tipodeclase1").hide();
        $("#tipodeclase2").hide();
        $("#tipodeclase3").hide();
        $("#tipodeclase4").hide();

        $("#frecuencias").change(function () {
            if ($("#frecuencias").val() == "1") {

                $("#tipodeclase1").show();
                $("#tipodeclase2").hide();
                $("#tipodeclase3").hide();
                $("#tipodeclase4").hide();
            }
            if ($("#frecuencias").val() == "2") {

                $("#tipodeclase1").hide();
                $("#tipodeclase2").show();
                $("#tipodeclase3").hide();
                $("#tipodeclase4").hide();
            }
            if ($("#frecuencias").val() == "3") {

                $("#tipodeclase1").hide();
                $("#tipodeclase2").hide();
                $("#tipodeclase3").show();
                $("#tipodeclase4").hide();
            }
            if ($("#frecuencias").val() == "4") {

                $("#tipodeclase1").hide();
                $("#tipodeclase2").hide();
                $("#tipodeclase3").hide();
                $("#tipodeclase4").show();
            }
        });
    }
});
*/
// Para select de carga docente para cambiar los profesores en dependencia de la asignatura
$(function () {
    $("#asignaturas_id").on("change", filtrarProf);
});
function filtrarProf() {
    let asignaturas_id = $(this).val();
    // console.log(asignaturas_id);
    //Ajax
    $.get(`/api/asignaturas/${asignaturas_id}`, function (data) {
        let html_select =
            ' <option value="">--Seleccione el Profesor--</option>';
        for (let i = 0; i < data.length; i++) {
            html_select +=
                '<option value="' +
                data[i].id +
                '">' +
                data[i].primer_nombre +
                "&nbsp;" +
                data[i].segundo_nombre +
                "&nbsp;" +
                data[i].primer_apellido +
                "&nbsp;" +
                data[i].segundo_apellido +
                "</option>";
        }
        $("#profesores_id").html(html_select);
    });
}
//Para llamar el metodo buscar
$(function () {
    $("#buscarindex").on("submit", onSelectHorario);
});
function onSelectHorario(e) {
    e.preventDefault();
    let anno = document.getElementById("anno").value;
    let semana = document.getElementById("semana").value;
    let grupo = document.getElementById("grupo").value;
    if (grupo == "" || anno == "" || semana == "") {
        document.querySelector("#error_buscarhorario").innerHTML = "Todos los campos son requeridos";

    }
    else{
        $.post(
            `/api/horario/`,
            {
                anno,
                semana,
                grupo,
            },
            (data) => {
                let rows = `
                <div class="card">
                <div class="card-body">
                <table class="table table-striped shadow-lg pt-4 text-center" id="afect">
                    <thead class="bg-primary text-white">
                    <th style='border-style: solid; border-width: 1px; padding: 5px;' colspan='6'></th>
                    <tr>
                        <th style='width: 5%';>Turno</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                </thead>
                <tbody>
                 <tr>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>1</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[1][1] !== null ? data[1][1] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[2][1] !== null ? data[2][1] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[3][1] !== null ? data[3][1] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[4][1] !== null ? data[4][1] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[5][1] !== null ? data[5][1] : ""
                    }</td>
                </tr>
                <tr>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>2</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[1][2] !== null ? data[1][2] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[2][2] !== null ? data[2][2] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[3][2] !== null ? data[3][2] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[4][2] !== null ? data[4][2] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[5][2] !== null ? data[5][2] : ""
                    }</td>
                </tr>
                <tr>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>3</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[1][3] !== null ? data[1][3] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[2][3] !== null ? data[2][3] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[3][3] !== null ? data[3][3] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[4][3] !== null ? data[4][3] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[5][3] !== null ? data[5][3] : ""
                    }</td>
                </tr>
                <tr>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>4</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[1][4] !== null ? data[1][4] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[2][4] !== null ? data[2][4] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[3][4] !== null ? data[3][4] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[4][4] !== null ? data[4][4] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[5][4] !== null ? data[5][4] : ""
                    }</td>
                </tr>
                <tr>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>5</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[1][5] !== null ? data[1][5] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[2][5] !== null ? data[2][5] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[3][5] !== null ? data[3][5] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[4][5] !== null ? data[4][5] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[5][5] !== null ? data[5][5] : ""
                    }</td>
                </tr>
                <tr>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>6</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[1][6] !== null ? data[1][6] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[2][6] !== null ? data[2][6] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[3][6] !== null ? data[3][6] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[4][6] !== null ? data[4][6] : ""
                    }</td>
                    <td style='border-style: solid; border-width: 1px; padding: 5px;'>${
                        data[5][6] !== null ? data[5][6] : ""
                    }</td>
                </tr>
                </tbody>
                </table>
                </div>
                </div>
                 `;
                $("#body_horario").html(rows);
            }
            );
        }
    //Ajax


}
//Funcion para actualizar las afectaciones en el Horario
// $(function () {
//     $("#create_afect").on("submit", onUpdateAfect);
// });
// function onUpdateAfect(e) {
//     e.preventDefault();
//     let profesor_afectado_id = document.getElementById(
//         "profesor_afectado_id"
//     ).value;
//     let semana = document.getElementById("semana").value;
//     let dia = document.getElementById("dia").value;
//     let turno = document.getElementById("turno").value;
//     let anno = document.getElementById("anno").value;
//     // console.log(afectado);
//     // console.log(semana);
//     // console.log(dia);
//     // console.log(turno);
//     // console.log(anno);

//     //Ajax
//     $.post(
//         `/api/afectaciones/`,
//         {
//             profesor_afectado_id,
//             semana,
//             dia,
//             turno,
//             anno,
//         },
//         (data) => {
//             window.location.href = "/admin/afectaciones";
//         }
//         //console.log(data);
//     );
// }

//dats del crear parciales
// $(function () {
//     $("#create_pp").on("submit", onSelectParcial);
// });
// function onSelectParcial(e) {
//     e.preventDefault();
//     let anno = document.getElementById("anno").value;
//     let semestre = document.getElementById("semestre").value;
//     let semana = document.getElementById("semana").value;
//     let dia = document.getElementById("dia").value;
//     let turno = document.getElementById("turno").value;
//     let asignaturas_id = document.getElementById("asignaturas_id").value;
//     let action = document.getElementById("create_pp").attributes[0].value;

//     console.log(anno);
//     console.log(semestre);
//     console.log(semana);
//     console.log(dia);
//     console.log(turno);
//     console.log(asignaturas_id);
//     console.log(action);


//     $.post(`app/generar_horario/update_horario.php`, function (data) {
//         anno,
//         semestre,
//         semana,
//         dia,
//         turno,
//         asignaturas_id,
//         action
//     });
// }
