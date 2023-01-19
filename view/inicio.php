<!DOCTYPE html>
<html>

<head lang="pt-br">
  <title>Início | Minha Urna</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="inicio.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<?php
include('../model/conexao.php');
include('../control/verificar.php');

$email = $_SESSION['email'];
$sql = "SELECT * from usuario where email = '$email'";
$produtos = mysqli_query($conectado, $sql);
while ($produto = mysqli_fetch_assoc($produtos)) {
  $nome = $produto['nome'];
  $img = $produto['img'];
  $idUsuario = $produto['idUsuario'];
}
?>

<body>
  <p class="greeting"> Olá, <?php echo $nome; ?>
  <p>

    <a class="dropdown-item" href="perfilUser.php">
      <div class="profilePic" style="margin-left:100px">
        <?php
        if ($img == $email) {
          echo '  <img src="../img/semIm.jpg" alt="" style="position: absolute;
              width: 42px;
              height: 42px;
              left: 332px;
              top: 32px;
              border-radius: 999px;">';
        } else {

          echo '  <img src="../img/' . $img . '" alt="" style="position: absolute;
              width: 42px;
              height: 42px;
              left: 332px;
              top: 32px;
              border-radius: 999px;">';
        }
        ?>
      </div>
    </a><br>

  <div class="Search">
    <form name="frmBusca" method="POST" action="pesquisa.php" class="form-inline my-2 my-lg-0">
      <input type="search" name="busca" placeholder="Pesquise candidatos, cargos, cidades..." />
      <img class="searchIcon" src="illustrations/search.svg" alt="search" />
    </form>
  </div>

  <div class="botoes">
    <button class="candidatos"><img src="illustrations/candidatos.svg" alt="addIcon" /></button>
    <button class="cargos"><img src="illustrations/cargos.svg" alt="addIcon" /></button>
    <button class="locais"><img src="illustrations/locais.svg" alt="addIcon" /></button>
  </div>

  <p class="relevantText">Mais relevantes</p>

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
      echo "<p style='color: black;'>
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






    <a class="add" href="cadastroResultado1.php"><img src="illustrations/add.svg" alt="addIcon" /></a>

  </div>
</body>