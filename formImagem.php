<form action="cadImagem.php" method="post" enctype="multipart/form-data">
	<fieldset><legend>Cadastro de IMAGEM</legend>
	<input type="hidden" name="acao" value="<?php echo $acao; ?>">
	<table border="0">
		<tr>
			<td>ID</td>
			<td><input type="text" name="idImagem" value="<?php echo $idImagem; ?>"></td></tr>
		<tr>
			<td>Imagem</td>
			<td>
<?php  
// recupera informacao do banco para exibir a imagem na tela
if($nomeArquivo!="") {
					    	echo '<img src="'.DIR_IMAGENS.'/'.$nomeArquivo.'"
					    	      width="100" />';
						} else {
							echo '<input type="file" name="nomeArquivo">';
						}

  ?></td></tr>
		<tr>
			<td>URL Externa</td>
			<td><input type="text" name="urlExterna" value="<?php echo $urlExterna; ?>"></td></tr>
		<tr>
			<td>Data cadastro</td>
			<td><input type="text" name="dataCadastro" value="<?php echo $dataCadastro; ?>"></td></tr>
		<tr>
			<td>ID Usu&aacute;rio</td>
			<td><input type="text" name="idUsuarioCadastro" value="<?php echo $idUsuarioCadastro; ?>"></td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<button type="submit">Gravar</button>
				<button type="reset">Cancelar</button>
			</td></tr>
	</table>
	</fieldset>
</form>