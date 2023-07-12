<?php
require_once("CONN/conn.php");

/*lista acao
	1-cria formulario
	2-adiciona item 
	3-deleta item
*/
if($_POST['acao']){$acao = $_POST['acao'];}else{$acao = '0';}
if($_POST['titulo']){$titulo = $_POST['titulo'];}else{$titulo = '0';}
if($_POST['ID']){$ID = $_POST['ID'];}else{$ID = '0';}

if($_POST['C-radio']){$Cradio = $_POST['C-radio'];}else{$Cradio = '0';}
if($_POST['radio-1']){$TR1 = $_POST['radio-1'];}else{$TR1 = ' ';}
if($_POST['radio-2']){$TR2 = $_POST['radio-2'];}else{$TR2 = ' ';}
if($_POST['radio-3']){$TR3 = $_POST['radio-3'];}else{$TR3 = ' ';}
if($_POST['radio-4']){$TR4 = $_POST['radio-4'];}else{$TR4 = ' ';}


if($_POST['posicao']){$posicao = $_POST['posicao'];}else{$posicao = '0';}

if($_POST['correto']){$RC = $_POST['correto'];}else{$RC = '0';}

if($_POST['id']){$id = $_POST['id'];}else{$id = '0';}


	//echo "<script>alert(".$acao.");</script>";

/*if ($acao==0) {
	echo "<script>window.location.replace(\"index.php\");</script>";
}*/

//CRIA FORMULÁRIO
if($acao==1){

	if ($titulo != '0') {

		$result=pg_query($conn, "INSERT INTO formularios (\"nome\", \"dono\") VALUES ('".$titulo."', '1')");	
	}

	echo "<script>window.location.replace(\"criaForm.php\");</script>";

}

//ADICIONAR CAMPOS AO FORMULÁRIO
if ($acao==2) {
	//RADIO BUTTON
	if ($Cradio!= '0') {

		$result=pg_query($conn, "INSERT INTO questao_formularios (\"enunciado\", \"id_formulario\",\"posicao\",\"op1\",\"op2\",\"op3\",\"op4\",\"correta\") VALUES ('".$Cradio."', '".$ID."','".$posicao."','".$TR1."','".$TR2."','".$TR3."','".$TR4."','".$RC."')");

		echo "<form id='myForm' action='editaForm.php' method='post'><input type='hidden' name='ID' value=".$ID."></form>";
		echo "<script>document.getElementById(\"myForm\").submit();</script>";
	}
}

//APAGA CAMPOS NO FORMULÁRIO	
if ($acao==3) {
	if($id != 0){
		$result=pg_query($conn, "DELETE FROM questao_formularios WHERE id='".$id."'");	
	}
		echo "<form id='myForm' action='editaForm.php' method='post'><input type='hidden' name='ID' value=".$ID."></form>";
		echo "<script>document.getElementById(\"myForm\").submit();</script>";
}
?>
