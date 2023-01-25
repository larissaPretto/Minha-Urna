<?php
header('Content-Type: application/json');

$numero = $_POST['num'];
include("../model/conexao.php");

$sql = "SELECT sum(votos) as TOTAL, NM_URNA_CANDIDATO FROM boletim natural join votos join candidatos on idCandidato = ID_CANDIDATO where CD_CARGO = $numero GROUP BY idCandidato order by total DESC LIMIT 3";

$result = mysqli_query($conectado, $sql);

$dados = array();
foreach ($result as $row) {
	$dados[] = $row;
}

mysqli_close($conectado);

echo json_encode($dados);
<<<<<<< HEAD
=======


// if ($numero == 1) {
// 	$sqlQuery = "SELECT NM_URNA_CANDIDATO, NR_CANDIDATO FROM candidatos WHERE CD_CARGO = 1 LIMIT 3;";
// } elseif ($numero == 3) {
// 	$sqlQuery = "SELECT NM_URNA_CANDIDATO, NR_CANDIDATO FROM candidatos WHERE CD_CARGO = 3 LIMIT 3;";
// }
>>>>>>> 9de8e2500a10422c9007d72c22ab372ddf64ef67
