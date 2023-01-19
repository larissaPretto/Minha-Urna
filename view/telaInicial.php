<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  include('../model/conexao.php');
  include('../control/verificar.php');
  ?>
  <a class="dropdown-item" href="perfilUser.php">Perfil</a><br>
  <a class="dropdown-item" href="cadastroResultado1.php">Cadastrar resultado</a><br>
  <a class="dropdown-item" href="../control/sair.php">Sair</a>
  <center>
    <div>
      <h2>Olá, Sérgio</h2> <br>
      <form action="">
        <label for=""></label>
        <input type="text">
      </form>
      <br>
      <div>
        <button>Candidatos</button>
        <button>Cargos</button>
        <button>Locais</button>
      </div>
      <br>
      <span>Mais Relevantes</span>
      <!-- teste abaixo -->
      <div class="container">
        <h3>Veículos Cadastrados</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Modelo</th>
              <th scope="col">Valor</th>
              <th scope="col">KM</th>
            </tr>
          </thead>
          <!-- TESTE ABAIXO -->
          <tbody>
            <?php
            include("../model/conexao.php");
            $sql = "SELECT * FROM VOTOS";
            $consulta = mysqli_query($conectado, $sql);
            while ($registro = mysqli_fetch_array($consulta)) {
              echo "
                            <tr>
                                <td>$registro[idBoletim]</td>
                                <td>$registro[idCandidato]</td>
                                <td>$registro[votos]</td>
                            </tr>
                        ";
            }
            ?>
          </tbody>
          <!-- TESTE ACIMA -->
        </table>
      </div>
    </div>
  </center>

</body>

</html>