<?php
require_once("CONN/conn.php");
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
	<a href="index.php"><img class="img-index" src="img/logo.png"></a>
</section>

<section id="criar">
	<form action="CreateEditDeleteForm.php" method="post">
		<label>Titulo do Formulário:</label>
		<input type="text" name="titulo" placeholder="DIGITE O TÍTULO">
		<input type="hidden" name="acao" value="1">
		<button class="btn-criar btn-success" type="submit">CRIAR</button>
	</form>
</section>

<section id="criar">
	<label>Selecione o Formulário para edita-lo, caso não haja opções crie um formulário na opção acima.</label><br><br>
	<table class="table-striped table-bordered tabela30">
		<tr><td style="width: 85%">
			<p class="texto-tabela"><b>Titulo do Formulário</b></p>	
		</td><td>
			<p></p>
		</td></tr>
		<?php
			$result=pg_query($conn, "SELECT * FROM formularios");
			while($row=pg_fetch_array($result)){
				echo "<tr><td>".$row['nome']."</td>";
				echo "<td><form action=\"editaForm.php\" method=\"post\"><input type=\"hidden\" name=\"ID\" value=".$row['id']."><button class=\"btn btn-success\" type=\"submit\">EDITAR</button></form></td></tr>";
			}
			//<input type="radio" name="titulo">
		?>
	</table>
</section>

</body>
</html>
