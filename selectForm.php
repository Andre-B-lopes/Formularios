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
	<label>Selecione um Formulário para respondê-lo.</label><br><br>
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
				echo "<td><form action=\"responderForm.php\" method=\"post\"><input type=\"hidden\" name=\"ID\" value=".$row['id']."><input type=\"hidden\" name=\"nome\" value=".$row['nome']."><button class=\"btn btn-success\" type=\"submit\">Responder</button></form></td></tr>";
			}
		?>
	</table>
</section>
</body>
</html>
