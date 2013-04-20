<?php

include_once("sessao.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administra&ccedil;&atilde;o do BLOG feito em PHP</title>
		<link rel="stylesheet" type="text/css" href="css/flexigrid.css">
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/flexigrid.js"></script>
		<style>
			#navegacao {
				width: 100%;
				height: 300px;
				overflow: auto;
			}
		</style>
	</head>
	<body>
		<div id="div_cabecalho">
			<p>Bem-vindo <b><?php echo $_SESSION['nome']; ?>, </b>
				o seu n&uacute;mero IP &eacute; 
				<b><?php echo $_SERVER['REMOTE_ADDR'] ?></b>
				<a href="index.php?logoff">Sair</a>
			</p>
		</div>
		<div id="div_corpo">