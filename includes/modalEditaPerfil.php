<div class="modal fade text-black" id="ModalEdita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php echo "<img src='" . $_SESSION['imagemPerfil'] . "' alt='" . $_SESSION['email'] . "' style='width: 45px; height: 100%; border-radius: 25px;'>"; ?>
                &nbsp;&nbsp;
                <h5 class="modal-title" id="exampleModalLabel">Dados do usuário: <?php echo $_SESSION['nome']; ?></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmEdita" class="text-center" action="salvaAlteracoes.php" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <input type="text" id="name" class="form-control" name="txtNome" value="<?php echo $_SESSION['nome'] ?>" />
                        <label class="form-label" for="name">Nome:</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="email" class="form-control" name="emailEmail" value="<?php echo $_SESSION['email'] ?>" disabled />
                        <label class="form-label" for="email">Seu E-mail:</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="senha" required="" class="form-control" name="txtSenha" value="<?php echo $_SESSION['senha'] ?>" />
                        <label class="form-label" for="senha">Senha:</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="color" id="color" required="" name="colorCor" value="<?php echo $_SESSION['cor'] ?>" />
                        <label class="form-label" for="color">Sua cor preferida:</label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="customFile" accept="image/png, image/jpg">Foto de perfil atual:</label>
                        <br>
                        <img src="<?php echo $_SESSION['imagemPerfil']; ?>" class="img-thumbnail" alt="<?php echo $_SESSION['nome'] ?>" style='width: 250px; height: 100%;' />
                        <br>
                        <?php
                        if ($_SESSION['imagemPerfil'] == "../img/users/defaultUser.png") {
                            echo '<label class="form-label text-danger" for="customFile" accept="image/png, image/jpg">Você ainda não possui uma foto de perfil!</label>';
                        } else {
                        ?>
                            <div>
                                <input class="form-check-input" type="checkbox" name="checkApagarFoto" value="true" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">Apagar minha foto de perfil</label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="fileFoto" accept="image/png, image/jpg">Nova foto de perfil:</label>
                        <input type="file" class="form-control" name="fileFoto" id="customFile" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Descartar</button>
                    <input type="submit" value="Salvar Alterações" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>