<?php

require_once("funcaoBanco.php");

$sql = "select * from usuario";

$res = executaSQL($sql);

echo "<table border='0'>";
foreach ($res as $registro) {
	echo "<tr>";
	echo "<td>".$registro['idUsuario']."</td>";
	echo "<td>".$registro['usuario']."</td>";
	echo "<td>".$registro['nome']."</td>";
	echo "<td>".$registro['email']."</td>";
	echo "<td>".$registro['dataCadastro']."</td>";
	echo "<td>".$registro['senha']."</td>";
	echo "<td><a href='cadUsuario.php?idUsuario={$registro['idUsuario']}&acao=editar'>
		  <img src='img/editar.png'></a></td>";
	echo "<td><a href='cadUsuario.php?idUsuario={$registro['idUsuario']}&acao=excluir'>
	      <img src='img/excluir.png'></a></td>";
	echo "<td><a href='cadUsuario.php?acao=cadastrar'>
		  <img src='img/novo.png'></a></td>";
	echo "</tr>";
}
echo "</table>";

?>