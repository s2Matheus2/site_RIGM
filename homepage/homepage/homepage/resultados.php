<?php include('server.php'); 
$crm = $_SESSION['crm'];
if ($_SESSION['success'] != "Online"	) {
	

	header('location: index.php');
}

if ((isset($_SESSION['paciente-pesq'])) and isset($_SESSION['verificou']) == "sim") {
	$pacipesq=$_SESSION['paciente-pesq'];
}else{
	$pacipesq = "";
	$_SESSION['verificou'] = "não";
	
	
}


$consulta2 = "SELECT username FROM agenda WHERE crm_med = '$crm'";

$i = 0;
$queryCons2 = mysqli_query($db,$consulta2);
while ($fetch = mysqli_fetch_row($queryCons2)) {

 $i++;
 $paciNome[$i] = $fetch[0] ;
 
}

$consulta3 = "SELECT cpf FROM agenda WHERE crm_med = '$crm'";

$m = 0;
$queryCons3 = mysqli_query($db,$consulta3);
while ($fetch2 = mysqli_fetch_row($queryCons3)) {

 $m++;
 $paciCPF[$m] = $fetch2[0] ;
 
}

$consulta18 = "SELECT username FROM agenda WHERE crm_med = '$crm' AND respondido = '1'";

$t = 0;
$queryCons18 = mysqli_query($db,$consulta18);
while ($fetch = mysqli_fetch_row($queryCons18)) {

 $t++;
 $paciResp[$t] = $fetch[0] ;
 
}
$consulta19 = "SELECT username FROM agenda WHERE crm_med = '$crm' AND respondido = '0'";

$l = 0;
$queryCons19 = mysqli_query($db,$consulta19);
while ($fetch = mysqli_fetch_row($queryCons19)) {

 $l++;
 $paciNResp[$l] = $fetch[0] ;
 
}

//print_r("O dito dirpac".$_SESSION['dirpac']);

 if ($_SESSION['dirpac'] == "") {
    					$PacienteShow = "none";
    					$OptionPac = "show";
    					$OptionPac2 = "show";
    					$OptionPac3 = "show";
    					$collapse = "collapse";
    					$collapsePT = "Todos Pacientes Cadastrados";
    					$collapsePE = "Todos Pacientes Esperando Resposta";
    					$collapsePR = "Todos Pacientes Respondidos";
    					
    }else{

    					$collapse = "collapse in"; 
    					$PacienteShow = "show";
    					$OptionPac = "none";		
    					$OptionPac2 = "none";
    					$OptionPac3 = "none";
    						$collapsePT = 'Dados de '.$_SESSION['nome-do-pac'.$_GET['id'].''].'';
    					
    					
    					
    }
   
    if ($_SESSION['verificou'] == "não") {
    $disp = "none";
    }else{
    	$disp = "block";
    }
    
    if (isset($_GET['id'])) {
    	$cpft = $paciCPF[$_GET['id']];
    	$consulta16 = "SELECT url FROM ficha WHERE cpf = '$cpft'";
    	$queryCons16 = mysqli_query($db,$consulta16) or die(mysqli_error($db));
    	$rowCons16 = mysqli_fetch_array($queryCons16);
    	$urlt = $rowCons16['url'];
    }else {
    	$urlt = "";
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
<script src="js/exit_buttom.js"></script>

<link rel="icon" id="favicon" href="img/iconLGHM.png" type="image/x-icon">

 <style>
  /* Icon when the collapsible content is shown */
  #btn-paci-info:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";
    color: darkblue;
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  #btn-paci-info.collapsed:after {
    content: "\e080";
  }
 
  /* Icon when the collapsible content is shown */
  #btn-paci-info2:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";
     color: darkblue;
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  #btn-paci-info2.collapsed:after {
    content: "\e080";
  }
   /* Icon when the collapsible content is shown */
  #btn-paci-info3:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";
     color: darkblue;
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  #btn-paci-info3.collapsed:after {
    content: "\e080";
  }
 
</style>
<script type="text/javascript">
	function toggle_div_fun(id){
		 var divelement = document.getElementById(id);

		 if (divelement.style.display == 'none'){ 
		 	divelement.style.display = 'block';
		 }else{
		 	
		 	divelement.style.display = 'none';
		 <?php $_SESSION['verificou'] = "não"; ?>
		 }
	}
</script>
</head>
<body class="oloco">

<nav class="navbar navbar navbar-reprograma">
<?php if (isset($_SESSION["success"]) == "Online"): ?>
<a href="user2.php" class="navbar-brand"><img id ="navbar-brand-lghm" src="img/LGHM.png" width="156"	alt=""><font color="white"></a>
<?php endif ?>	
<?php if(isset($_SESSION["success"]) != "Online"): ?> 
<a href="index.php?logout='1'" class="navbar-brand"><img id ="navbar-brand-lghm" src="img/LGHM.png" width="156"	alt=""><font color="white"></a>
<?php endif ?>

<header class="container">

<div class="navbar-header">


<button class="navbar-toggle glyphicon glyphicon-menu-hamburger"
data-toggle="collapse" data-target="#navbar-RIGM">
</button>
</div>

<ul id="navbar-RIGM" class="nav navbar-nav navbar-right collapse navbar-collapse">

<li><a style="color:darkblue;  padding-top: 20px"  href="agendar-exames.php"	id="cole">Agendar Exame</a></li>
<li><a style="color:darkblue;  padding-top: 20px; background-color: #c1f2b5;"  href="resultados.php"	id="cole">Resultados</a></li>
<li class="nav-item dropdown" style="cursor: pointer;">
            <a class="nav-link dropdown-toggle"	style="color: darkblue"  id="cole" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?><img src="img/anon_pic.jpg" style="width: 40px; padding-right: 0px; padding-left: 6px;	padding-bottom: -4px;" 	alt=""></a>
            <div class="dropdown-menu"	id="dropajuste" aria-labelledby="dropdown01">
              <a style="color:darkblue; display: block; text-align: center; text-decoration: none;"  href="#"	id="out">Conta<span class="glyphicon glyphicon-cog" style="padding-left: 4px;"></span></a>
              <a style="color:darkblue; display: block; text-align: center; text-decoration: none;"  href="index.php?logout='1'"	id="out">Sair</a>
            </div>
</li>

</ul>


</header>


</nav>


<div class="container" >
	<div class="row" style="margin-top: -5px;">
		<h3></h3>
		<div class="col-md-3">
			<div class="main_info">
				<div id="boxforminfo" style="font-size: 22px; padding-top: 5px; padding-bottom: 5px">Informações Adicionais
				</div>
				
					<div class="panel-heading" style="padding-top: 2px;padding-bottom: 0px;margin-bottom: -10px;margin-top:5px"><p style="font-size: 20px ;font-style: bold;text-align: center;font-weight: bold">Visualizar Ficha de Exame</p></div>
					<div style="margin-bottom: 10px;padding-top: 2px; padding-bottom: 2px;border: none;background-color: #95e595;"><p style="color: darkblue;font-size: 16px; margin-top: 10px;margin-right: 10px;margin-left: 10p;text-align: center;"><a href='<?php echo $urlt ?>'><?php 
					if (isset($_GET['id'])) {
						echo 	'Ficha de Exame de '.$_SESSION['nome-do-pac'.$_GET['id']];
					}else{
					 echo "Primeiro escolha um paciente";
					}

					?>
					</a></p></div>
					
			
					<h3 class="page-header" style="margin-top:0px;margin-right: 20px;margin-left: 20px;"></h3>
					
			</div>
		</div>
		<h3></h3>
		<div class="col-md-9">
		<div class="main_info">
			<div id="boxforminfo">Pesquisa</div>
			<h3></h3>
			
			<!-- Input de pesquisa -->
			<form action="resultados.php" method="post" class="search" style="margin-bottom: 0px; display: <?php echo $OptionPac; ?>"> 
			  <div class="row">
			    <div class="col-xs-12 col-md-12">
			      <div class="input-group" >
			        <input type="text" class="form-control" name="pesquisa" placeholder="Digite o nome ou CPF do paciente que deseja encontrar." id="txtSearch" style="height: 50px; font-size: 20px"/>
			        <div class="input-group-btn">
			          <button class="btn btn-default" type="submit" name="pesquisa-paci"  style="height: 50px;">
			          <span class="glyphicon glyphicon-search" style="color: darkblue"></span>
			          </button>
			        </div>
			      </div>
			    </div>
			  </div>
			</form>
			<div id="sectiontohide" style="display: <?php echo $disp; ?>">
				<span style="background-color:#628eaf;display: block;" >
					<div class="row">
						<div class="col-md-11 col-xs-10" >
							<?php 
						$p = 1;
						while ($pacipesq != $paciNome[$p] and $p < mysqli_num_rows($queryCons2)) {
							 $p++;
						
						}
						
						if ($pacipesq == $paciNome[$p]) {
							$_SESSION['paci-cpf-temp'] = $paciCPF[$p];
							$_SESSION['id-pac'] = $p;
				
						}else{
							$_SESSION['paci-cpf-temp'] = "";
							$_SESSION['id-pac'] = "";
						}
						?>
							
						<a style="display: block; text-decoration: none;" id="pesquisa-value" href="download.php?situ=3&&indice=<?php echo$p ?>"><?php echo $pacipesq; 
						$p = 1;
						while ($pacipesq != $paciNome[$p] and $p < mysqli_num_rows($queryCons2)) {
							 $p++;
						
						}
						
						if ($pacipesq == $paciNome[$p]) {
							$_SESSION['paci-cpf-temp'] = $paciCPF[$p];
							$_SESSION['id-pac'] = $p;
				
						}else{
							$_SESSION['paci-cpf-temp'] = "";
							$_SESSION['id-pac'] = "";
						}
						?>
							
						</a>
						</div>
						<div class="col-md-1 col-xs-2">
						<button class="btn btn-default " style="float: right; color: darkblue" onclick="toggle_div_fun('sectiontohide');">x</button>
						</div>
					</div>
				</span>
			
			</div>
			<br/>

			<div>

	  			<button class="btn btn-default  btn-block w3-text-white collapsed" data-toggle="collapse" data-target="#paciTotal" style=" color: red;white-space: normal; font-size: 25px; font-style: bold;text-align: left;" id="btn-paci-info"><n style="color: darkblue"><?php echo $collapsePT; 	 ?></n></button>
	  	 	</div>


		  	<div class="<?php echo ($collapse) ?>" style="background-color: #628eaf;" id="paciTotal"  >

			  	<div style="display: block;display: <?php echo $PacienteShow; ?>"><a class="btn w3-animate-right" style=" white-space: normal; background-color: #628eaf;" href="download.php?situ=1"> <span class="glyphicon glyphicon-share-alt"></span><b> Voltar para a página anterior</a></div>

			    <div class="row">
			    	<div class="col-md-1 col-xs-0"></div>
			    	<div class="col-md-10 col-sm-10 col-xs-9">
			    		<?php
			    					
			    		for ($k=1; $k <= mysqli_num_rows($queryCons2); $k++) { 
			    					   
			    		$_SESSION['paciente'.$k.''] = $paciCPF[$k];
			    					

			    		?>
			    		<div style="display: block;">
			    			<a href="download.php ? id=<?php echo($k) ?>" style="display: <?php echo  $OptionPac ?>; text-decoration: none; color: white; text-indent: 20px" id="list-paci">
			    			<?php 
			    			echo $paciNome[$k]; 
			    			$_SESSION['nome-do-pac'.$k.''] = $paciNome[$k];
			    			?></a>
			    		</div> 
			   			<?php
			   			} 
			    		?>
			    				
			    		<div style="display: <?php echo $PacienteShow; ?>">
			    				
			    			<div>
			    					
				    		    <table class="table table-response" style="font-size: 20px;">
					            	<thead>
					                	<tr style="background-color: #628eaf;">
					                    <th style="border:solid; border-color: white; ">ID</th>
					                    <th style="border:solid; border-color: white; ">Arquivo</th>
					                    <th style="border:solid; border-color: white; ">Ação</th>
					                	</tr>
					            	</thead>
					            	<tbody>
					               		<?php 
					  					$dir = scandir('media/'.$_SESSION['crm'].'/'.$_SESSION['dirpac'].'');
					  				
										$_GET['dir'] = $dir;
								
										for ($i=2; $i < count($dir); $i++) { 
										$indice = $i;
								
								
										($_SESSION['dir'.($i-1).''] = $dir[$i]);
								
										?>
					                	<tr  style="border:solid; border-color: white; font-size-adjust: relative;background-color: #628eaf;">
					                    	<td style="border:solid; border-color: white; "><?php echo $indice -1 ?></td>
					                    	<td style="border:solid; border-color: white; "><?php echo $dir[$indice] ?></td>
					                    	<td style="border:solid; border-color: white; " class="text-center"><a href="download.php?file=<?php  echo($indice -1)?>" class="btn btn-primary">Baixar</a></td>
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
			</div>

	  		<!-- Todos Pacientes Esperando Respostas -->
	  		<div style=" display: <?php echo $OptionPac2; ?>">
	  		<button class="btn btn-default  btn-block w3-text-white collapsed" data-toggle="collapse" data-target="#paciTotal2"  style="white-space: normal; font-size: 25px; font-style: bold; text-align: left;" id="btn-paci-info2"><n style="color: darkblue;" ><?php echo $collapsePE;  ?></n></button>
	  	 	</div>
	  		<div class="<?php echo ($collapse) ?>" style="background-color: #628eaf;" id="paciTotal2">
	  				<div class="row">
			    	<div class="col-md-1 col-xs-0"></div>
			    	<div class="col-md-10 col-sm-10 col-xs-9">
			    		<?php
			    					
			    		for ($q=1; $q <= mysqli_num_rows($queryCons19); $q++) { 
			    					   
			    		$_SESSION['paciente'.$q.''] = $paciCPF[$q];
			    					

			    		?>
			    		<div style="display: block;">
			    			<a href="download.php ? id=<?php echo($q) ?>" style="display: <?php echo  $OptionPac3 ?>; text-decoration: none; color: white; text-indent: 20px" id="list-paci">
			    			<?php 
			    			echo $paciNResp[$q]; 
			    			$_SESSION['nome-do-pac'.$q.''] = $paciNResp[$q];
			    			?></a>
			    		</div> 
			   			<?php
			   			} 
			    		?>
			    				
				   	</div>
		    	</div>
	  		</div>

	  		<!-- Todos Pacientes Respondidos -->
	  		<div style=" display: <?php echo $OptionPac3; ?>">
	  		<button class="btn btn-default  btn-block w3-text-white collapsed" data-toggle="collapse" data-target="#paciTotal3"  style="white-space: normal; font-size: 25px; font-style: bold; text-align: left;" id="btn-paci-info3"><n style="color: darkblue"><?php echo $collapsePR;  ?></n></button>
	  	 	</div>
	  		<div class="<?php echo ($collapse) ?>" style="background-color: #628eaf;" id="paciTotal3">
	  		
	  			<div class="row">
			    	<div class="col-md-1 col-xs-0"></div>
			    	<div class="col-md-10 col-sm-10 col-xs-9">
			    		<?php
			    					
			    		for ($w=1; $w <= mysqli_num_rows($queryCons18); $w++) { 
			    					   
			    		$_SESSION['paciente'.$w.''] = $paciCPF[$w];
			    					

			    		?>
			    		<div style="display: block;">
			    			<a href="download.php ? id=<?php echo($w) ?>" style="display: <?php echo  $OptionPac3 ?>; text-decoration: none; color: white; text-indent: 20px" id="list-paci">
			    			<?php 
			    			echo $paciResp[$w]; 
			    			$_SESSION['nome-do-pac'.$w.''] = $paciResp[$w];
			    			?></a>
			    		</div> 
			   			<?php
			   			} 
			    		?>
			    				
				   	</div>
		    	</div>	
	  		</div>
		</div>
		</div>
	</div>	
</div>

</body>


<html>