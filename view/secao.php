<?php
include("../model/conexao.php");
$idBol = $_POST['idBol'];
$zona = $_POST['zona'];
$secao = $_POST['secao'];

$cargos = array(1, 3, 5, 6, 7, 8);

echo '<h5"> Zona: ' . $zona . '</h5><br>';

echo '<h5"> Seção: ' . $secao . '</h5>';

$sql = "SELECT * FROM boletim WHERE idBoletim = " . $idBol;
$registro = mysqli_query($conectado, $sql);
while ($registros = mysqli_fetch_array($registro)) {
?>
    <p>Usuario que registrou: <?php echo $registros['UserRegister'] ?></p>
    <p>Usuario que validou: <?php echo $registros['userValidate'] ?></p>

    <?php
    $sql2 = "SELECT * FROM votos WHERE idBoletim = " . $idBol;
    for ($i = 0; $i < 6; $i++) {
        echo "<br>";
        $teste = 0;
        if ($cargos[$i] == 1) {
            echo "Presidente";
        } else if ($cargos[$i] == 3) {
            echo "Governador";
        } else if ($cargos[$i] == 5) {
            echo "Senador";
        } else if ($cargos[$i] == 6) {
            echo "Deputado Federal";
        } else if ($cargos[$i] == 7) {
            echo "Deputado Estadual";
        } else if ($cargos[$i] == 8) {
            echo "Deputado Distrital";
        }
        echo "<br>";
        $registro2 = mysqli_query($conectado, $sql2);
        while ($registros2 = mysqli_fetch_array($registro2)) {

            $cand = $registros2['idCandidato'];
            $sql3 = "SELECT * FROM candidatos WHERE CD_CARGO = '$cargos[$i]' and ID_CANDIDATO = '$cand' GROUP BY '$cand'";
            $registro3 = mysqli_query($conectado, $sql3);
            $row = mysqli_num_rows($registro3);
            if ($row > 0) {
                $teste = 1;
            }
            while ($registros3 = mysqli_fetch_array($registro3)) {
                echo '<h5"> ' . $registros3['NM_URNA_CANDIDATO'] . '</h5>';

                $sql4 = "SELECT sum(votos) as vtotal FROM votos WHERE idCandidato = '$cand' and idBoletim = '$idBol' ";
                $registro4 = mysqli_query($conectado, $sql4);
                while ($registros4 = mysqli_fetch_array($registro4)) {
                    echo '<h5">  Votos:  ' . $registros4['vtotal'] . '</h5><br>';
                }
            }
        }
        if ($row == 0 and  $teste == 0) {
            echo "Sem votos para esse cargo";
            echo "<br>";
        }
    }
    ?>
    <br><br>
    <a href="imgBol.php?idBol=<?php echo $registros['idBoletim'] ?>"> Img Boletim</a><br>
    <a href="https://resultados.tse.jus.br/oficial/app/index.html#/eleicao;e=e544;uf=rs;ufbu=rs;mubu=88412;zn=0041;se=0004/dados-de-urna/boletim-de-urna"> Confira no TSE</a><br>
<?php
}
