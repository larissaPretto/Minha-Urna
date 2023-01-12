let selectUF = document.getElementById('idUF');

selectUF.onchange = () => {
    let selectMuni = document.getElementById('idMuni');
    fetch("../selectMuni.php?idUF=AC")
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectMuni.innerHTML = texto;
        });

}