<?php
require_once("CONN/conn.php");
/*tipagem de questões
	1- texto
	2- radio
	3- check
*/
if($_POST['ID']){$ID = $_POST['ID'];}else{$ID = '0';}

	$result=pg_query($conn,"SELECT * FROM questao_formularios WHERE id_formulario=".$ID."");
	$linhas = pg_num_rows($result);
//echo $linhas;
?>
<html>
<head>
<link href="CSS/bootstrap.min.css" rel="stylesheet">
<link href="CSS/responsivo.css" rel="stylesheet">
<title>FORMULÁRIOS</title>

<script type="text/javascript">
	function mostrarAdd() {
		document.getElementById('add').style.display='block';
		document.getElementById('radio').style.display='block';
		document.getElementById('del').style.display='none';
	}
	function mostrarDel() {
		document.getElementById('del').style.display='block';
		document.getElementById('add').style.display='none';

	}

	
	function quest(idf,id,pos,enun,idop1,op1,idop2,op2,idop3,op3,idop4,op4){
		var textoEdit = "<form action='CreateEditDeleteForm.php' method='post'><table class='table table-striped table-striped tabela60'>";

		textoEdit += "<input type='hidden' name='acao' value='3'>";
		textoEdit += "<input type='hidden' name='idF' value='"+idf+"'>";
		textoEdit += "<input type='hidden' name='id' value='"+id+"'>";
		textoEdit += "<input type='hidden' name='ID' value='"+<?php echo $ID; ?>+"' >";

		textoEdit += "<tr><td>Posição:</td><td><input name='posicao' style='width:100%' type='text' value='"+pos+"'></td></tr>";
		textoEdit += "<tr><td>Enunciado:</td><td><input name='enun' style='width:100%' type='text' value='"+enun+"'></td></tr>";

		textoEdit += "<tr><td>Opção 1:</td><td><input type='hidden' name='idop1' value='"+idop1+"'><input style='width:100%' type='text' name='op1' value='"+op1+"'></td></tr>";
		textoEdit += "<tr><td>Opção 2:</td><td><input type='hidden' name='idop2' value='"+idop2+"'><input style='width:100%' type='text' name='op2' value='"+op2+"'></td></tr>";

		textoEdit += "<tr><td>Opção 3:</td><td><input type='hidden' name='idop3' value='"+idop3+"'><input style='width:100%' type='text' name='op3' value='"+op3+"'></td></tr>";
		textoEdit += "<tr><td>Opção 4:</td><td><input type='hidden' name='idop4' value='"+idop4+"'><input style='width:100%' type='text' name='op4' value='"+op4+"'></td></tr>";

		textoEdit += "<tr><td colspan='2'><button class='btn btn-warning'>Alterar</button></td></tr></table></form>";
		document.getElementById('editQuest').innerHTML= textoEdit;
	}
</script>

</head>

<body>

<section id="principal">
	<p class="texto-index">Crie e Distribua seu própio formulário</p>
	<a href="index.php"><img class="img-edit" src="img/logo.png"></a>
</section>


<section id="questoes">
	<button class="btn btn-lg btn-secondary" onclick="mostrarAdd()">Adicionar itens no Formulário</button>
	<button class="btn btn-lg btn-secondary" onclick="mostrarDel()">Excluir itens no Formulário</button>
	<hr>
	<section id="add">
    	
		<section id="radio" class="escrever">
			<form method="post" action="CreateEditDeleteForm.php">
			<input type="hidden" name="acao" value="2">
			<input type="hidden" name="ID" value=<?php echo $ID; ?> >
			<label>Digite o enunciado do item:</label><br>
			<input type="text" name="C-radio" placeholder="DIGITE O ENUNCIADO AQUI..." style="width: 80%"><br><br>
			<div id="alternativas">
				<table class="table-striped table-bordered tabela60">
				<tr class="texto-tabela"><td style="width: 65%">Alternativas</td><td>Selecionar a correta</td></tr>
				<?php
					$cont=1;
					while ($cont<5) {
						echo "<tr><td>Digite o texto desta opção:<br><input type='text' name='radio-".$cont."' placeholder='DIGITE A OPÇÃO AQUI...' style='width:100%;'></td><td style='text-align:center;'><input type='radio' name='correto' id=".$cont." value=".$cont."></td></tr>";
						$cont ++;
					}
				?>
				</table><br>
			
			<input type="hidden" name="posicao" value=<?php echo $linhas; ?> >
			</div>
			<button class="btn btn-primary">Submeter Item</button>
			</form>
		</section>
	</section>
	
	<section id="del">
		<form method="post" action="CreateEditDeleteForm.php">
			<input type="hidden" name="acao" value="3">
			<input type="hidden" name="ID" value=<?php echo $ID; ?> >
			<?php
				$cont = 1;
				//MOSTRAR CAMPOS DO FORMULÁRIO
				$result=pg_query($conn,"SELECT * FROM questao_formularios WHERE id_formulario=".$ID." ORDER BY posicao");
				while($row= pg_fetch_assoc($result)){
					echo "<input type='radio' name='id' value='".$row['id']."'>";
					echo "<span class='texto-enun'>".$row['enunciado']."</span><br>";
				}
			?>		
			<button class="btn btn-primary">Submeter Item</button>
		</form>
	</section>
</section>

<section id="preview">
	<p class="texto-index">PREVIEW do Formulário</p>
	<hr>
	<section id="texto-preview">
		<?php
			//MOSTRAR CAMPOS DO FORMULÁRIO
			$result=pg_query($conn,"SELECT * FROM questao_formularios WHERE id_formulario=".$ID." ORDER BY id");
			while($row= pg_fetch_assoc($result)){
				echo "<span class='texto-enun'>".$row['enunciado']."</span><br>";
				echo "&nbsp&nbsp <input type='radio'>".$row['op1']."<br>";
				echo "&nbsp&nbsp <input type='radio'>".$row['op2']."<br>";
				echo "&nbsp&nbsp <input type='radio'>".$row['op3']."<br>";
				echo "&nbsp&nbsp <input type='radio'>".$row['op4']."<br>";
			}
		?>
	</section>
</section>

</body>

</html>
