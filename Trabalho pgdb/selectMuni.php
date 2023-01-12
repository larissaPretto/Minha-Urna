<?php
include("bd/conexao.php");

$idUF = $_GET['idUF'];
//$selected = isset($_GET['selected']) ? $_GET['selected'] : null;

$query = ("SELECT *
    FROM municipios
    WHERE UF = '$idUF'  
    ORDER BY municipios");

$registros = mysqli_query($conectado, $query);

echo '<option value="">Selecione um municipio</option>';

foreach ($registros as $option) {
    //$check = '';
    // if ($selected == $option['id']) {
    //   $check = 'selected';
    // }
?>
    <option value="<?php echo $option['id'] ?>"><?php echo $option['municipios'] ?></option>
<?php
}
