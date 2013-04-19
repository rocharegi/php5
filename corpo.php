<?php

include_once("sessao.php");

?>
<ul>
	<li><a href="#" onclick="javascript: document.getElementById('navegacao').src='cadMenu.php'">Cadastro de MENUS</a></li>
	<li><a href="#" onclick="javascript: document.getElementById('navegacao').src='cadUsuario.php'">Cadastro de USU&Aacute;RIOS</a></li>
	<li><a href="#" onclick="javascript: document.getElementById('navegacao').src='cadImagem.php'">Cadastro de IMAGENS</a></li>
</ul>
<iframe src="cadUsuario.php" id="navegacao"></iframe>