<?php

include_once("funcaoBanco.php");

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'nome';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
$query = isset($_POST['query']) ? $_POST['query'] : false;
$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;

$inicio = ($page - 1) * $rp;

$tipo = gettype($query);

$sql = "select count(*) from menu";
$res = executaSQL($sql);
$registro = $res->fetch();
$total = $registro[0];

if ($query){
	if (($qtype == "idMenu") && ($tipo != "String")){
		$sql = "select * 
		        from   menu
		        where  $qtype = $query
		        order  by $sortname $sortorder
		        limit  $inicio, $rp";
	}
	if ($qtype == "nome"){
		$sql = "select *
		        from   menu
		        where  $qtype like '%$query%'
		        order  by $sortname $sortorder
		        limit  $inicio, $rp";
	}
} else {
	$sql = "select * from menu order by $sortname $sortorder limit  $inicio, $rp";
}

$res = executaSQL($sql);

header("Content-type: application/json");

$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());

$id = 1;

foreach ($res as $registro) {
	$linha = array('idMenu' => $registro['idMenu'],
								'nome' => $registro['nome'],
								'idMenuPai' => $registro['idMenuPai'],
								'url' => $registro['url'],
								'situacao' => $registro['situacao']);
	$cell = array('id' => $id++, 'cell' => $linha);
	$jsonData['rows'][] = $cell;
}

echo json_encode($jsonData);

?>