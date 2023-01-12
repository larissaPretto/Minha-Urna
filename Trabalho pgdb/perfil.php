 <!DOCTYPE html>

 <?php
  //include('verificar.php');   
  include('bd/conexao.php');
  $email = $_SESSION['email'];
  $sql = "SELECT * from usuario where email = '$email'";
  $produtos = mysqli_query($conectado, $sql);
  while ($produto = mysqli_fetch_assoc($produtos)) {
    $idEst = $produto['idEst'];
    $idTurma = $produto['idTurma'];
  }

  ?>
 <li class="nav-item active">
   <a class="navbar-brand mb-0 h2"><?php echo $Turma; ?><span class="sr-only">(página atual)</span></a>
 </li>
 </ul>
 <form name="frmBusca" method="POST" action="pesquisa.php" class="form-inline my-2 my-lg-0">
   <input type="text" name="pesquisar" class="form-control mr-sm-2" placeholder="Pesquisar exercícios">
   <input type="submit" value="Pesquisar" class="btn btn-outline-success my-2 my-sm-0">
 </form>
 </div>
 <div class="collapse navbar-collapse" id="navbar-list-4">
   <ul class="nav justify-content-end">
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
          $sql = "SELECT * from estudantes where matricula = '$matricula'";
          $produtos = mysqli_query($conectado, $sql);
          while ($produto = mysqli_fetch_assoc($produtos)) {
            $nome = $produto['nome'];
            $email = $produto['email'];
            $matricula = $produto['matricula'];
            $idTurma = $produto['idTurma'];
            $senha = $produto['senha'];
            $foto = $produto['foto'];


            if ($foto == $nome) {
              echo ' <img src="img/semIm.png"  width="40" height="40" class="rounded-circle">';
            } else {

              echo ' <img src="img/'  . $produto['foto'] . '"  width="40" height="40" class="rounded-circle">';
            }
          }
          ?>
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="#">Perfil</a>
         <a class="dropdown-item" href="sair.php">Sair</a>
       </div>
     </li>
   </ul>
 </div>
 </nav>

 <div style="margin-left:80px">
   <div class="row">
     <div class="col-8">
       <h2 style="margin-top:100px">Dados Pessoais</h2>

       <?php
        include 'bd/conexao.php';
        $sql = "SELECT * from turma where idTurma = '$idTurma'";
        $produtos = mysqli_query($conectado, $sql);
        while ($produto = mysqli_fetch_assoc($produtos)) {
          $Turma = $produto['nome'];
        }
        ?>

       <div class="card">
         <div class="card-body">

           <form name="att" method="POST" action="bd/attEst.php" enctype="multipart/form-data">
             <div class="form-row">
               <div class="col">
                 <label>Nome:</label>
                 <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
               </div>
               <div class="col">
                 <label>E-mail:</label>
                 <input name="email" type="email" class="form-control" value="<?php echo $email; ?>">
               </div>
             </div>
             <br>
             <div class="row">
               <div class="col ">
                 <label>Matricula:</label>
                 <input class="form-control" type="number" placeholder="<?php echo $matricula; ?>" readonly>
               </div>
               <div class="col ">
                 <label>Turma:</label>
                 <input class="form-control" type="text" placeholder="<?php echo $Turma; ?>" readonly>
               </div>
             </div>
             <input type="hidden" name="idEst" value="<?php echo $idEst ?>">
             <br>
             <label style="margin-left:100px">Foto do perfil:</label>
             <br>
             <div class="w3-quarter" style="margin-left:100px">
               <?php
                if ($foto == $nome) {
                  echo '  <img src="img/semIm.png" alt="" style="width:80%">';
                } else {

                  echo '  <img src="img/' . $foto . '" alt="" style="width:80%">';
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

     </div>
   </div>
 </div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <div class="footer">
   <p>&copy; FAC</p>
 </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>

 </html>