<?php
if(isset($_REQUEST['logoff'])){
	session_start();
	session_destroy();
}
include_once("sessao.php");
include_once("cabecalho.php");
include_once("corpo.php");
include_once("rodape.php");

?>