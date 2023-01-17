<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Cadastro</title>
</head>

<body>
    <center>
        <br>
        <h3>Cadastro</h3>
        <br>
        <?php
        include("../model/conexao.php");
        $idUF = $_POST['selectUF'];
        $Municipio = $_POST['selectMuni'];
        $idZona = $_POST['selectZona'];
        $idSecao = $_POST['selectSecao'];

        $query = ("SELECT * FROM urna
            WHERE idUF = '$idUF' and idMuni = '$Municipio' 
            and zona = '$idZona' and secao = '$idSecao'");

        $rs = mysqli_query($conectado, $query);
        while ($registro = mysqli_fetch_array($rs)) {
            $idUrna = $registro['idUrna'];
        }
        ?>

        <div class="card">
            <div class="card-body">
                <form name="frmResul2" action="../model/incluirBoletim.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                    <label>Foto do boletim</label>
                    <div class="form-group" style="margin-left:390px">
                        <input name="fileUpload" type="file" class="form-control-file">
                    </div>
                    <input type="hidden" name="idUrna" id="idUrna" value="<?php echo $idUrna ?>">
                    <input type="hidden" name="idUF" id="idUrna" value="<?php echo $idUF ?>">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button><br>

    </center>
</body>

</html>