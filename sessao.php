<?php

include_once("funcaoBanco.php");

session_start();


// se o usuario existir na sessao
if (isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
// usuario nao existe verfica se existe parametro de usuario e senha
} elseif (isset($_REQUEST['usuario'])
		  && isset($_REQUEST['senha'])){
	logar($_REQUEST['usuario'], $_REQUEST['senha']);
// nao encontrado usuario na sessao e nem no parametro
// redirecionar para tela de login
} else {
	header("Location: login.php");
}

function logar($usuario, $senha){
	$sql = "select * from usuario where usuario = '$usuario'";
	$res = executaSQL($sql);
	if ($res){
		$registro = $res->fetch();
		if ($registro['senha'] == md5($senha)){
			$_SESSION['usuario'] = $registro['usuario'];
			$_SESSION['nome'] = $registro['nome'];
			$_SESSION['idUsuario'] = $registro['idUsuario'];
			$_SESSION['email'] = $registro['email'];
		} else {
			header("Location: login.php");
		}
	}
}

?>