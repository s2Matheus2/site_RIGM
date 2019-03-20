<?php include('server.php');



if(isset($_GET['situ'])){
	print_r($_GET['situ']);
if($_GET['situ'] == 1){
	$_SESSION['paci-cpf-temp'] = "";
	$_SESSION['dirpac']="";
header('Location: resultados.php');
}else if ($_GET['situ'] == 3) {
$_SESSION['dirpac'] = $_SESSION['paci-cpf-temp'];
$indice = $_GET['indice'];
header('location: resultados.php?id='.$indice.'');	
}
}

if(isset($_GET['id']) >= 1){
pacienteAtrib();
}


function pacienteAtrib(){
	$id = $_GET['id'];
	$_SESSION['dirpac'] = $_SESSION['paciente'.$_GET['id'].''];
	$_SESSION['id-pac'] = $_GET['id'];
	echo "alo";
	header('location: resultados.php?id='.$id.'');
}




if (isset($_GET['file']) >= 1) {
	$try = $_GET['file'];
$teste = $_SESSION['dir'.$try.''];
	header('Content-disposition: attachment; filename="'.$teste.'"');
header('Content-type: application/pdf');
readfile('media/'.$_SESSION['crm'].'/'.$_SESSION['dirpac'].'/'.$teste.'');
}




?>