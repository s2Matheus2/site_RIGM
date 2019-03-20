<?php 
include ('server.php');
if (file_exists('tcpdf/examples/img/podepa.png')) {
unlink('tcpdf/examples/img/podepa.png');
} 

if (isset($_GET['exam'])) {
  if ($_GET['exam'] == "HLA-B*27") {
    $mark1 = "X"; $mark2 = "";  $mark3 = "";  $mark4 = "";
  }elseif ($_GET['exam'] == "HLA-DQA1/DQB1") {
    $mark1 = ""; $mark2 = "X";  $mark3 = "";  $mark4 = "";
  }elseif ($_GET['exam'] == "HLA-A*31:01") {
    $mark1 = ""; $mark2 = "";  $mark3 = "X";  $mark4 = "";
  }elseif ($_GET['exam'] == "HLA-B*58:01") {
    $mark1 = ""; $mark2 = "";  $mark3 = "";  $mark4 = "X";
  }
}
  $crm_med = $_GET['crm'];
    $consulta15 = "SELECT usernamefull,telefone1,email FROM users WHERE crm = '$crm_med'";
    $queryCons15 = mysqli_query($db,$consulta15) or die(mysqli_error($db));
    $rowCons15 = mysqli_fetch_array($queryCons15);

    $user_med = $rowCons15['usernamefull'];
    $tel_med = $rowCons15['telefone1'];
    $email_med = $rowCons15['email'];

?>
<!doctype html>
<html lang="pt-br">
<head>

<title>Imuno Genética Diagnóstica</title>
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/PDF.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/html2canvas.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="icon" id="favicon" href="img/iconLGHM.png" type="image/x-icon">
<link rel="icon" id="favicon" href="img/iconLGHM.png" type="image/x-icon">
<script>

  function takeScreenshoot(){
  html2canvas(document.querySelector("#capture")).then(canvas => {
    
    var img = canvas.toDataURL("image/png");
   
   window.location.href = "tcpdf/examples/save.php?basedata="+img;
   });
  }
  

</script>

<script >
  $(document).on("click", "#printscreen",function (event) {
 takeScreenshoot();
});
</script>

</head>
<body class="oloco" style="color: white; background-color: #edfff0;" >
<div class="container"><a href="#" id="printscreen" style="float: right;">Gerar PDF</a></div>
<div class="container" id="capture" style="background-color: #edfff0; padding-right: 0px;padding-left: 0px">
<nav class="container-fluid" style="background-color: #bcd8c2"><p style="text-align: center;margin-left: -2px;margin-right: -10px"><img id ="navbar-brand-lghm" src="img/LGHM.png" width="156" style="" align="middle"></p>

</nav>
<div class="container">
  <div class="main_info" style="background-color: #edfff0">
    <div class="row">      
      
    <div class="page-header"><strong style="text-align: justify;color: darkblue;font-size: 28px; margin-left: 35px">Ficha de Exame da Rede de Imunogenética Médica</strong></div>
    <div class="col-md-7" style="margin-left: 10px">
    <strong  style="text-align: center;color: darkblue;font-size: 22px;margin-left: 20px">Dados do(a) Médico(a)</strong>
    <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">Médico(a) Solicitante: <?php echo $user_med; ?></p>
    <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">CRM:<?php echo $_GET['crm']; ?></p>
    <p style="text-align: center; text-align: justify; color: darkblue;font-size: 22px">Telefone: <?php echo $tel_med; ?></p>
    <p style="text-align: center; text-align: justify; color: darkblue;;font-size: 22px">Email: <?php echo $email_med; ?></p>
    <p style="text-align: center; text-align: justify; color: darkblue;;font-size: 22px">Observações: <?php echo $_GET['obs_med']; ?></p>
      </div>

      <div class="col-md-4">
        <strong style="text-align: justify; color: darkblue;font-size: 22px;display: block;">Exame Solicitado</strong>
        <span style="text-align: justify; color: darkblue;font-size: 18px;margin-left: 15px">
        HLA-B*27        <b style="margin-left: 81px">(  <?php echo $mark1 ?><b style="margin-left: 10px">)</b></b>
        </span>
        <p></p>
        <span style="text-align: justify; color: darkblue;font-size: 18px;margin-left: 15px">
        HLA-DQA1/DQB1        <b style="margin-left: 20px">(  <?php echo $mark2 ?><b style="margin-left: 10px">)</b></b>
        </span>
        <p></p>
        <span style="text-align: justify; color: darkblue;font-size: 18px;margin-left: 15px">
        HLA-A*31:01        <b style="margin-left: 57px">(  <?php echo $mark3 ?><b style="margin-left: 10px">)</b></b>
        </span>
        <p></p>
        <span style="text-align: justify; color: darkblue;font-size: 18px;margin-left: 15px">
        HLA-B*58:01        <b style="margin-left: 58px">(  <?php echo $mark4 ?><b style="margin-left: 10px">)</b></b>
        </span>
        
      </div>
	   </div>

     <div class="row" style="margin-top: 40px">
       <div class="col-md-12">
        <strong  style="text-align: center;color: darkblue;font-size: 22px;margin-left: 20px">Dados do(a) Paciente</strong>
        
        <div class="rows">
        <div class="col-md-7">
        <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">Nome do Paciente: <?php echo $_GET['user']; ?></p>
        </div>
        <div class="col-md-5">
        <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">CPF: <?php echo $_GET['cpf']; ?></p>
        </div>
        
        <div class="col-md-6"> 
        <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">Data de Nascimento: <?php echo $_GET['data']; ?></p></div>
        <dir class="col-md-6" style="margin-top: 0px">
        <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">Gênero: <?php echo $_GET['gender']; ?></p>
        </dir>
        
        <div class="col-md-12" style="margin-top: -22px">
        <p style="text-align: center; text-align: justify;color: darkblue;font-size: 22px">Endereço: <?php echo $_GET['end']; ?></p>
        </div>
        <div class="col-md-6">  
        <p style="text-align: center; text-align: justify; color: darkblue;font-size: 22px">Telefone1: <?php echo $_GET['tel1']; ?></p>
        </div>
        <div class="col-md-6">
        <p style="text-align: center; text-align: justify; color: darkblue;;font-size: 22px">Email: <?php echo $_GET['email']; ?></p></div>
        <div class="col-md-12">
        <p style="text-align: center; text-align: justify; color: darkblue;font-size: 22px">Telefone2: <?php echo $_GET['tel2']; ?></p>
        </div>
        <div class="col-md-12">
        <p style="text-align: center; text-align: justify; color: darkblue;;font-size: 22px">Observações: <?php echo $_GET['obs_paci']; ?></p>
        </div>
        <div class="col-md-12" style="margin-top: 10px">
        <strong style="text-align: center; text-align: justify; color: darkblue;;font-size: 22px">Impressão Diagnóstica: <b style="font-weight: normal;"><?php echo $_GET['print']; ?></b></strong>
        </div>
        <div class="col-md-12" style="margin-top: 20px">
        <p style="text-align: justify; color: darkblue;;font-size: 22px">Assinatura do paciente: _________________________________________________________________________________</p>
        </div>
        </div>
     </div>

  </div>

</div>
<!-- Footer -->
<header class="page-header"></header>
<footer class="page-footer font-small blue pt-4" style="background-color:#edfff0; margin-top: 40px; margin-left: -25px;margin-right: -25px">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase" style="color: #126991; font-size: 20px;font-weight: bold">Informações Extras</h5>
          <p style="color: #126991;">Alguma informação a respeito do site e dos envolvidos no projeto.</p>

        </div>
        <!-- Grid column 

        <hr class="clearfix w-100 d-md-none pb-3">-->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase" style="color: #126991; font-size: 20px;font-weight: bold">Apoio</h5>

            <p style="color: #126991;">
            <i class="glyphicon glyphicon-star" style="text-align: justify;"></i> UFPA</p>
            <p style="color: #126991;">
            <i class="glyphicon glyphicon-star" style="text-align: justify; margin-left: 8px;"></i> LGHM</p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3" >

            <!-- Links -->
            <h5 class="text-uppercase" style="color: #126991; font-size: 20px;font-weight: bold">Contatos</h5>
       
          <p style="text-align: justify; margin-left: 50px; color: #126991;">
            <i class="glyphicon glyphicon-envelope"></i> info@gmail.com</p>
          <p style="text-align: justify; margin-left: 50px; color: #126991;">
            <i class="glyphicon glyphicon-earphone"></i> 0000 0000</p>
          <p style="text-align: justify; margin-left: 50px; color: #126991;">
            <i class="glyphicon glyphicon-earphone"></i> 0000 0000</p>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #bcd8c2">© 2018 Copyright: LGHM
      <!--<a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>-->
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</div>
</div>
<div class="container"><a href="#" id="printscreen" style="float: right;">Gerar PDF</a></div>
</body>



<html>