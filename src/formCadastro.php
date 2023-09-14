<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatzinho foda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <form name="configs" class="text-center" method="post" action="finalizaCadastro.php" id="formCadastro" enctype="multipart/form-data">
            <h3>Novo cadastro</h3>
            <br>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="name" class="form-control" name="txtNome"/>
                <label class="form-label" for="name">Nome:</label>
            </div>

            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="emailEmail"/>
                <label class="form-label" for="email">Seu E-mail:</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="senha" required="" class="form-control" name="passSenha"/>
                <label class="form-label" for="senha">Senha:</label>
            </div>

            <div class="form-outline mb-4">
                <input type="color" id="color" required="" name="colorCor"/>
                <label class="form-label" for="color">Sua cor preferida:</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="mb-4">
                <label class="form-label" for="customFile" accept="image/png, image/jpg" >Sua foto de perfil:</label>
                <input type="file" class="form-control" name="fileFoto" id="customFile" />

            </div>

            <input type="submit" class="btn btn-success btn-lg" name="btn_envia" value="Entrar">
        </form>
    </div>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>