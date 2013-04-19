<?php

require_once("funcaoBanco.php");

if (isset($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];
} else {
	$acao = "";
}


switch ($acao) {
	case 'excluir':
		$idUsuario = $_REQUEST['idUsuario'];
		$sql = "delete from usuario where idUsuario = $idUsuario";
		if (executaSQL($sql)){
			echo "Registro exclu&iacute;do com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel excluir registro!";
		}
		break;
	
	case 'editar':
		$idUsuario = $_REQUEST['idUsuario'];
		$sql = "select * from usuario where idUsuario = $idUsuario";
		$res = executaSQL($sql);
		$registro = $res->fetch();
		$idUsuario = $registro['idUsuario'];
		$nome = $registro['nome'];
		$usuario = $registro['usuario'];
		$email = $registro['email'];
		$dataCadastro = $registro['dataCadastro'];
		//$senha = md5($registro['senha']);
		$acao = "atualizar";
		include_once("formUsuario.php");
		break;
		
	case 'atualizar':
		$idUsuario = $_REQUEST['idUsuario'];
		$nome = $_REQUEST['nome'];
		$usuario = $_REQUEST['usuario'];
		$email = $_REQUEST['email'];
		$dataCadastro = $_REQUEST['dataCadastro'];
		$senha = $_REQUEST['senha'];
		$senha2 = $_REQUEST['senha2'];
		if ($senha != $senha2){
			echo "Senhas n&atilde;o conferem!";
			break;
		}
		$senha = md5($_REQUEST['senha']);
		$sql = "update usuario set nome='$nome', email='$email', dataCadastro='$dataCadastro',
				senha='$senha', usuario='$usuario' 
		        where idUsuario=$idUsuario";
		/*$sql = "update usuario set nome=?, email=?, dataCadastro=?, senha=?, usuario=? 
		        where idUsuario=?";
		$params = array("$nome", "$email", "$dataCadastro", "$senha", "$usuario", "$idUsuario");*/
		if (executaSQL($sql)){
			echo "Registro alterado com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel alterar registro!";
		}
		break;
	
	case 'cadastrar':
		$idUsuario = "";
		$nome = "";
		$usuario = "";
		$email = "";
		$dataCadastro = "";
		$senha = "";
		$acao = "gravar";
		include_once("formUsuario.php");
		break;
		
	case 'gravar':
		$nome = $_REQUEST['nome'];
		$usuario = $_REQUEST['usuario'];
		$email = $_REQUEST['email'];
		$dataCadastro = $_REQUEST['dataCadastro'];
		$senha = $_REQUEST['senha'];
		$senha2 = $_REQUEST['senha2'];
		if ($senha != $senha2){
			echo "Senhas n&atilde;o conferem!";
			break;
		}
		$senha = md5($_REQUEST['senha']);
		/*$sql = "insert into usuario (nome, email, usuario, dataCadastro, senha) values
				('$nome','$email','$usuario','$dataCadastro','$senha')";*/
		$sql = "insert into usuario (nome, email, usuario, dataCadastro, senha) values
				(?,?,?,?,?)";
		$params = array($nome, $email, $usuario, $dataCadastro, $senha);
		if (executaPS($sql,$params)){
			echo "Registro inserido com sucesso!";
		} else {
			echo $sql."<br>";
			echo "N&atilde; foi poss&iacute;vel inserir registro!";
		}
		break;
	default:
		
		break;
}

include_once("listaUsuario.php");

?>