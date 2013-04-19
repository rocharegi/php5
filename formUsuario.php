<form action="cadUsuario.php" method="post">
	<fieldset><legend>Cadastro de USU&Aacute;RIO</legend>
	<input type="hidden" name="acao" value="<?php echo $acao; ?>">
	<table border="0">
		<tr>
			<td>ID</td>
			<td><input type="text" name="idUsuario" value="<?php echo $idUsuario; ?>"></td></tr>
		<tr>
			<td>Usu&aacute;rio</td>
			<td><input type="text" name="usuario" value="<?php echo $usuario; ?>"></td></tr>
		<tr>
			<td>Nome</td>
			<td><input type="text" name="nome" value="<?php echo $nome; ?>"></td></tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo $email; ?>"></td></tr>
		<tr>
			<td>Data</td>
			<td><input type="text" name="dataCadastro" value="<?php echo $dataCadastro; ?>"></td></tr>
		<tr>
			<td>Senha</td>
			<td><input type="password" name="senha" value=""></td></tr>
		<tr>
			<td>Confirma</td>
			<td><input type="password" name="senha2" value=""></td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<button type="submit">Gravar</button>
				<button type="reset">Cancelar</button>
			</td></tr>
	</table>
	</fieldset>
</form>