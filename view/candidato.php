<?php
$idCand = $_GET['idCand'];

include("../model/conexao.php");

$sql = "SELECT * FROM candidatos WHERE ID_CANDIDATO=" . $idCand;
$registro = mysqli_query($conectado, $sql);
$registros = mysqli_fetch_array($registro);

echo '<h5">' . $registros['NM_URNA_CANDIDATO'] . '</h5><br>';
echo '<h5">' . $registros['NR_CANDIDATO'] . '</h5><br>';

$sql2 = "SELECT * FROM partidos WHERE NR_PARTIDO=" . $registros['NR_PARTIDO'];
$registro2 = mysqli_query($conectado, $sql2);
$registros2 = mysqli_fetch_array($registro2);

echo '<h5">' . $registros2['NM_PARTIDO'] . '</h5><br>';

$sql3 = "SELECT * FROM cargos WHERE CD_CARGO=" . $registros['CD_CARGO'];
$registro3 = mysqli_query($conectado, $sql3);
$registros3 = mysqli_fetch_array($registro3);

echo '<h5">' . $registros3['NM_CARGO'] . '</h5><br>';


$sql7 = "SELECT * FROM estadouf WHERE id=" . $registros['ID_UF'];
$registro7 = mysqli_query($conectado, $sql7);
$registros7 = mysqli_fetch_array($registro7);

echo '<h5">' . $registros7['uf'] . '</h5><br>';

$sql5 = "SELECT sum(votos) as tvotos FROM votos WHERE idCandidato=" . $idCand;
$registro5 = mysqli_query($conectado, $sql5);
$registros5 = mysqli_fetch_array($registro5);

echo '<h5"> Votos totais: ' . $registros5['tvotos'] . '</h5><br><br>';


$sql4 = "SELECT idBoletim FROM votos WHERE idCandidato=" . $idCand . " GROUP BY idBoletim";
$registro4 = mysqli_query($conectado, $sql4);
while ($registros4 = mysqli_fetch_array($registro4)) {

    $sql6 = "SELECT * FROM boletim WHERE idboletim=" . $registros4['idBoletim'];
    $registro6 = mysqli_query($conectado, $sql6);
    while ($registros6 = mysqli_fetch_array($registro6)) {
        echo '<h5"> Boletim: ' . $registros6['idBoletim'] . '</h5><br>';
        echo '<h5"> Urna: ' . $registros6['idUrna'] . '</h5><br>';
    }
}
