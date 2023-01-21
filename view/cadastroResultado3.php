<?php
include("../model/conexao.php");
$idUF = $_POST['selectUF'];
$Municipio = $_POST['selectMuni'];
$idZona = $_POST['selectZona'];
$idSecao = $_POST['selectSecao'];
$turno = $_POST['turno'];

?>

<div class="card">
    <div class="card-body">
        <form name="frmResul" action="cadastroResultado4.php" method="POST" enctype="multipart/form-data">

            <input name="branco" type="number" class="form-control" placeholder="Votos bracos" required>
            <input name="nulo" type="number" class="form-control" placeholder="Votos nulos" required>

            <input type="hidden" name="selectUF" id="selectUF" value="<?php echo $idUF ?>">
            <input type="hidden" name="selectMuni" id="selectMuni" value="<?php echo $Municipio ?>">
            <input type="hidden" name="selectZona" id="selectZona" value="<?php echo $idZona ?>">
            <input type="hidden" name="selectSecao" id="selectSecao" value="<?php echo $idSecao ?>">
            <input type="hidden" name="turno" id="turno" value="<?php echo $turno ?>">
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary">Próximo</button><br>
</form>