<?php include('server.php'); 

if ($_SESSION['success'] != "Online"	) {
	header('location: index.php');
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
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>

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
  <div class="main_info">
  	
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
					                	<tr  style="border:solid; border-color: white; font-size-adjust: relative">
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

</body>


<html>