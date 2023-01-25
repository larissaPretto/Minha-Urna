turno.onchange = () => {
    let selectMuni = document.getElementById('idMuni');
    let val = selectUF.value;
    fetch("../control/selectMuni.php?idUF=" + val)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectMuni.innerHTML = texto;
        });

}