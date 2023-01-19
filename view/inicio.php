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
  <p class="greeting"> Olá,  <?php echo $nome; ?><p>

  <div class="Search">
    <input type="search" placeholder="Pesquise candidatos, cargos, cidades..."/>
    <img class="searchIcon" src = "illustrations/search.svg" alt="search"/>
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
  <a class="add" href="cadastroResultado1.php"><img src = "illustrations/add.svg" alt="addIcon"/></a>

  </div>
</body>