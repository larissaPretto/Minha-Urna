//criar pasta js

let selectUF = document.getElementById('idUF');

selectUF.onchange = () => {
    let selectMuni = document.getElementById('idMuni');
    fetch("../control/selectMuni.php?idUF=AC")
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectMuni.innerHTML = texto;
        });

}