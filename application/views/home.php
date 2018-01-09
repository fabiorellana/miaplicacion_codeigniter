<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mi página web</title>
</head>
<body>
	<h1>Bienvenidos a mi web</h1>
	<p>Esto son los ultimos articulos publicados</p>

	<?php
	while($fila = mysql_fetch_array($rs_articulos)){
		echo '<p>';
		echo '<a href="' . site_url('/articulos/muestra/' . $fila['id']) . '">' . $fila['titulo'] . '</a>';
		echo '</p>';
	} 
	?>
</body>
</html>