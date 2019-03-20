<?php include('server.php'); 

if ($_SESSION['success'] != "Online"	) {
	header('location: index.php');
}

if (isset($_GET['idp'])) {
	$subidp = $_GET['idp'];
}


$consulta12 = "SELECT id FROM agenda";
  $queryCons12 = mysqli_query($db,$consulta12) or die(mysqli_error($db));
  $u=0;
  while ($fetch = mysqli_fetch_row($queryCons12)) {
  $u++;
  $truide[$u] = $fetch[0] ;

}


//Pesquisa todos os pacientes do sistema
$consulta7 = "SELECT username FROM agenda";
$i = 0;
$queryCons7 = mysqli_query($db,$consulta7) or die(mysqli_error($db));
while ($fetch = mysqli_fetch_row($queryCons7)) {

$i++;
$paciNome[$i] = $fetch[0] ;

}

$numTotal = $i;

//Pesquisa todos os CRM relacionado ao paciente do sistema
$consulta8 = "SELECT crm_med FROM agenda";
$f = 0;
$queryCons8 = mysqli_query($db,$consulta8) or die(mysqli_error($db));
while ($fetch = mysqli_fetch_row($queryCons8)) {

$f++;
$crm_med[$f] = $fetch[0] ;

} 


  $consulta10 = "SELECT cpf FROM agenda";
  $queryCons10 = mysqli_query($db,$consulta10) or die(mysqli_error($db));
  $j=0;
  while ($fetch = mysqli_fetch_row($queryCons10)) {
  $j++;
  $cpf_paci[$j] = $fetch[0] ;

}


//pesquisas de filtro
if (isset($_POST['pesquisa-filtro-box'])) {
$dataAno = (date('Y'));
$verificouPesquisaFB = "Yeah babe";

$consulta15 = "SELECT data FROM agenda";
$d = 0;
$queryCons15 = mysqli_query($db,$consulta15) or die(mysqli_error($db));
while ($fetch = mysqli_fetch_row($queryCons15)) {

$d++;
$dataConsulta[$d] = $fetch[0] ;

}

//AJEITAAAAAAR ESTA BOSTA


$testy = "";
for($r = 1; $r < ($numTotal+1); $r++){
$testy =  ''.$testy.''.$dataConsulta[$r].' => '.$cpf_paci[$r].',';

}
$testy = substr($testy, 0,-1);

$ArrayDataCPF = array($testy
);


print_r($testy);




if (isset($_POST['filtro-box'])) {
if ($verificouPesquisaFB == "Yeah babe") {
  

switch ($_POST['filtro-box']) {
  
  case '1':
print_r($_POST['filtro-box']);
  break;
  
  case '2':
print_r($_POST['filtro-box']);
  break;
  
  case '3':
print_r($_POST['filtro-box']);
  break;

  case '4':
    //pesquisa de filtro de mes
$p=1;
$dataMes = (date('m'));
while ($p < mysqli_num_rows($queryCons15)) {
$datanalizada = $dataConsulta[$p];

if ((date("m",strtotime($datanalizada))) == $dataMes && (date("Y",strtotime($datanalizada))) == $dataAno) {
  $dataMesmoMes[$p] = $datanalizada;

}else{

  $displayFiltroPeriodo = "none";
  $displayFiltroPeriodoErro = "show";
  $msgmFiltroPeriodoErro = "Não foi possível encontrar registros com essa especificação.";
}

$p++;  
}


    break;
  
  case '5':
  print_r($_POST['filtro-box']);
  break;

  default:
    //header('location:agenda.php');
    print_r($_POST['filtro-box']);
    break;
}
 } 
}else{
  $displayFiltroPeriodoErro = "show";
  $msgmFiltroPeriodoErro = "Você deve escolher um filtro antes de pesquisar.";
}
$verificouPesquisaFB = "Nou";
}else{
  $displayFiltroPeriodo = "none";
  $displayFiltroPeriodoErro = "none";
}


//Pesquisa todos os pacientes respondidos do sistema
$consulta17 = "SELECT username FROM agenda WHERE respondido = true";
$t = 0;
$queryCons17 = mysqli_query($db,$consulta17) or die(mysqli_error($db));
while ($fetch = mysqli_fetch_row($queryCons17)) {

$t++;
$paciNome[$t] = $fetch[0] ;

}

//Pesquisa todos os pacientes nao respondidos do sistema
$consulta27 = "SELECT username FROM agenda WHERE respondido = false";
$k = 0;
$queryCons27 = mysqli_query($db,$consulta27) or die(mysqli_error($db));
while ($fetch = mysqli_fetch_row($queryCons27)) {

$k++;
$paciNome[$k] = $fetch[0] ;

}




$consulta11 = "SELECT respondido FROM agenda";
	$queryCons11 = mysqli_query($db,$consulta11) or die(mysqli_error($db));
	$l=0;
	while ($fetch = mysqli_fetch_row($queryCons11)) {
	$l++;
	$resposta[$l] = $fetch[0] ;

}

$consulta13 = "SELECT respondido FROM agenda WHERE respondido = true";
  $queryCons13 = mysqli_query($db,$consulta13) or die(mysqli_error($db));
  $l=0;
  while ($fetch = mysqli_fetch_row($queryCons13)) {
  $l++;
  $resposta2[$l] = $fetch[0] ;

}


$consulta14 = "SELECT respondido FROM agenda WHERE respondido = false";
  $queryCons14 = mysqli_query($db,$consulta14) or die(mysqli_error($db));
  $l=0;
  while ($fetch = mysqli_fetch_row($queryCons14)) {
  $l++;
  $resposta3[$l] = $fetch[0] ;

}


if (isset($_GET['id'])) {
	$cpf_id = $_GET['id'];
}
if (isset($_GET['result'])) {
	$result_up = $_GET['result'];		
	}		

//resultado da pesquisa por cpf ou nome
if ($_SESSION['verificou_esp'] == "sim") {
if ($_SESSION['paciente-pesq'] == "nenhum.") {
 $display_pesquisa_erro = "show"; 
 $display_pesquisa_esp = "none";
}else{
if (isset($_SESSION['registro-cpf'])) {
    $display_pesquisa_erro = "none";
    $display_pesquisa_esp = "show";
    $cpf_registro = $_SESSION['registro-cpf'];
  $consulta25 = "SELECT * FROM agenda WHERE cpf = '$cpf_registro'";
  $queryCons25 = mysqli_query($db,$consulta25) or die(mysqli_error($db));
  $rowCons25 = mysqli_fetch_array($queryCons25);
  }
 } 
  }else{
    $display_pesquisa_erro = "none";
    $display_pesquisa_esp = "none";
  }  

?>
<!doctype html>
<html lang="pt-br">
<head>

<title>Imuno Genética Diagnóstica</title>
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/lghm.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/w3.css">
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/exit_buttom.js"></script>


		<link href="./css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		
		<script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
		<script src="./js/plugins/sortable.min.js" type="text/javascript"></script>
		<script src="./js/plugins/purify.min.js" type="text/javascript"></script>
		<script src="./js/fileinput.min.js"></script>
		
		<script src="./themes/fa/theme.js"></script>
		<script src="./js/locales/<lang>.js"></script>

		<script src="js/jspdf.js"></script>
				<script type="text/javascript">
			$(document).ready( function() {
			
				// initialize with defaults
				$("#arquivos").fileinput();

				// with plugin options
				$("#arquivos").fileinput({'showUpload':false, 'previewFileType':'any'});
				
			});
		</script>
   

<style>
  /* Icon when the collapsible content is shown */
  #collapse-fullist:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";

    color: darkblue;
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  #collapse-fullist.collapsed:after {
    content: "\e080";
   
  }

   #collapse-fullist2:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";

    color: darkblue;
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  #collapse-fullist2.collapsed:after {
    content: "\e080";
   
  }
 
  #collapse-fullist3:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";

    color: darkblue;
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  #collapse-fullist3.collapsed:after {
    content: "\e080";
   
  }
</style>

<script>
var subidp = '<?php echo $subidp; ?>'; 

if (subidp != "" && subidp != null) {
$(document).ready(function(){
   
        $("#my-modal").modal();
        

});
}
</script>

<script>

$(document).on("click", "#my_link",function (event) {
 
  var myVal = $(this).data('val');
  var myoloco = $(this).data('oloco');
 

});
</script>

<script>
	var resultado = '<?php echo $_GET['result'] ?>';
	
if (resultado == 'success') {

$(document).ready(function(){
   
        $("#info_up").modal();
        

});
}
</script>



<link rel="icon" id="favicon" href="img/iconLGHM.png" type="image/x-icon">
</head>
<body class="oloco">

<nav class="navbar navbar navbar-reprograma">
<?php if (isset($_SESSION["success"]) == "Online"): ?>
<a href="index.php?logout='1'" class="navbar-brand"><img id ="navbar-brand-lghm" src="img/LGHM.png" width="156"	alt=""><font color="white"></a>
<?php endif ?>	
<?php if(isset($_SESSION["success"]) != "Online"): ?> 
<a href="index.php" class="navbar-brand"><img id ="navbar-brand-lghm" src="img/LGHM.png" width="156"	alt=""><font color="white"></a>
<?php endif ?>

<header class="container">

<div class="navbar-header">


<button class="navbar-toggle glyphicon glyphicon-menu-hamburger"
data-toggle="collapse" data-target="#navbar-RIGM">
</button>
</div>

<ul id="navbar-RIGM" class="nav navbar-nav navbar-right collapse navbar-collapse">

<li><a style="color:darkblue;  padding-top: 20px"  href="agenda.php"	id="cole">Analizar agenda</a></li>
<li><a style="color:darkblue;  padding-top: 20px; background-color: #c1f2b5;"  href="post_result.php"	id="cole">Postar resultados</a></li>	

<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"	style="color: darkblue"  id="cole" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?><img src="img/anon_pic.jpg" style="width: 40px; padding-right: 0px; padding-left: 6px;	padding-bottom: -4px;" 	alt=""></a>
            <div class="dropdown-menu"	id="dropajuste" aria-labelledby="dropdown01">
              <a style="color:darkblue; display: block; text-align: center; text-decoration: none;"  href="#"	id="out">Conta<span class="glyphicon glyphicon-cog" style="padding-left: 4px;"></span></a>
              <a style="color:darkblue; display: block; text-align: center; text-decoration: none;"  href="index.php?logout='1'"	id="out">Sair</a>
            </div>
</li>		

</ul>


</header>


</nav>



<div class="container">
 <div class="row">
  <div class="col-md-6">
  <div class="main_info"> 

    <div id="boxforminfo">Pesquisa Específica</div>
      <h3></h3>
      
      <!-- Input de pesquisa -->
      <form action="post_result.php" method="post" class="search" style="margin-bottom: 0px; display: <?php echo $OptionPac; ?>"> 
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <div class="input-group" >
              <input type="text" class="form-control" name="pesquisa" placeholder="Digite o nome ou CPF do paciente que deseja encontrar." id="txtSearch" style="height: 50px; font-size: 20px"/>
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="pesquisa-registro"  style="height: 50px;">
                <span class="glyphicon glyphicon-search" style="color: darkblue"></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="alert alert-warning" style="font-size: 18px; text-align: center;display:<?php echo$display_pesquisa_erro?>" role="alert">
        <!-- Accessible Rich Internet Applications (ARIA) -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>

                <strong>Não foi possível encontrar algum registro com esse nome ou CPF.</strong> 
      </div>
      <div class="table-responsive" style="display: <?php echo $display_pesquisa_esp ?>">
          
          <table class="table table-striped" style="color: darkblue;font-size: 20px;margin-bottom: 20px">
            <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nome do Paciente</th>
          <th scope="col">CRM do médico solicitante</th>
          <th scope="col" style="width: 30%">Situação</th>
          <th scope="col" style="width: 2%"></th>
        </tr>
      </thead>
      <tbody>
         <!--  Lista de todo os pacientes cadastrados no sistema-->
       
        <tr>   
          <th scope="row">1</th>
          <td><?php echo ($rowCons25['username']) ?></td>
          <td><?php echo ($rowCons25['crm_med']) ?></td>
          <td><?php 
              if ($rowCons25['respondido']) {
                echo "Respondido.";
              }else{
          echo "Aguardando resposta.";
              }

           ?>
          </td>
          <td ><a href="post_result.php?idp=<?php echo($rowCons25['username'])?>&&ir=<?php echo($rowCons25['crm_med'])?>&&id=1&&truide=<?php echo($rowCons25['id'])?>" id="my_link" class="glyphicon glyphicon-search" data-val="user1" data-oloco="oloco"  style="text-decoration: none"></a></td>
        </tr>
       
      </tbody>
      </table>      
        </div>
      <!-- Pesquisa de filtro -->
      <br></br>
      <div class="panel-heading" style="padding-top: 2px;padding-bottom: 0px;margin-bottom: -10px;margin-top:5px"><p style="font-size: 26px ;font-style: bold;text-align: center;font-weight: bold; color: #527a99">Filtro de registros </p></div>
      <h3 class="page-header" style="margin-top:0px;margin-right: 20px;margin-left: 20px;"></h3>
      

      <form method="post" action="post_result.php">
        <div style="display: inline; margin-left: 10px;margin-right: 20px; color: #527a99;">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="5" name="filtro-box">
          <label class="form-check-label" for="inlineCheckbox1" style="font-weight: normal;">Última semana</label>
        </div>
        
        <div style="display: inline; margin-left: 10px;margin-right: 20px; color: #527a99;">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4" name="filtro-box">
          <label class="form-check-label" for="inlineCheckbox2" style="font-weight: normal;">Último mês</label>
        </div>
        
        <div style="display: inline; margin-left: 10px;margin-right: 20px; color: #527a99;">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="filtro-box">
          <label class="form-check-label" for="inlineCheckbox3" style="font-weight: normal;">Ultimos 3 meses</label>
        </div>
        
        <div style="display: inline; margin-left: 10px;margin-right: 20px; color: #527a99;">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="2" name="filtro-box">
          <label class="form-check-label" for="inlineCheckbox4" style="font-weight: normal;">Ultimos 6 meses</label>
        </div>
        
        <div style="display: inline; margin-left: 10px;margin-right: 20px; color: #527a99;">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="1" name="filtro-box">
          <label class="form-check-label" for="inlineCheckbox5" style="font-weight: normal;">Último ano</label>
        </div>
        
        <br></br>
        <button type="submit" name="pesquisa-filtro-box" class="btn btn-primary" style=" margin-left: 20px;  margin-right: 20px; float: right;">Pesquisar</button>
      </form>
      
      <br></br>
      <!-- Mensagem de erro -->
      <div class="alert alert-warning" style="font-size: 18px; text-align: center;display:<?php echo$displayFiltroPeriodoErro;?>" role="alert">
        <!-- Accessible Rich Internet Applications (ARIA) -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>

                <strong><?php echo$msgmFiltroPeriodoErro;?></strong> 
      </div>
      <!-- Resultado do filtro checkbox -->
      <div class="table-responsive" style="display:show">
          
          <table class="table table-striped" style="color: darkblue;font-size: 20px;margin-bottom: 20px">
            <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nome do Paciente</th>
          <th scope="col">CRM do médico solicitante</th>
          <th scope="col" style="width: 30%">Situação</th>
          <th scope="col" style="width: 2%"></th>
        </tr>
      </thead>
      <tbody>
         <!--  Lista do filtro -->
        <?php  
      for ($m=1; $m <= count($usernameConsulta); $m++) { 
        
        ?>
       <tr>   
          <th scope="row">1</th>
          <td><?php echo ($usernameConsulta[$m]) ?></td>
          <td><?php echo ($crmMedConsulta[$m]) ?></td>
          <td><?php 
              if ($rowCons25['respondido']) {
                echo "Respondido.";
              }else{
          echo "Aguardando resposta.";
              }

           ?>
          </td>
          <td ><a href="post_result.php?idp=<?php echo($rowCons25['username'])?>&&ir=<?php echo($rowCons25['crm_med'])?>&&id=1&&truide=<?php echo($rowCons25['id'])?>" id="my_link" class="glyphicon glyphicon-search" data-val="user1" data-oloco="oloco"  style="text-decoration: none"></a></td>
        </tr>
       <?php } ?>
      </tbody>
      </table>      
              
      </div>

     <h3 class="page-header" style="margin-top:0px;margin-right: 20px;margin-left: 20px;"></h3>

      
      <h3></h3><h3></h3>
  </div>   
  </div>
  

  <div class="col-md-6">
    <div class="main_info"> 
       <div id="boxforminfo">Pesquisa Geral</div>
       <h3></h3>
      
        <div>
            <button class="btn btn-default  btn-block w3-text-white collapsed" data-toggle="collapse" data-target="#table-fullist" data-parent="#accordion"  style="white-space: normal; font-size: 25px; font-style: bold; text-align: left;" id="collapse-fullist"><div style="width: 30px; height: 30px; background-color: #628eaf;; border-radius: 50%; float: left; margin-right: 10px;font-size: 18px; padding-top: 2px; text-align: center; margin-top: 2px"><?php 
             if (isset($queryCons7)) {
              if (mysqli_num_rows($queryCons7) < 100) {
                echo(mysqli_num_rows($queryCons7));
              }else{
                echo "+99";
              }
              }else{
                echo "0";
              }
             ?></div><b style="color: darkblue;" >Lista de todos os pacientes</b></button>
        </div>
      <div id="table-fullist" class="collapse" style=""> 
        <div class="table-responsive">
          
          <table class="table table-striped" style="color: darkblue;font-size: 20px;margin-bottom: 20px">
            <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nome do Paciente</th>
          <th scope="col">CRM do médico solicitante</th>
          <th scope="col" style="width: 30%">Situação</th>
          <th scope="col" style="width: 2%"></th>
        </tr>
      </thead>
      <tbody>
         <!--  Lista de todo os pacientes cadastrados no sistema-->
        <?php  
      for ($m=1; $m <= mysqli_num_rows($queryCons7); $m++) { 
        
        ?>
        <tr>   
          <th scope="row"><?php echo $m; ?></th>
          <td><?php echo  $paciNome[$m] ?></td>
          <td><?php echo $crm_med[$m]; ?></td>
          <td><?php 
              if ($resposta[$m]) {
                echo "Respondido.";
              }else{
          echo "Aguardando resposta.";
              }

           ?>

          </td>
          <td ><a href="post_result.php?idp=<?php echo $paciNome[$m] ?>&&ir=<?php echo $crm_med[$m] ?>&&id=<?php echo $m ?>&&truide=<?php echo $truide[$m] ?>" id="my_link" class="glyphicon glyphicon-search" data-val="user1" data-oloco="oloco"  style="text-decoration: none"></a></td>
        </tr>
       <?php 
      
      }
       ?>
      </tbody>
          </table>      
        </div>
      </div>  
      
      <!-- Pesquisa geral 2 -->

      <div>
            <button class="btn btn-default  btn-block w3-text-white collapsed" data-toggle="collapse" data-target="#table-fullist2" style="white-space: normal; font-size: 25px; font-style: bold; text-align: left;" id="collapse-fullist"><div style="width: 30px; height: 30px; background-color: #628eaf;; border-radius: 50%; float: left; margin-right: 10px;font-size: 18px; padding-top: 2px; text-align: center; margin-top: 2px"><?php 
              if (isset($queryCons17)) {
              if (mysqli_num_rows($queryCons17) < 100) {
                echo(mysqli_num_rows($queryCons17));
              }else{
                echo "+99";
              }
              }else{
                echo "0";
              }
             ?></div><b style="color: darkblue;" >Lista de todos pacientes respondidos</b></button>
        </div>
      <div id="table-fullist2" class="collapse" style=""> 
        <div class="table-responsive">
          
          <table class="table table-striped" style="color: darkblue;font-size: 20px;margin-bottom: 20px">
            <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nome do Paciente</th>
          <th scope="col">CRM do médico solicitante</th>
          <th scope="col" style="width: 30%">Situação</th>
          <th scope="col" style="width: 2%"></th>
        </tr>
      </thead>
      <tbody>
         <!--  Lista de todo os pacientes respondidos-->
        <?php  
      for ($m=1; $m <= mysqli_num_rows($queryCons17); $m++) { 
        
        ?>
        <tr>   
          <th scope="row"><?php echo $m; ?></th>
          <td><?php echo  $paciNome[$m] ?></td>
          <td><?php echo $crm_med[$m]; ?></td>
          <td><?php 
              if ($resposta2[$m]) {
                echo "Respondido.";
              }else{
          echo "Aguardando resposta.";
              }

           ?>

          </td>
          <td ><a href="post_result.php?idp=<?php echo $paciNome[$m] ?>&&ir=<?php echo $crm_med[$m] ?>&&id=<?php echo $m ?>&&truide=<?php echo $truide[$m] ?>" id="my_link" class="glyphicon glyphicon-search" data-val="user1" data-oloco="oloco"  style="text-decoration: none"></a></td>
        </tr>
       <?php 
      
      }
       ?>
      </tbody>
          </table>      
        </div>
      </div>  

<!-- Pesquisa geral 3 -->

      <div>
            <button class="btn btn-default  btn-block w3-text-white collapsed" data-toggle="collapse" data-target="#table-fullist3" style="white-space: normal; font-size: 25px; font-style: bold; text-align: left;" id="collapse-fullist"><div style="width: 30px; height: 30px; background-color: #628eaf;; border-radius: 50%; float: left; margin-right: 10px;font-size: 18px; padding-top: 2px; text-align: center; margin-top: 2px"><?php 
              if (isset($queryCons27)) {
              if (mysqli_num_rows($queryCons27) < 100) {
                echo(mysqli_num_rows($queryCons27));
              }else{
                echo "+99";
              }
              }else{
                echo "0";
              }
             ?></div><b style="color: darkblue;" > Lista de todos pacientes não respondidos</b></button>
        </div>

      <div id="table-fullist3" class="collapse" style=""> 
        <div class="table-responsive">
          
          <table class="table table-striped" style="color: darkblue;font-size: 20px;margin-bottom: 20px">
            <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nome do Paciente</th>
          <th scope="col">CRM do médico solicitante</th>
          <th scope="col" style="width: 30%">Situação</th>
          <th scope="col" style="width: 2%"></th>
        </tr>
      </thead>
      <tbody>
         <!--  Lista de todo os pacientes nao respondidos-->
        <?php  
      for ($q=1; $q <= mysqli_num_rows($queryCons27); $q++) { 
        
        ?>
        <tr>   
          <th scope="row"><?php echo $q; ?></th>
          <td><?php echo  $paciNome[$q] ?></td>
          <td><?php echo $crm_med[$q]; ?></td>
          <td><?php 
              if ($resposta3[$q]) {
                echo "Respondido.";
              }else{
          echo "Aguardando resposta.";
              }

           ?>

          </td>
          <td ><a href="post_result.php?idp=<?php echo $paciNome[$q] ?>&&ir=<?php echo $crm_med[$q] ?>&&id=<?php echo $q ?>&&truide=<?php echo $truide[$q] ?>" id="my_link" class="glyphicon glyphicon-search" data-val="user1" data-oloco="oloco"  style="text-decoration: none"></a></td>
        </tr>
       <?php 
      
      }
       ?>
      </tbody>
          </table>      
        </div>
      </div>
    



  </div>
  </div>  
 
<!-- Modal -->
<div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: #8ad179">
      <div class="modal-header">
        <strong class="modal-title" id="exampleModalLabel">Informações e Envios</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: darkblue">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 
      	 <!-- Comparação de célula pra relacionar o nome do médico solicitante -->
      	 <p id="info1">Médico solicitante: <?php 
      	$crm_solic =  $_GET['ir'];
      	$consulta9 = "SELECT username FROM users WHERE crm ='$crm_solic'";
		$queryCons9 = mysqli_query($db,$consulta9) or die(mysqli_error($db));
		$medico_solic = mysqli_fetch_array($queryCons9);
      	echo $medico_solic['username'];   
      	   ?></p>
      	 <p id="info1">Paciente: <?php echo $subidp; 	 ?></p>
      	
	  		<br></br>
					<form enctype="multipart/form-data" action="upload.php" method="POST">
						
						<label class="control-label" style="font-size: 20px">Selecione o arquivo correspondente ao paciente:</label>
						<input id="arquivos" name="arquivos[]" type="file" class="file" >
						<input type="hidden" name="crm_medico" value="<?php echo $crm_solic ?>">
						<input type="hidden" name="truide" value="<?php echo $_GET['truide'] ?>">
						<!-- CPF do cidadão -->
						
						<input type="hidden" name="cpf_cid" value="<?php echo $cpf_paci[$cpf_id] ?>">
						<input type="submit" value="Enviar arquivo" style="color: darkblue; display: block;" />
						<span style="font-size: 18px; color: #204193;">
						<input type="checkbox" name="checkbox" value="1"> Caixa de confirmação de resposta, marque para poder upar o arquivo.</span>

					</form>
				
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="padding-top: 2px; padding-bottom: 2px;font-size: 16px">Sair</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="info_up" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="background-color: #8ad179">    
      <div class="modal-body">
      	 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: darkblue">&times;</span>
        </button>
      	
      	<p >O arquivo foi upado com sucesso!</p>	
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="padding-top: 2px; padding-bottom: 2px;font-size: 16px; float: right; margin-top: -13px; margin-right: -16px">Ok</button>
      	
      </div>
    </div>
  </div>
</div>


  </div>
</div>

</body>


<html>