<table id="flex1" style="display:none"></table>
<?php

require_once("funcaoBanco.php");

$sql = "select * from menu";

$res = executaSQL($sql);

echo "<table border='0'>";
foreach ($res as $registro) {
	echo "<tr>";
	echo "<td>".$registro['idMenu']."</td>";
	echo "<td>".$registro['nome']."</td>";
	echo "<td>".$registro['idMenuPai']."</td>";
	echo "<td>".$registro['url']."</td>";
	echo "<td>".$registro['situacao']."</td>";
	echo "<td><a href='cadMenu.php?idMenu={$registro['idMenu']}&acao=editar'>
		  <img src='img/editar.png'></a></td>";
	echo "<td><a href='cadMenu.php?idMenu={$registro['idMenu']}&acao=excluir'>
	      <img src='img/excluir.png'></a></td>";
	echo "<td><a href='cadMenu.php?acao=cadastrar'>
		  <img src='img/novo.png'></a></td>";
	echo "</tr>";
}
echo "</table>";

?>
<script type="text/javascript">
$("#flex1").flexigrid({
	url: 'post-json.php',
	dataType: 'json',
	colModel : [
		{display: 'ISO', name : 'iso', width : 40, sortable : true, align: 'center'},
		{display: 'Name', name : 'name', width : 180, sortable : true, align: 'left'},
		{display: 'Printable Name', name : 'printable_name', width : 120, sortable : true, align: 'left'},
		{display: 'ISO3', name : 'iso3', width : 130, sortable : true, align: 'left', hide: true},
		{display: 'Number Code', name : 'numcode', width : 80, sortable : true, align: 'right'}
		],
	searchitems : [
		{display: 'ISO', name : 'iso'},
		{display: 'Name', name : 'name', isdefault: true}
		],
	sortname: "iso",
	sortorder: "asc",
	usepager: true,
	title: 'Countries',
	useRp: true,
	rp: 15,
	showTableToggleBtn: true,
	width: 700,
	onSubmit: addFormData,
	height: 200
});

//This function adds paramaters to the post of flexigrid. You can add a verification as well by return to false if you don't want flexigrid to submit			
function addFormData(){
	//passing a form object to serializeArray will get the valid data from all the objects, but, if the you pass a non-form object, you have to specify the input elements that the data will come from
	var dt = $('#sform').serializeArray();
	$("#flex1").flexOptions({params: dt});
	return true;
}
	
$('#sform').submit(function (){
	$('#flex1').flexOptions({newp: 1}).flexReload();
	return false;
});
</script>