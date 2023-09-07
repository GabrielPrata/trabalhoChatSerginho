<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatzinho foda</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
	<link rel="stylesheet" href="css/mdb.min.css" />
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<form name="configs" class="text-center" method="post" action="src/chat.php?veioForm=1" id="formLogin">
			<h3>Chat do Serginho inho</h3>
			<br>
			<!-- Email input -->
			<div class="form-outline mb-4">
				<input type="email" id="email" class="form-control" />
				<label class="form-label" for="email">Seu E-mail</label>
			</div>

			<!-- Password input -->
			<div class="form-outline mb-4">
				<input type="password" id="senha" class="form-control" />
				<label class="form-label" for="senha">Senha</label>
			</div>

			<!-- 2 column grid layout for inline styling -->
			<div class="row mb-4">
				<div class="col">
					<!-- Simple link -->
					<a href="src/formCadastro.php" target="_blank" style="color: #3b71ca">Ainda não possui um cadastro?</a>
				</div>
			</div>

			<input type="submit" class="btn btn-success btn-lg" name="btn_envia" value="Entrar">
		</form>
	</div>
	<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>