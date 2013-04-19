<?php

?>
<form action="index.php" method="post">
	<fieldset><legend>Entre com seu LOGIN</legend>
		Usu&aacute;rio:
		<input type="text" name="usuario" /><br>
		Senha:
		<input type="password" name="senha" /><br>
		<button type="submit">Entrar...</button>
	</fieldset>
</form>
<?php
echo "seu IP &eacute: {$_SERVER['REMOTE_ADDR']}";
?>