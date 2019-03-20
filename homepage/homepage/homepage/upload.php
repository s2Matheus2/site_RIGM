<?php
include('server.php');
	/* DESCOMENTAR PARA DEBUG
	echo '<pre>';
		print_r($_FILES);
	echo '<pre>';
	*/

	//verifica quantos arquivos estão sendo recebidos na superglobal $)FILES
	//$total_arquivos = count($_FILES['arquivos']['name']);
	
	//diretório de upload
	$diretorio_upload = './media/'.$_POST['crm_medico'].'/'.$_POST['cpf_cid'].'/';

	//percorre cada arquivo
	//for ($i=0; $i < $total_arquivos; $i++) {
				
		/* DESCOMENTAR PARA DEBUG
		echo $_FILES['arquivos']['name'][$i].' - ';
		echo $_FILES['arquivos']['type'][$i].' - ';
		echo $_FILES['arquivos']['tmp_name'][$i].' - ';
		echo $_FILES['arquivos']['error'][$i].' - ';
		echo $_FILES['arquivos']['size'][$i];
		echo '<hr />';
		*/
		$i=0;
		
		$truide = $_POST['truide'];
		//move o arquivo temporario para o destino
		$arquivo_upload = $diretorio_upload . basename($_FILES['arquivos']['name'][$i]);
		if (move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], $arquivo_upload) AND isset($_POST['checkbox'])) {
			//echo "Sucesso<br />";
		$consulta13 = "UPDATE agenda SET respondido='1' WHERE id = '$truide'";
		$queryCons13 = mysqli_query($db,$consulta13) or die(mysqli_error($db));
	
	
		header('location: post_result.php?result=success');
		} else {
			echo "Erro<br />";
		}
        
	//}

	

?>