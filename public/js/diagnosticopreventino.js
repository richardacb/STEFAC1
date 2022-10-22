$(function () {
    $("#tipo_medicamentos").on("change", Medicamentos);
});
function Medicamentos() {
    $("#tipo_medicamentos_consumo").show();
    $("#tipo_medicamentos_cons").show();
}
