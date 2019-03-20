<?php include('server.php');?>
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
<li><a style="color:darkblue"  href="login.php"	id="cole">Login</a></li>

</ul>
</header>
</nav>

<div class="container">
	<div class="row"	style="margin-top: 60px;">
		<div class="col-xs-3	col-sm-3	col-md-3	col-lg-3">
			
		</div>
		<div class="col-xs-12 offset-xs-4	col-md-6 offset-md-4	col-sm-6 offset-sm-4 	col-lg-6 offset-lg-4">
	   			<div id="boxform">
	   				<form method="post" action="registro.php">
						<!-- display de validação de erros-->
						<?php include('errors.php'); ?>
							
						<h3 id="boxforminfo"	style="color: white; padding-top: 8px;">Registro</h3>

	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Primeiro Nome:</label>
	   					<input type="text"	name="username" class="form-control" id="username" placeholder="Digite apenas seu primeiro nome">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Nome Completo:</label>
	   					<input type="text"	name="usernamefull" class="form-control" id="usernamefull" placeholder="Digite seu nome completo">
	   				</div>

	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>CRM:</label>
	   					<div class="row" style="display: block;">
	   					<div class="col-md-6">	
	   					<label style="font-size: 18px">Estado:
	   					<select name="crm2"	style="color: darkblue; font-size: 16px;">
	   						<option value="AC">AC</option>
	   						<option value="AL">AL</option>
	   						<option value="AP">AP</option>
	   						<option value="AM">AM</option>
	   						<option value="BA">BA</option>
	   						<option value="CE">CE</option>
	   						<option value="DF">DF</option>
	   						<option value="ES">ES</option>
	   						<option value="GO">GO</option>
	   						<option value="MA">MA</option>
	   						<option value="MT">MT</option>
	   						<option value="MS">MS</option>
	   						<option value="MG">MG</option>
	   						<option value="PA">PA</option>
	   						<option value="PB">PB</option>
	   						<option value="PR">PR</option>
	   						<option value="PE">PE</option>
	   						<option value="PI">PI</option>
	   						<option value="RJ">RJ</option>
	   						<option value="RN">RN</option>
	   						<option value="RS">RS</option>
	   						<option value="RO">RO</option>
	   						<option value="RR">RR</option>
	   						<option value="SC">SC</option>
	   						<option value="SP">SP</option>
	   						<option value="SE">SE</option>
	   						<option value="TO">TO</option>
	   					</select>
	   					</label>
	   					</div>
	   					<div class="col-md-6">	   						
	   					<input type="number"	style="" 	minlength="4" maxlength="10" 	name="crm1" class="form-control" id="crm1" placeholder="Digite apenas o número do seu crm" style="float: right;">
	   					</div>	
	   					</div>
	   				</div>

	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Email:</label>
	   					<input type="email"	name="email" class="form-control" id="email" placeholder="Digite seu email.">
	   				</div>

	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Senha:</label>
	   					<input type="password"	name="password_1" class="form-control" id="senha" placeholder="Digite sua senha.">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Confirme sua senha:</label>
	   					<input type="password"	name="password_2" class="form-control" id="senha" placeholder="Confirme sua senha.">
	   				</div>

	   				<button type="submit"	name="registro" class="btn btn-primary"	style=" margin-left: 20px;  margin-right: 20px;">Confirmar</button>
	   				
						<p style=" margin-left: 20px;  margin-right: 20px;	font-size: 16px;">
							Ja possui Cadastro? <a href="login.php" style="color: darkblue">Clique aqui.</a>
						</p>
					</form>
				</div>	

   		</div>
   	</div>		
</div>

</body>


<html>