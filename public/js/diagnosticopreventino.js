$(function () {
    $("#tipo_medicamentos").on("change", Medicamentos);
});
function Medicamentos() {
    $("#tipo_medicamentos_consumo").show();
    $("#tipo_medicamentos_cons").show();
}
function p1 (e) {
            $("#label_desc_prob_de_personalidad").toggle();   
            $("#desc_prob_de_personalidad").toggle();  
}

function p2 (e) {
            $("#label_desc_prob_de_psiquiatricos").toggle();   
            $("#desc_prob_de_psiquiatricos").toggle(); 
}
function p3 (e) {
    $("#label_desc_prob_de_economicos").toggle();   
    $("#desc_prob_de_economicos").toggle(); 
}
function p4 (e) {
            $("#label_desc_prob_de_sociales").toggle();   
            $("#desc_prob_de_sociales").toggle(); 
}
function p5 (e) {
    $("#label_desc_prob_de_familiares").toggle();   
    $("#desc_prob_de_familiares").toggle(); 
}
function p6 (e) {
    $("#label_desc_prob_de_academicos").toggle();   
    $("#desc_prob_de_academicos").toggle(); 
}
function p7 (e) {
    $("#label_desc_prob_de_disciplina").toggle();   
    $("#desc_prob_de_disciplina").toggle(); 
}
function p8 (e) {
    $("#label_desc_prob_de_asistencia").toggle();   
    $("#desc_prob_de_asistencia").toggle(); 
}
