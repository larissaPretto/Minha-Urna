<?php
// verificar porta do banco para nao dar erro
$conectado = mysqli_connect("localhost:3307", "root", "", "dbeleicoes");

if (!$conectado) {
	echo "Erro ao conectar";
}
