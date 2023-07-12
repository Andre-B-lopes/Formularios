<?php
require_once("CONN/conn.php");

if($_POST['ID']){$ID = $_POST['ID'];}else{$ID = '0';}
if($_POST['nome']){$nome = $_POST['nome'];}else{$nome = '0';}

?>
<html>
<head>
<link href="CSS/bootstrap.min.css" rel="stylesheet">
<link href="CSS/responsivo.css" rel="stylesheet">
<title>FORMULÁRIOS</title>

</head>

<body>

<section id="principal">
	<p class="texto-index">Crie e Distribua seu própio formulário</p>
	<a href="index.php"><img class="img-edit" src="img/logo.png"></a>
</section>

<section id="formulario">
	<form method="post" action="index.php">
		<p class="titulo">Formulário - <?php echo $nome; ?></p>
		<hr>
		<?php
			$cont = 1;
			//MOSTRAR CAMPOS DO FORMULÁRIO
			$result=pg_query($conn,"SELECT * FROM questao_formularios WHERE id_formulario=".$ID." ORDER BY id");
			while($row= pg_fetch_assoc($result)){
				echo "<span class='texto-enun'>".$row['enunciado']."</span><br>";
				echo "&nbsp&nbsp <input type='radio' name='q".$cont."'>".$row['op1']."<br>";
				echo "&nbsp&nbsp <input type='radio' name='q".$cont."'>".$row['op2']."<br>";
				echo "&nbsp&nbsp <input type='radio' name='q".$cont."'>".$row['op3']."<br>";
				echo "&nbsp&nbsp <input type='radio' name='q".$cont."'>".$row['op4']."<br>";
				echo "<hr>";
				$cont ++;
			}
		?>
		<button class="btn btn-primary">Enviar Respostas</button>
	</form>
</section>

</body>

</html>
