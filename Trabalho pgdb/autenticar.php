<?php
include("bd/conexao.php");
$email = mysqli_real_escape_string($conectado, trim($_POST['email']));
$senhaCr = md5($_POST['senha']);
echo $email;
echo $senhaCr;

$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senhaCr'";
$dados = mysqli_query($conectado, $sql);
$row = mysqli_num_rows($dados);

if ($row > 0) {
	session_start();
	$_SESSION['email'] = $email;
	header('location: inicio.php');
} else {
	header('location: login.php');
}
