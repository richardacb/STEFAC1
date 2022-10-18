$(function () {
    $("#annoprof").on("change", onSelectGrupos);
});
function onSelectGrupos() {
    let gruposprof = $(this).val();
    //Ajax
    $.get(`/api/estudiantes/${gruposprof}`, function (data) {
        let html_select = ' <option value="">--Seleccione el Grupo--</option>';
        for (let i = 0; i < data.length; i++) {
            html_select +=
                '<option value="' + data[i].id + '">' + data[i].name + "&nbsp;";
            ("</option>");
        }
        $("#grupos_idprof").html(html_select);
    });
}
