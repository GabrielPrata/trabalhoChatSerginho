<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatzinho foda</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
	<link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
	<form name="configs" method="post" action="src/chat.php?veioForm=1">
		Teu nome, arrombado:
		<br>
		<input type="text" name="txt_nome" required>
		<br>
		<br>
		Escolha uma cor para o seu nick:
		<br>
		<input type="color" name="color" id="colorInput">
		<br>
		<p id="rgbValue"></p>
		<br>
		<input type="submit" name="btn_envia" value="Entrar">
	</form>
	<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>