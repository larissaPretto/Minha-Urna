//criar pasta js
<<<<<<< HEAD:view/funcoes.js
let selectUF = document.getElementById("idUF");

selectUF.onchange = () => {
  let selectMuni = document.getElementById("idMuni");
  fetch("../control/selectMuni.php?idUF=AC")
    .then((response) => {
      return response.text();
    })
    .then((texto) => {
      selectMuni.innerHTML = texto;
    });
};
=======
let selectUF = document.getElementById('idUF');

selectUF.onchange = () => {
    let selectMuni = document.getElementById('idMuni');
    let valor = selectUF.value;
    fetch("../control/selectMuni.php?idUF=" + valor)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectMuni.innerHTML = texto;
        });

}
>>>>>>> d8cdd7f85ba74a697ec7e9a065a5d61d562d352e:funcoes.js
