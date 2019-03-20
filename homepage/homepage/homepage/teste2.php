<?php 
include('teste.php');
echo $_SESSION['popup'];
unset($_SESSION['popup']);
echo $_SESSION['popup'];

 ?>