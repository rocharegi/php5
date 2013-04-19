<?php

// incluir arquivo de configuracoes
include_once("config.php");

function executaSQL($sql){
	try {
		//$conexao = new PDO("mysql:host=127.0.0.1;dbname=blog");
		$conexao = new PDO( BD_DRIVER.":host=".
							BD_HOST.";dbname=".
							BD_BANCO,
							BD_USUARIO,
							BD_SENHA);
		return $conexao->query($sql);
	} catch (Exception $e){
		echo $e->getMessage();
	}
}
// Executa consulta com Prepared Statement
function executaPS($sql, $params){
	try {
		$conexao = new PDO( BD_DRIVER.":host=".
							BD_HOST.";dbname=".
							BD_BANCO,
							BD_USUARIO,
							BD_SENHA);
							
		$ps = $conexao->prepare($sql);
		return $ps->execute($params);
		//$rs->fetchAll();
							
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
?>