<?php
$busca = $_POST['busca'];

include("../model/conexao.php");

$sql = "SELECT * FROM candidatos WHERE NM_URNA_CANDIDATO LIKE '%" . $busca . "%' ORDER BY NM_URNA_CANDIDATO";
$registro = mysqli_query($conectado, $sql);

$row = mysqli_num_rows($registro);

if ($row > 0) {

    echo '<h1  style="margin-top:25px">Candidatos com o nome : ' . $busca . '</h1>';

    while ($registros = mysqli_fetch_array($registro)) {
?>
        <a href="candidato.php?idCand=<?php echo $registros['ID_CANDIDATO'] ?>"><?php echo $registros['NM_URNA_CANDIDATO'] ?></a>
        <br>
<?php
    }
} else {
    echo '<h1  style="margin-top:90px">Nada encontrado</h1>';
}
