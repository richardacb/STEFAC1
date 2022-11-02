// Select multiple de Estudiantes
$(function () {
    $('#user_id').on('change', onSelectGruposestudiantes);
    });
    function onSelectGruposestudiantes() {
        let gruposest = $(this).val();
            //Ajax
    $.get(`/api/estudiantes/${gruposest}`, function (data) {
        let html_select =
            ' <option value="">--Seleccione el Grupo--</option>';
console.log(data);
        for (let i = 0; i < data.length; i++) {
            html_select +=
                '<option value="' +
                data[i].id +
                '">' +
                data[i].name +
                "&nbsp;"
                "</option>";
        }
        $("#grupos_id").html(html_select);
    });
    }


