<?php

include_once("funcaoBanco.php");

$sql = "select * from menu";
$res = executaSQL($sql);

?>
<form action="cadMenu.php" method="post">
	<fieldset><legend>Cadastro de MENU</legend>
	<input type="hidden" name="acao" value="<?php echo $acao; ?>">
	<table border="0">
		<tr>
			<td>ID</td>
			<td><input type="text" name="idMenu" value="<?php echo $idMenu; ?>"></td></tr>
		<tr>
			<td>Nome</td>
			<td><input type="text" name="nome" value="<?php echo $nome; ?>"></td></tr>
		<tr>
			<td>Menu pai</td>
			<td>
				<select name="idMenuPai">
<?php 
	//echo $idMenuPai;
	if ($idMenuPai == 0) {
		echo "<option value='0' selected>Raiz</option>";
	} else {
		echo "<option value='0'>Raiz</option>";
	}
	foreach ($res as $registro) {
		echo "<option value='{$registro['idMenu']}'";
		if ($registro['idMenu'] == $idMenuPai){
			echo " selected>";
		} else {
			echo ">";
		}
		echo $registro['nome'];
		echo "</option>";
	}
?>
				</select>
			</td>
		</tr>
		<tr>
			<td>url</td>
			<td><input type="text" name="url" value="<?php echo $url; ?>"></td></tr>
		<tr>
			<td>Situacao</td>
			<td><input type="text" name="situacao" value="<?php echo $situacao; ?>"></td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<button type="submit">Gravar</button>
				<button type="reset">Cancelar</button>
			</td></tr>
	</table>
	</fieldset>
</form>