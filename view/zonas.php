<?php
include("../model/conexao.php");
$zona = $_GET['idZona'];
$votos = 0;
echo '<h5"> Zona: ' . $zona . '</h5>';

$sql = "SELECT * FROM urna WHERE zona=" . $zona . " ORDER BY secao";
$registro = mysqli_query($conectado, $sql);
while ($registros = mysqli_fetch_array($registro)) {

    $sql2 = "SELECT * FROM boletim WHERE valido = 1 and idUrna = " . $registros['idUrna'];
    $registro2 = mysqli_query($conectado, $sql2);
    while ($registros2 = mysqli_fetch_array($registro2)) {

        $sql3 = "SELECT sum(votos) as tVotos FROM votos WHERE idBoletim = " . $registros2['idBoletim'];
        $registro3 = mysqli_query($conectado, $sql3);
        while ($registros3 = mysqli_fetch_array($registro3)) {
            $votos = $votos + $registros3['tVotos'];
        }
?>
        <form name="secao" action="secao.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idBol" id="idBol" value="<?php echo $registros2['idBoletim'] ?>">
            <input type="hidden" name="zona" id="zona" value="<?php echo $zona ?>">
            <input type="hidden" name="secao" id="secao" value="<?php echo $registros['secao'] ?>">
            <input id="enviar" name="enviar" type="submit" value="<?php echo 'Secao: ' . $registros['secao'] ?>">
        </form>
<?php
    }
}
echo '<h5">  Votos totais da zona: ' . $votos  . '</h5><br><br>';
