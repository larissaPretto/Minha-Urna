let selectCargo = document.getElementById('idCargo');
let idUF = document.getElementById('idUF');
let turno = document.getElementById('turno');

selectCargo.onchange = () => {
    let selectCand = document.getElementById('idCand');
    let valor = selectCargo.value;
    let val = idUF.value;
    let val2 = turno.value;
    fetch("../control/selectCandidato.php?idCargo=" + valor + "&idUF=" +val + "&turno=" +val2)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectCand.innerHTML = texto;
        });

}