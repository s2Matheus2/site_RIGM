<?php include('server.php');

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
<a href="index.php" class="navbar-brand"><img id ="navbar-brand-lghm" src="img/LGHM.png" width="156"	alt=""><font color="white"></a>

<header class="container">

<div class="navbar-header">


<button class="navbar-toggle glyphicon glyphicon-menu-hamburger"
data-toggle="collapse" data-target="#navbar-RIGM">
</button>
</div>

<ul id="navbar-RIGM" class="nav navbar-nav navbar-right collapse navbar-collapse">

<li><a style="color:darkblue"	 href="conceito.html"		id="cole">Conceitos</a></li>
<li><a style="color:darkblue"  href="marcadores.html"	id="cole">Marcadores de Diagnósticos</a></li>
<li><a style="color:darkblue; background-color: #c1f2b5;"  href="login.php" id="cole">Login</a></li>

</ul>
</header>
</nav>

<div class="container">
	<div class="row"	style="margin-top: 60px;">
		<div class="col-xs-4	col-sm-4	col-md-4	col-lg-4">
			
		</div>
		<div class="col-xs-12 offset-xs-4	col-md-4 offset-md-4	col-sm-4 offset-sm-4 	col-lg-4 offset-lg-4">
	   			<div id="boxform">
	   				<form method="post" action="login.php">
						<!-- display de validação de erros-->
						<?php include('errors.php'); ?>
							
						<h3 id="boxforminfo"	style="color: white; padding-top: 8px;">Login</h3>

	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Usuário:</label>
	   					<input type="text"	name="username" class="form-control" id="email" placeholder="Digite seu nome de usuário.">
	   				</div>

	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Senha:</label>
	   					<input type="password"	name="password" class="form-control" id="senha" placeholder="Digite sua senha.">
	   				</div>

	   				<button type="submit"	name="login" class="btn btn-primary"	style=" margin-left: 20px;  margin-right: 20px;">Confirmar</button>
	   				
						<p style=" margin-left: 20px;  margin-right: 20px;	font-size: 16px;">
							Ainda não possui Cadastro? <a href="registro.php" style="color: darkblue">Registre-se aqui.</a>
						</p>
					</form>
				</div>	

   		</div>
   	</div>		
</div>


</body>


<html>