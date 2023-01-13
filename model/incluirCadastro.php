
<?php
include('conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

if (isset($_FILES['fileUpload'])) {
	date_default_timezone_set("Brazil/East");

	$ext = strtolower(substr($_FILES['fileUpload']['name'], -4));
	$new_name = $email . $ext;
	$dir = '../img/';

	move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name);
}

$SQL = "INSERT INTO
				usuario
		VALUES 
				(null,
				'$nome',
				'$email', 
				'$senha',
				'$new_name')";
mysqli_query($conectado, $SQL);

header('location: ../view/login.php');

?>