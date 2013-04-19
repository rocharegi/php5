<?php

require_once("funcaoBanco.php");

$sql = "select * from imagem";

$res = executaSQL($sql);

echo "<table border='0'>";
foreach ($res as $registro) {
	echo "<tr>";
	echo "<td>".$registro['idImagem']."</td>";
	echo "<td>".$registro['nomeArquivo']."</td>";
	echo "<td>".$registro['urlExterna']."</td>";
	echo "<td>".$registro['dataCadastro']."</td>";
	echo "<td>".$registro['idUsuarioCadastro']."</td>";
	echo "<td><a href='cadImagem.php?idImagem={$registro['idImagem']}&acao=editar'>
		  <img src='img/editar.png'></a></td>";
	echo "<td><a href='cadImagem.php?idImagem={$registro['idImagem']}&acao=excluir'>
	      <img src='img/excluir.png'></a></td>";
	echo "<td><a href='cadImagem.php?acao=cadastrar'>
		  <img src='img/novo.png'></a></td>";
	echo "</tr>";
}
echo "</table>";

?>