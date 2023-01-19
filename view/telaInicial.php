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
        <?php
        include("../model/conexao.php");
        $sql = "SELECT * FROM VOTOS";
        $consulta = mysqli_query($conectado, $sql);
        while ($registro = mysqli_fetch_array($consulta)) {
          $sqlDois = "SELECT * FROM candidatos where '$registro[idCandidato]' = id_candidato";
          $registroDois = mysqli_fetch_array(mysqli_query($conectado, $sqlDois));

          $sqlPartidos = "SELECT * FROM partidos where '$registroDois[NR_PARTIDO]' = NR_PARTIDO";
          $registroPartidos = mysqli_fetch_array(mysqli_query($conectado, $sqlPartidos));

          $sqlCargo = "SELECT * FROM cargos where '$registroDois[CD_CARGO]' = CD_CARGO";
          $registroCargo = mysqli_fetch_array(mysqli_query($conectado, $sqlCargo));

          echo "
                            <tr>
                                <td>$registroDois[NM_URNA_CANDIDATO]</td>
                                <td>$registroPartidos[NM_PARTIDO]</td>
                                <td>$registroCargo[NM_CARGO]</td>
                                <td>$registro[votos]</td>
                            </tr>
                        ";
        }
        ?>
        <!-- TESTE ACIMA -->

      </div>
    </div>
  </center>

</body>

</html>