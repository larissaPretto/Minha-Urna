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
        $idUF = $_POST['selectUF'];
        $Municipio = $_POST['selectMuni'];
        ?>
        <div class="card">
            <div class="card-body">
                <form name="frmResul1" action="cadastroResultado3.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    Zona: <select name="selectZona" class="col-md-2 mb-2" id="idZona">
                        <?php
                        include("../model/conexao.php");
                        $zona = "<option value='0'>Selecione a Zona</option>";
                        $sql = "SELECT * FROM urna WHERE idUF ='$idUF' GROUP BY zona ORDER BY zona";
                        $rs = mysqli_query($conectado, $sql);
                        while ($registro = mysqli_fetch_array($rs)) {
                            $zona = $zona . "<option value='" . $registro['zona'] . "'>" . $registro['zona'] . "<option>";
                        }
                        echo $zona;
                        ?>
                    </select>

                    Seção:
                    <select name="selectSecao" id="idSecao" class="col-md-2 mb-2">
                        <option value="">Selecione uma seção</option>
                    </select>

                    <input type="hidden" name="selectUF" id="idUF" value="<?php echo $idUF ?>">
                    <input type="hidden" name="selectMuni" value="<?php echo $Municipio ?>">

            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button><br>

        </form>
        </fieldset>

    </center>
    <script src="../js/funcSelectSecao.js"></script>
</body>

</html>