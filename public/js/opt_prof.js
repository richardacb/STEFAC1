document
    .querySelector("td > div")
    .addEventListener("dblclick", function (event) {
        if (this.childNodes[1].disabled == false) {
            this.childNodes[1].disabled = true;
        } else {
            this.childNodes[1].disabled = false;
        }
    }),
    (document.getElementById("nota").onchange = function () {
        let nota = this.value;
        let id = this.parentNode.id;
        $.post(`/api/opt_est/${id}`, {
            nota: nota,
        });
    });
