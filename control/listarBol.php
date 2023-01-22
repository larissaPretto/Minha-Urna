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
    <a href="zonas.php?idZona=<?php echo $registros['zona'] ?>">Zona: <?php echo $registros['zona'] ?></a>
<?php
}
