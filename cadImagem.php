<?php

// verifica se existe um usuario logado
include_once("sessao.php");
// inclui configuracoes do sistema
include_once("config.php");
// inclui funcoes para acesso a banco de dados
require_once("funcaoBanco.php");

if (isset($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];
} else {
	$acao = "";
}


switch ($acao) {
	case 'excluir':
		$idImagem = $_REQUEST['idImagem'];
		$sql = "delete from imagem where idImagem = $idImagem";
		if (executaSQL($sql)){
			echo "Registro exclu&iacute;do com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel excluir registro!";
		}
		break;
	
	case 'editar':
		$idImagem = $_REQUEST['idImagem'];
		$sql = "select * from imagem where idImagem = $idImagem";
		
		$res = executaSQL($sql);
		$registro = $res->fetch();
		$idImagem = $registro['idImagem'];
		$nomeArquivo = $registro['nomeArquivo'];
		$urlExterna = $registro['urlExterna'];
		$dataCadastro = $registro['dataCadastro'];
		$idUsuarioCadastro = $registro['idUsuarioCadastro'];
		$acao = "atualizar";
		include_once("formImagem.php");
		break;
		
	case 'atualizar':
		$idImagem = $_REQUEST['idImagem'];
		//$nomeArquivo = $_REQUEST['nomeArquivo'];
		$urlExterna = $_REQUEST['urlExterna'];
		$dataCadastro = $_REQUEST['dataCadastro'];
		$idUsuarioCadastro = $_REQUEST['idUsuarioCadastro']; //nomeArquivo='$nomeArquivo', 
		$sql = "update imagem set urlExterna='$urlExterna',
				dataCadastro='$dataCadastro', idUsuarioCadastro=$idUsuarioCadastro
		        where idImagem=$idImagem";
		if (executaSQL($sql)){
			echo "Registro alterado com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel alterar registro!";
			echo "<br>$sql";
		}
		break;
	
	case 'cadastrar':
		$idImagem = "";
		$nomeArquivo = "";
		$urlExterna = "";
		$dataCadastro = "";
		$idUsuarioCadastro = "";
		$acao = "gravar";
		include_once("formImagem.php");
		break;
		
	case 'gravar':
		if (isset($_FILES['nomeArquivo'])){
			$nomeArquivo = $_FILES['nomeArquivo']['name']; //$_REQUEST['nomeArquivo'];
			$nomeTemp = $_FILES['nomeArquivo']['tmp_name'];
			move_uploaded_file($nomeTemp, DIR_IMAGENS.'\\'.$nomeArquivo);
		} else {
			echo "Arquivo inv&aacute;lido";
			break;
		}
		$urlExterna = $_REQUEST['urlExterna'];
		$dataCadastro = $_REQUEST['dataCadastro'];
		$idUsuarioCadastro = $_REQUEST['idUsuarioCadastro'];
		$sql = "insert into imagem (nomeArquivo, urlExterna, dataCadastro, idUsuarioCadastro) values
				('$nomeArquivo','$urlExterna','$dataCadastro','$idUsuarioCadastro')";
		if (executaSQL($sql)){
			echo "Registro inserido com sucesso!";
		} else {
			echo "N&atilde; foi poss&iacute;vel inserir registro!";
		}
		break;
	default:
		
		break;
}

include_once("listaImagem.php");

?>