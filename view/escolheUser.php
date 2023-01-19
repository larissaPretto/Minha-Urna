<?php
include('../model/conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

?>

<form name="frmUEscolha" action="../model/incluirCadastro.php" method="POST" enctype="multipart/form-data">
    <input type="radio" id="normal" name="user" value="0">
    <label for="user">Usuário</label><br>
    <input type="radio" id="adm" name="user" value="1">
    <label for="adm">Administrador</label><br>

    <input type="hidden" name="nome" id="idUF" value="<?php echo $nome ?>">
    <input type="hidden" name="email" id="idUF" value="<?php echo $email ?>">
    <input type="hidden" name="senha" id="idUF" value="<?php echo $senha ?>">

    <button type="submit" class="entrar">Finalizar registro</button><br>

</form>