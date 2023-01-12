<!DOCTYPE html>
<html>

<head lang="pt-br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            padding: 44px 44px;
        }
    </style>

    <title>Cadastro</title>
</head>

<body>

    <center>
        <br>
        <h3>Cadastro</h3>
        <br>
        <div class="card">
            <div class="card-body">
                <form name="frmUsuario" action="incluirCadastro.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    UF: <select name="selectUF" class="col-md-2 mb-2" id="idUF">
                        <?php
                        include("conexao.php");
                        $UF = "<option value='0'>Selecione o UF</option><br>";
                        $sql = "SELECT * FROM municipios GROUP BY UF ORDER BY UF";
                        $rs = mysqli_query($conectado, $sql);
                        while ($registro = mysqli_fetch_array($rs)) {
                            $UF = $UF . "<option value='" . $registro['id'] . "'>" . $registro['UF'] . "<option><br>";
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
    <script src="../js/funcoes.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>