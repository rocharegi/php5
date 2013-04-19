<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/flexigrid.css">
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/flexigrid.js"></script>
	</head>
	<body>
<?php
include_once("sessao.php");

require_once("funcaoBanco.php");

if (isset($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];
} else {
	$acao = "";
}


switch ($acao) {
	case 'excluir':
		$idMenu = $_REQUEST['idMenu'];
		$sql = "delete from menu where idMenu = $idMenu";
		if (executaSQL($sql)){
			echo "Registro exclu&iacute;do com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel excluir registro!";
		}
		break;
	
	case 'editar':
		$idMenu = $_REQUEST['idMenu'];
		$sql = "select * from menu where idMenu = $idMenu";
		
		$res = executaSQL($sql);
		$registro = $res->fetch();
		$idMenu = $registro['idMenu'];
		$nome = $registro['nome'];
		$url = $registro['url'];
		$situacao = $registro['situacao'];
		$idMenuPai = $registro['idMenuPai'];
		$acao = "atualizar";
		include_once("formMenu.php");
		break;
		
	case 'atualizar':
		$idMenu = $_REQUEST['idMenu'];
		$nome = $_REQUEST['nome'];
		$idMenuPai = $_REQUEST['idMenuPai'];
		$url = $_REQUEST['url'];
		$situacao = $_REQUEST['situacao'];
		$sql = "update menu set nome='$nome', url='$url', situacao='$situacao',
		        idMenuPai = $idMenuPai
		        where idMenu=$idMenu";
		if (executaSQL($sql)){
			echo "Registro alterado com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel alterar registro!";
		}
		break;
	
	case 'cadastrar':
		$idMenu = "";
		$idMenuPai = 0;
		$nome = "";
		$url = "";
		$situacao = "";
		$acao = "gravar";
		include_once("formMenu.php");
		break;
		
	case 'gravar':
		$nome = $_REQUEST['nome'];
		$url = $_REQUEST['url'];
		$idMenuPai = $_REQUEST['idMenuPai'];
		$situacao = $_REQUEST['situacao'];
		$sql = "insert into menu (nome, url, situacao, idMenuPai) values
				('$nome','$url','$situacao','$idMenuPai')";
		if (executaSQL($sql)){
			echo "Registro inserido com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel inserir registro!";
		}
		break;
	default:
		
		break;
}

include_once("listaMenu.php");

?>
</body>
</html>