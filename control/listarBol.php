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
?>
    <br href="zonas.php?idZona=<?php echo $registros['zona'] ?>">
    <p href="zonas.php?idZona=<?php echo $registros['zona'] ?>">Zona</p>
    <a href="zonas.php?idZona=<?php echo $registros['zona'] ?>"><?php echo $registros['zona'] ?></a>
    <br href="zonas.php?idZona=<?php echo $registros['zona'] ?>">
    <br href="zonas.php?idZona=<?php echo $registros['zona'] ?>">
    <br href="zonas.php?idZona=<?php echo $registros['zona'] ?>">
<?php
}
