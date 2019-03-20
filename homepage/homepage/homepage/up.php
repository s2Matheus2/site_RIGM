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

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
		<script src="./js/plugins/sortable.min.js" type="text/javascript"></script>
		<script src="./js/plugins/purify.min.js" type="text/javascript"></script>
		<script src="./js/fileinput.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="./themes/fa/theme.js"></script>
		<script src="./js/locales/<lang>.js"></script>

			<script type="text/javascript">
			$(document).ready( function() {
			
				// initialize with defaults
				$("#arquivos").fileinput();

				// with plugin options
				$("#arquivos").fileinput({'showUpload':false, 'previewFileType':'any'});
				
			});
		</script>

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

<li><a style="color:darkblue;  padding-top: 20px"  href="agendar-exames.php"	id="cole">Agendar Exame</a></li>
<li><a style="color:darkblue;  padding-top: 20px"  href="resultados.php"	id="cole">Resultados</a></li>	

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
  	<div class="container">
  		<div class="row">
  				<div class="col-md-11">
				<form enctype="multipart/form-data" action="upload.php" method="POST">
					<label class="control-label">Selecione os arquivos desejados:</label>
					<input id="arquivos" name="arquivos[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
					<input type="submit" value="Enviar arquivo" style="color: darkblue" />
				</form>
				<div>
		</div>
	</div>		
  </div>
</div>

</body>


<html>