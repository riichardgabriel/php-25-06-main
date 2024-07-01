<?php
include 'classe/Usuario.php';

var_dump($_POST);

$user = $_POST['usuario'];
$password = $_POST['senha'];
$confirma = $_POST['confirma'];

$usuario = new Usuario();

$resultado = $usuario->cadastroUsuario($user, $password, $confirma);
echo "<br><br>";
echo $resultado;