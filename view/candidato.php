<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Candidato | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pesquisa.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

</head>
    <p class="pageTitle">Dados do candidato</p>

    <div style=width: 358px;>
<?php
$idCand = $_GET['idCand'];

include("../model/conexao.php");

$sql = "SELECT * FROM candidatos WHERE ID_CANDIDATO=" . $idCand;
$registro = mysqli_query($conectado, $sql);
$registros = mysqli_fetch_array($registro);

    echo '<h5 style="position: absolute;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
        width: 350px;
        height: 25px;
        left: 16px;
        top: 42px;
        box-sizing: border-box;
        position: absolute;
        width: 358px;
        height: 164px;
        left: 16px;
        top: 56px;
        padding-top: 18px;
        padding-left: 20px;
        background: linear-gradient(104.06deg, #E3EED3 1.9%, rgba(162, 205, 150, 0.75) 106.2%);
        border: 0.5px solid rgba(0, 0, 0, 0.25);
        border-radius: 16px;"">' . $registros['NM_URNA_CANDIDATO'] . '</h5><br>';
    echo '<h5 style="position: absolute;
        width: auto;
        height: 18px;
        right: 32px;
        top: 111px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;
        color: #000000;">' . $registros['NR_CANDIDATO'] . '</h5><br>';

$sql2 = "SELECT * FROM partidos WHERE NR_PARTIDO=" . $registros['NR_PARTIDO'];
$registro2 = mysqli_query($conectado, $sql2);
$registros2 = mysqli_fetch_array($registro2);

echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    right: 32px;
    top: 90px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;"">' . $registros2['SG_PARTIDO'] . '</h5><br>';

$sql3 = "SELECT * FROM cargos WHERE CD_CARGO=" . $registros['CD_CARGO'];
$registro3 = mysqli_query($conectado, $sql3);
$registros3 = mysqli_fetch_array($registro3);

echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    left: 37px;
    top: 112px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;"">Candidato a</h5><br>';
echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    left: 122px;
    top: 112px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;"">' . $registros3['NM_CARGO'] . '</h5><br>';


$sql7 = "SELECT * FROM estadouf WHERE id=" . $registros['ID_UF'];
$registro7 = mysqli_query($conectado, $sql7);
$registros7 = mysqli_fetch_array($registro7);

echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    right: 32px;
    top: 157px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;"">Abrangência</h5><br><br>';


echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    right: 32px;
    top: 179px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
color: #000000;"">' . $registros7['uf'] . '</h5><br>';

$sql5 = "SELECT sum(votos) as tvotos FROM votos WHERE idCandidato=" . $idCand;
$registro5 = mysqli_query($conectado, $sql5);
$registros5 = mysqli_fetch_array($registro5);

echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    left: 36px;
    top: 157px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;"">Votos totais</h5><br><br>';
    
    echo '<h5 style="position: absolute;
    width: auto;
    height: 18px;
    left: 36px;
    top: 168px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;

    color: #000000;"">' . $registros5['tvotos'] . '</h5><br><br>'; '</h5><br>';

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
