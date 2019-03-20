<?php include('server.php'); 
if ($_SESSION['success'] != "Online"	) {
	

	header('location: index.php');
}

if (isset($_SESSION['div_agenda1'])) {
	$div_agenda1 = $_SESSION['div_agenda1'];
	$div_agenda2 = 'show';
}else{
$div_agenda1 = 'show';
$div_agenda2 = 'none';
}

if (isset($_SESSION['sucessopaci'])) {
	$sucessopaci = $_SESSION['sucessopaci'];
}else{
$sucessopaci = '';
}

$_SESSION['dirpac'] = "";


if (isset($_SESSION['cpf'])) {
	$cpft = $_SESSION['cpf'];
	$consulta17 = "SELECT url FROM ficha WHERE cpf = '$cpft'";
    	$queryCons17 = mysqli_query($db,$consulta17) or die(mysqli_error($db));
    	$rowCons17 = mysqli_fetch_array($queryCons17);
    	$urlt = $rowCons17['url'];
    }else {
    	$urlt = "";
    unset($_SESSION['cpf']);
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

<script>
var submit1 = '<?php echo $submit1; ?>'; 

if (submit1 == "no") {
$(document).ready(function(){
   
        $("#janela").modal();
        

});
}
</script>

<link rel="icon" id="favicon" href="img/iconLGHM.png" type="image/x-icon">
</head>
<body class="oloco" style="font-size: 24px">

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

<li><a style="color:darkblue;  padding-top: 20px;  background-color: #c1f2b5;"  href="agendar-exames.php"	id="cole">Agendar Exame</a></li>
<li><a style="color:darkblue;  padding-top: 20px"  href="resultados.php"	id="cole">Resultados</a></li>
<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"	style="color: darkblue"  id="cole" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=""><p style="float: left;margin-top: 4px"><?php echo $_SESSION['username']; ?></p><img src="img/anon_pic.jpg" style="width: 40px; padding-right: 10px; padding-left: 6px;	margin-top: -10px;" 	alt=""></a>
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

	<div class="row"	style="margin-top: 60px;">
		<div class="col-xs-3	col-sm-3	col-md-3	col-lg-3">
			
		</div>
		<div class="col-xs-12 offset-xs-0	col-md-6 offset-md-3	col-sm-12 offset-sm-0 	col-lg-6 offset-lg-3">
	   			<?php include('errors.php'); ?>
	   			
	   				<form method="post" action="agendar-exames.php" style="padding-bottom: 20px;display: <?php echo $div_agenda1 ?> ">
						<!-- display de validação de erros-->
					
						
							
					<h3 class="page-header" style="color: white; padding-top: 8px; margin-left: 20px;  margin-right: 20px; font-weight: bold; font-size: 30px;">Agendar Exames</h3>
					<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Primeiro nome do paciente</label>
	   					<input type="text"	name="username" class="form-control"placeholder="Digite somente o primeiro nome do paciente.">
	   				</div>
					<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Nome completo do paciente</label>
	   					<input type="text"	name="usernamefull" class="form-control"placeholder="Digite o nome completo do paciente.">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Email</label>
	   					<input type="email"	name="email" class="form-control"placeholder="Digite email do paciente.">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Endereço</label>
	   					<input type="text"	name="end" class="form-control"placeholder="Digite o endereço do paciente.">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>CPF do paciente:</label>
	   					<input type="text" minlength="11" maxlength="11" 	name="password" class="form-control" placeholder="Digite somente o número do CPF do paciente">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Sexo</label>
	   					<select name="sexo" style="color: darkblue;">
	   						<option value="Masculino">Masculino</option>
	   						<option value="Feminino">Feminino</option>
	   					</select>
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Data de nascimento do paciente:</label>
	   					<input type="date"	name="data" class="form-control">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Telefone 1(paciente):</label>
	   					<input type="text" minlength="8" maxlength="11" 	name="telefone1" class="form-control" placeholder="Digite o telefone 1 do(a) seu(sua) paciente sem qualquer espaço ou caractere especial">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Telefone 2(paciente):</label>
	   					<input type="text" minlength="8" maxlength="11" 	name="telefone2" class="form-control" placeholder="Digite o telefone 2 do(a) seu(sua) paciente sem qualquer espaço ou caractere especial">
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label>Tipo de exame</label>
	   					<select name="exame" style="color: darkblue;">
	   						
	   						<option value="HLA-B*27">HLA-B*27</option>
	   						<option value="HLA-DQA1/DQB1">HLA-DQA1/DQB1</option>
	   						<option value="HLA-A*31:01">HLA-A*31:01</option>
	   						<option value="HLA-B*58:01">HLA-B*58:01</option>
	   					</select>
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Observações do médico:</label>
	   					<textarea style="font-size: 18px" type="text" name="observacoes_med" class="form-control"placeholder="Digite suas observações pertinentes." rows="10"></textarea>
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Observações do paciente:</label>
	   					<textarea style="font-size: 18px" type="text" name="observacoes_paci" class="form-control"placeholder="Digite as observações necessárias de seu paciente." rows="10"></textarea>
	   				</div>
	   				<div class="form-group"	style=" margin-left: 20px;  margin-right: 20px;">
	   					<label >Impressão diagnóstica:</label>
	   					<textarea style="font-size: 18px" type="text" name="impressoes" class="form-control"placeholder="Digite sua impressão diagnóstica ou deixe em branco caso ainda não tenha uma impressão formada." rows="10"></textarea>

	   				</div>
	   				<button type="submit"	name="cadastro-paciente" class="btn btn-primary" id="btn-subtmit" style=" margin-left: 20px;  margin-right: 20px; font-size: 16px;">Confirmar Agendamento</button>
	   				
					</form>
					

		       <!-- Janela -->
      <div class="modal fade" id="janela">
        
        <div class="modal-dialog modal-sm"  >
          <div class="modal-content" style="background-color: #8ad179; margin-top: 60%" >
            
            <!-- cabecalho -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" style="color: darkblue">
                <span>&times;</span>
              </button>
              <p><center>	 Erro ao cadastrar paciente.</center></p>
            </div>
            
           
	   			
            <!-- rodape -->
            <div class="modal-footer">
            	
              <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:  right; font-size: 17px;">
                Ok.
              </button>



            </div>

          </div>
        </div>

      </div>










   		</div>
   		
   	</div>		
</div>
  </div>
</div>

</body>


<html>