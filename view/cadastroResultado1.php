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
        <div class="card">
            <div class="card-body">
                <form name="frmResul1" action="cadastroResultado2.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    UF: <select name="selectUF" class="col-md-2 mb-2" id="idUF">
                        <?php
                        include("../model/conexao.php");
                        $UF = "<option value='0'>Selecione o UF</option>";
                        $sql = "SELECT * FROM estadoUF GROUP BY uf ORDER BY uf";
                        $rs = mysqli_query($conectado, $sql);
                        while ($registro = mysqli_fetch_array($rs)) {
                            $UF = $UF . "<option value='" . $registro['id'] . "'>" . $registro['uf'] . "<option>";
                        }
                        echo $UF;
                        ?>
                    </select>

                    Município:
                    <select name="selectMuni" id="idMuni" class="col-md-2 mb-2">
                        <option value="">Selecione um municipio</option>
                    </select>

            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button><br>

        </form>
        </fieldset>

    </center>
    <script src="../js/funcSelectMuni.js"></script>
</body>

</html>