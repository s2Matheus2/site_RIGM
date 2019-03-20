<?php
 session_start();
 
date_default_timezone_set('America/Belem');
$dataAtual = (date('Y/m/d')); 


$dataAgenda = "";
$username = "";
$usernamefull = "";
$crm = "";
$crm1 = "";
$crm2 = "";
$sexo = "";
$password = "";
$passwordcript = "";
$email = "";
$endereco = "";
$data = "";
$tipo = "";
$telefone1paci = "";
$telefone2paci = "";
$telefone_med = "";
$exame = "";
$obs_med = "";
$obs_paci = "";
$impressoes = "";
$respondido = "";
$url = "";
$errors = array();
$returncp = array();
$verific = false;

//conectar ao banco de dados
$db = mysqli_connect('localhost','root','','regserver');
mysqli_query($db,"SET NAMES 'utf8'");



//Logo apos o cadastro do paciente as informações passam por aqui
if (isset($_POST['cadastro-paciente'])) {
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$usernamefull = mysqli_real_escape_string($db,$_POST['usernamefull']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$data = mysqli_real_escape_string($db,$_POST['data']);
	$dataAgenda = mysqli_real_escape_string($db,$dataAtual);
	$sexo = mysqli_real_escape_string($db,$_POST['sexo']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$telefone1paci = mysqli_real_escape_string($db,$_POST['telefone1']);
	$telefone2paci = mysqli_real_escape_string($db,$_POST['telefone2']);
	$exame = mysqli_real_escape_string($db,$_POST['exame']);
	if (isset($_POST['observacoes_med'])) {
		$obs_med = mysqli_real_escape_string($db,$_POST['observacoes_med']);
	}else {
		$obs_med = mysqli_real_escape_string($db,"");
	}
	if (isset($_POST['observacoes_paci'])) {
		$obs_paci = mysqli_real_escape_string($db,$_POST['observacoes_paci']);
	}else {
		$obs_paci = mysqli_real_escape_string($db,"");
	}
	if (isset($_POST['impressoes'])) {
	$impressoes = mysqli_real_escape_string($db,$_POST['impressoes']);
	}else {
	$impressoes = mysqli_real_escape_string($db,"");
	}

	
	$endereco = mysqli_real_escape_string($db,$_POST['end']);

if (empty($password)) {
	array_push($errors, "O cpf não pode ser nulo.");
	$verific = true;
	}else{	
if (is_numeric($password)) {
if (strlen($password) == 11) {
 
}else{
	array_push($errors, "O cpf não pode conter menos que 11 caracteres.");
}
}else{
	array_push($errors, "O cpf não pode conter caracteres especiais, digite apenas os números correspondentes.");  //adiciona condição de erro ao array de erro
}
}

if (($data) > date('Y-m-d') or empty($data)) {
	array_push($errors, "Algum erro ocorreu na data de nascimento do paciente.");  //adiciona condição de erro ao array de erro

	
}

//if (empty($password_1)) {
//	array_push($errors, "A senha é necessária");  //adiciona condição de erro ao array de erro
//}

//if ($password_1 != $password_2) {
//	array_push($errors, "As senhas não combinam");
//}

//se não existe nenhum erro salve no banco de dados

if (count($errors) == 0) {
	
	if (file_exists('media/'.$_SESSION['crm'].'/'.$password.'')){
			array_push($errors, "paciente ja cadastrado.");
	}else{
	mkdir('media/'.$_SESSION['crm'].'/'.$password.'',0777,true);	
	}
}else{

}

if (count($errors) == 0) {
			
			$respondido = false;
			$tipo = 3;
			
			$crm = $_SESSION['crm'];

			$url = ('ficha_paciente.php?user='.$_POST['usernamefull'].'&&cpf='.$_POST['password'].'&&data='.$_POST['data'].'&&crm='.$crm.'&&tel1='.$_POST['telefone1'].'&&tel2='.$_POST['telefone2'].'&&gender='.$_POST['sexo'].'&&exam='.$_POST['exame'].'&&obs_med='.$_POST['observacoes_med'].'&&obs_paci='.$_POST['observacoes_paci'].'&&print='.$_POST['impressoes'].'&&email='.$_POST['email'].'&&end='.$_POST['end'].'');
			
			$passwordcript = md5($password);
			$sql1 = "INSERT INTO agenda (data,username,email,usernamefull,crm_med, cpf, respondido,password,telefone1,telefone2,endereco,datagenda) 
			VALUES  ('$data','$username','$email','$usernamefull','$crm', '$password', '$respondido','$passwordcript','$telefone1paci','$telefone2paci','$endereco','$dataAgenda')";	
			
			$sql2 = "INSERT INTO users (username, usernamefull,tipo,sexo,password) 
			VALUES  ('$username','$usernamefull','$tipo','$sexo','$passwordcript')";
			
			$sql3 = "INSERT INTO ficha (cpf,exame,observacoes_med,observacoes_paci,impressoes,url) 
			VALUES  ('$password','$exame','$obs_med','$obs_paci','$impressoes','$url')";

			mysqli_query($db,$sql1) or die(mysqli_error($db));					
			
			mysqli_query($db,$sql2) or die(mysqli_error($db));
			
			mysqli_query($db,$sql3) or die(mysqli_error($db));
			
		
			
		

	
		
			//usuário conectado
		//$_SESSION['username'] = $username;
		//$_SESSION['success'] = "Online";
		//header('location: user2.php');
			
$verific = false;

array_push($returncp, "Paciente cadastrado com sucesso.");
$_SESSION['div_agenda1'] = "none";
$_SESSION['cpf'] = $_POST['password'];
$submit1 = 'yes';
header('location: ficha_paciente.php?user='.$_POST['usernamefull'].'&&cpf='.$_POST['password'].'&&data='.$_POST['data'].'&&crm='.$crm.'&&tel1='.$_POST['telefone1'].'&&tel2='.$_POST['telefone2'].'&&gender='.$_POST['sexo'].'&&exam='.$_POST['exame'].'&&obs_med='.$_POST['observacoes_med'].'&&obs_paci='.$_POST['observacoes_paci'].'&&print='.$_POST['impressoes'].'&&email='.$_POST['email'].'&&end='.$_POST['end'].'');

}else{

$_SESSION['div_agenda1'] = "show";

$submit1 = 'no';

}



}


		
			
			
			

//se o botao de registro for clicado
if (isset($_POST['registro'])) {
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$usernamefull = mysqli_real_escape_string($db,$_POST['usernamefull']);
	$crm1 = mysqli_real_escape_string($db,$_POST['crm1']);
	$crm2 = mysqli_real_escape_string($db,$_POST['crm2']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
	
if (empty($username)) {
	array_push($errors, "O primeiro nome é necessário.");  //adiciona condição de erro ao array de erro
}

if (empty($usernamefull)) {
	array_push($errors, "O nome completo é necessário.");  //adiciona condição de erro ao array de erro
}



if (empty($password_1)) {
	array_push($errors, "A senha é necessária");  //adiciona condição de erro ao array de erro
}

if ($password_1 != $password_2) {
	array_push($errors, "As senhas não combinam");
}

//se não existe nenhum erro salve no banco de dados

if (count($errors) == 0) {
	$password = md5($password_1);
	$tipo = 2;
	$diretorio = $crm1."-".$crm2;
	mkdir('media/'.$diretorio,0777,true);

	$sql3 = "INSERT INTO users (username, usernamefull, crm, email, password, tipo)
			VALUES ('$username', '$usernamefull', '$crm1-$crm2', '$email', '$password', '$tipo')";
			mysqli_query($db, $sql3) or die(mysqli_error($db));
			$_SESSION['crm'] = $diretorio;
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Online";		
			
			header('location: user2.php');	
			
			
}

}

//login
if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	
if (empty($username)) {
	array_push($errors, "O usuário é necessário");  //adiciona condição de erro ao array de erro
}

if (empty($password)) {
	array_push($errors, "A senha é necessária");  //adiciona condição de erro ao array de erro
}

if (count($errors) == 0) {
	$password = md5($password);
	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($db,$query);

	if (mysqli_num_rows($result) == 1) {
		$consulta1 = "SELECT tipo, crm FROM users WHERE username = '$username' AND password = '$password'";
		$queryCons = mysqli_query($db,$consulta1) or die(mysqli_error($db));
		$rowCons = mysqli_fetch_array($queryCons);

		$consulta5 = "SELECT crm_med,cpf FROM agenda WHERE username = '$username' AND password = '$password'";
		$queryCons5 = mysqli_query($db,$consulta5) or die(mysqli_error($db));
		$rowCons5 = mysqli_fetch_array($queryCons5);
		
		$_SESSION['crm'] = $rowCons['crm'];
		
		
		//print_r($rowCons['tipo']);
		if ($rowCons['tipo'] == 1) {
			//usuário conectado
		$_SESSION['dirpac'] = "";	
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Online";
		header('location: user1.php');
		}elseif ($rowCons['tipo'] == 2) {
			//usuário conectado
		$_SESSION['dirpac'] = "";	
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Online";
		header('location: user2.php');
		}elseif ($rowCons['tipo'] == 3) {
		$_SESSION['crm'] = $rowCons5['crm_med'];
		$_SESSION['dirpac'] = $rowCons5['cpf'];	
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Online";
		
		header('location: user3.php');

	}
	}else{
		array_push($errors, "Login/Senha estão errados");
	}	
 }
}


if (isset($_POST['pesquisa-paci'])) {
	$_SESSION['verificou'] = "sim"; 
	
	$username = mysqli_real_escape_string($db,$_POST['pesquisa']);
	$cpf = mysqli_real_escape_string($db,$_POST['pesquisa']);
$crm = $_SESSION['crm'];
$consulta4 = "SELECT username FROM agenda WHERE (username = '$username' OR cpf = '$cpf') AND crm_med = '$crm'";
		$queryCons4 = mysqli_query($db,$consulta4) or die(mysqli_error($db));
		if (mysqli_num_rows($queryCons4) == 1) {
		$rowCons4 = mysqli_fetch_array($queryCons4);
		$_SESSION['paciente-pesq'] = $rowCons4['username']; 
	}else{
		$_SESSION['paciente-pesq'] = "Não existe paciente com esse nome ou CPF.";
	}

		
	

}


if (isset($_POST['pesquisa-registro'])) {
	$_SESSION['verificou_esp'] = "sim"; 
	
	$username = mysqli_real_escape_string($db,$_POST['pesquisa']);
	$cpf = mysqli_real_escape_string($db,$_POST['pesquisa']);
$crm = $_SESSION['crm'];
$consulta24 = "SELECT username,cpf FROM agenda WHERE (username = '$username' OR cpf = '$cpf')";
		$queryCons24 = mysqli_query($db,$consulta24) or die(mysqli_error($db));
		if (mysqli_num_rows($queryCons24) == 1) {
		$rowCons24 = mysqli_fetch_array($queryCons24);
		$_SESSION['paciente-pesq'] = $rowCons24['username'];
		$_SESSION['registro-cpf'] = $rowCons24['cpf'];
	}else{
		$_SESSION['paciente-pesq'] = "nenhum.";
	}	

}else{
	$_SESSION['verificou_esp'] = ""; 
	$_SESSION['registro-cpf'] = "";
	unset($_SESSION['registro-cpf']);
	unset($_SESSION['registro-cpf']);
}



//logout
if (isset($_GET['logout'])) {
	
	unset($_SESSION['success']);
	unset($_SESSION['username']);
	$_SESSION['success'] = "";
	$_SESSION['username'] = "";
	session_unset($_SESSION);

	session_destroy();
	
	mysqli_close($db);
	header('location: index.php');
}



?>