 <!DOCTYPE html>

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
 <h2 style="margin-top:100px">Dados Pessoais</h2>

 <div class="card">
   <div class="card-body">

     <form name="att" method="POST" action="../model/attUser.php" enctype="multipart/form-data">
       <div class="form-row">
         <div class="col">
           <label>Nome:</label>
           <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
         </div>
         <div class="col">
           <label>E-mail:</label>
           <input name="email" type="email" class="form-control" value="<?php echo $email; ?>">
           <input type="hidden" name="idUsuario" value="<?php echo $idUsuario ?>">
         </div>
       </div>
       <br>
       <label style="margin-left:100px">Foto do perfil:</label>
       <br>
       <div class="w3-quarter" style="margin-left:100px">
         <?php
          if ($img == $email) {
            echo '  <img src="../img/semIm.jpg" alt="" style="width:80%">';
          } else {

            echo '  <img src="../img/' . $img . '" alt="" style="width:80%">';
          }
          ?>
       </div>
       <div class="form-group" style="margin-left:287px">
         <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileUpload">
       </div>
       <br>
   </div>
 </div>
 <br>
 <button type="submit" class="btn btn-primary">Salvar</button>
 </form>

 </body>

 </html>