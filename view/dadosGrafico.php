<?php
header('Content-Type: application/json');

$numero = $_POST['num'];
include("../model/conexao.php");

//$sqlQuery = "SELECT c.NM_URNA_CANDIDATO, c.NR_CANDIDATO FROM candidatos as c WHERE CD_CARGO = $numero LIMIT 3;";
$sqlQuery =
	"SELECT SUM(v.votos) as TOTAL, c.NM_URNA_CANDIDATO 
	FROM candidatos AS c, votos AS V 
	WHERE CD_CARGO = $numero GROUP BY c.ID_CANDIDATO LIMIT 3;";

$result = mysqli_query($conectado, $sqlQuery);

$dados = array();
foreach ($result as $row) {
	$dados[] = $row;
}

mysqli_close($conectado);

echo json_encode($dados);


// if ($numero == 1) {
// 	$sqlQuery = "SELECT NM_URNA_CANDIDATO, NR_CANDIDATO FROM candidatos WHERE CD_CARGO = 1 LIMIT 3;";
// } elseif ($numero == 3) {
// 	$sqlQuery = "SELECT NM_URNA_CANDIDATO, NR_CANDIDATO FROM candidatos WHERE CD_CARGO = 3 LIMIT 3;";
// }