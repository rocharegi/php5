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
		  <img src='editar.png'></a></td>";
	echo "<td><a href='cadMenu.php?idMenu={$registro['idMenu']}&acao=excluir'>
	      <img src='excluir.png'></a></td>";
	echo "<td><a href='cadMenu.php?acao=cadastrar'>
		  <img src='novo.png'></a></td>";
	echo "</tr>";
}
echo "</table>";

?>
<script type="text/javascript">
$("#flex1").flexigrid({
	url: 'listaMenuBD.php',
	dataType: 'json',
	colModel : [
		{display: 'ID', name : 'idMenu', width : 40, sortable : true, align: 'left'},
		{display: 'Menu', name : 'nome', width : 180, sortable : true, align: 'left'},
		{display: 'ID Menu Pai', name : 'idMenuPai', width : 40, sortable : true, align: 'left'},
		{display: 'URL', name : 'url', width : 130, sortable : true, align: 'left'},
		{display: 'Situa&ccedil;&atilde;o', name : 'situacao', width : 80, sortable : true, align: 'left'}
		],
	searchitems : [
		{display: 'Menu', name : 'nome'},
		{display: 'ID', name : 'idMenu', isdefault: true}
		],
	sortname: "idMenu",
	sortorder: "asc",
	usepager: true,
	title: 'Cadastro de Menus',
	useRp: true,
	rp: 10,
	rpOptions: [10, 20, 30, 40, 50],
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