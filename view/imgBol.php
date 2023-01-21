<?php
include("../model/conexao.php");
$idBol = $_GET['idBol'];

$sql = "SELECT * FROM boletim WHERE idBoletim=" . $idBol;
$registro = mysqli_query($conectado, $sql);
while ($registros = mysqli_fetch_array($registro)) {
    echo '  <img src="../img/' . $registros['imgBoletim'] . '" alt=""style="position: absolute;
              width: 216px;
              height: 216px;
              left: 64px;
              top: -356px;
              border-radius: 999px">';
}
