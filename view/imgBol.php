<?php
include("../model/conexao.php");
$idBol = $_GET['idBol'];

$sql = "SELECT * FROM boletim WHERE idBoletim=" . $idBol;
$registro = mysqli_query($conectado, $sql);
while ($registros = mysqli_fetch_array($registro)) {
    $img = $registros['imgBoletim'];
    echo $img;
?>
    <img src="../img/<?php echo $img ?>">
<?php
}
