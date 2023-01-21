<?php
include("../model/conexao.php");

$selectMuni = $_GET['selectMuni'];
$selectUF = $_GET['selectUF'];

$query = ("SELECT *
    FROM urna
    WHERE idUF = '$selectUF'
    and idMuni = '$selectMuni'
    GROUP BY zona
    ORDER BY zona");

$registro = mysqli_query($conectado, $query);
while ($registros = mysqli_fetch_array($registro)) {
    echo '<h5"> Zona: ' . $registros['zona'] . '</h5><br>';
}
