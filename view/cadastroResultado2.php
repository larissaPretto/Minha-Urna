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
                <form name="frmResul2" action="cadastroResultado2.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    Cargo: <select name="selectCargo" class="col-md-2 mb-2" id="idCargo">
                        <?php
                        include("../model/conexao.php");
                        $cargo = "<option value='0'>Selecione o cargo</option>";
                        $sql = "SELECT * FROM cargos ORDER BY NM_CARGO";
                        $rs = mysqli_query($conectado, $sql);
                        while ($registro = mysqli_fetch_array($rs)) {
                            $cargo = $cargo . "<option value='" . $registro['CD_CARGO'] . "'>" . $registro['NM_CARGO'] . "<option>";
                        }
                        echo $cargo;
                        ?>
                    </select>

                    Candidato:
                    <select name="selectCand" id="idCand" class="col-md-2 mb-2">
                        <option value="">Selecione um candidato</option>
                    </select>

                    <label>Votos</label>
                    <input name="votos" type="number" class="form-control" placeholder="Votos">

                    <input type="hidden" name="selectUF" id="idUF" value="<?php echo $idUF ?>">
                    <input type="hidden" name="selectMuni" value="<?php echo $Municipio ?>">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button><br>

        </form>
        </fieldset>

    </center>
    <script src="../js/funcSelectCand.js"></script>
</body>

</html>