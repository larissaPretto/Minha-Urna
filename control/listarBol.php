<?php
include("../model/conexao.php");

$selectMuni = $_GET['selectMuni'];
$selectUF = $_GET['selectUF'];

$query = ("SELECT *
    FROM urna natural join boletim
    WHERE idUF = '$selectUF'
    and idMuni = '$selectMuni'
    GROUP BY zona
    ORDER BY zona");

$registro = mysqli_query($conectado, $query);
while ($registros = mysqli_fetch_array($registro)) {
?>
    <br>
    <p href="zonas.php?idZona=<?php echo $registros['zona'] ?>&idMuni=<?php echo $selectMuni ?>">Zona</p>
    <a style="" href="zonas.php?idZona=<?php echo $registros['zona'] ?>&idMuni=<?php echo $selectMuni ?>"><?php echo $registros['zona'] ?></a>
    <br><br><br><br>
<?php
}
