<?php
include("../model/conexao.php");

$idCargo = $_GET['idCargo'];
$idUF = $_GET['idUF'];
$turno = $_GET['turno'];

if ($idCargo == 3 or $idCargo == 5 or $idCargo == 7) {
    $query = ("SELECT *
    FROM candidatos
    WHERE CD_CARGO = '$idCargo' 
    and ID_UF = '$idUF' and NR_TURNO = '$turno' GROUP BY NM_URNA_CANDIDATO
    ORDER BY NM_URNA_CANDIDATO");
} else {
    $query = ("SELECT *
    FROM candidatos
    WHERE CD_CARGO = '$idCargo' and NR_TURNO = '$turno' GROUP BY NM_URNA_CANDIDATO
    ORDER BY NM_URNA_CANDIDATO");
}
echo $query;
$registros = mysqli_query($conectado, $query);

echo '<option value="">Selecione um candidato</option>';

foreach ($registros as $option) {

?>
    <option value="<?php echo $option['ID_CANDIDATO'] ?>"><?php echo $option['NM_URNA_CANDIDATO'] ?></option>
<?php
}
