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
        $idUF = $_GET['idUF'];
        $idBol = $_GET['idBol'];

        ?>
        <div class="card">
            <div class="card-body">
                <form id="frmResul4" name="frmResul4">
                    Cargo: <select name="selectCargo" class="col-md-2 mb-2" id="idCargo" required>
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
                    <select name="selectCand" id="idCand" class="col-md-2 mb-2" required>
                        <option value="">Selecione um candidato</option>
                    </select>

                    <label>Votos</label>
                    <input name="votos" type="number" class="form-control" placeholder="Votos" required>

                    <input type="hidden" name="idUF" id="idUF" value="<?php echo $idUF ?>">
                    <input type="hidden" name="idBol" id="idUF" value="<?php echo $idBol ?>">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar voto</button><br>
        </form>

        <br>
        <a href='inicio.php'><button>Finalizar</button></a>

    </center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../js/sendForm.js"></script>
    <script src="../js/funcSelectCand.js"></script>
</body>

</html>