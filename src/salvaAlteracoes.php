<?php
include 'conn.php';
include '../includes/buscaImagemPerfil.php';

$nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
$senha = mysqli_real_escape_string($conn, $_POST['txtSenha']);
$cor = mysqli_real_escape_string($conn, $_POST['colorCor']);

if (!isset($_SESSION)) {
    session_start();
}

$email = $_SESSION['email'];

if (!isset($_SESSION['validado']) or $_SESSION['validado'] != true) {
    mysqli_close($conn);
    echo " <script language=javascript>
			window.alert('Faça login no sistema para continuar navegando.')
			window.history.back()
			</script>";
    die();
}

if (!isset($_POST['checkApagarFoto']) or $_POST['checkApagarFoto'] == "") {
    $_POST['checkApagarFoto'] = false;
}

$apagaFoto = $_POST['checkApagarFoto'];

$sql = "UPDATE usuarios SET ";
$sql .= " nome = '$nome', senha = '$senha', cor = '$cor' ";
$sql .= " WHERE email = '" . $_SESSION['email'] . "'";

if (mysqli_query($conn, $sql)) {
    if ($apagaFoto == true) {
        unlink($_SESSION['imagemPerfil']);
    } else {
        if ($_FILES['fileFoto']['name'] != "") {
            $_UP['pasta'] = '../img/users/';
            $_UP['tamanho'] = 1024 * 1024 * 4;


            $extensao = substr($_FILES['fileFoto']['name'], -4);
            if ($extensao != ".jpg" and $extensao != ".png") {
                mysqli_close($conn);
                echo " <script language=javascript>
                        window.alert('Por favor envie apenas arquivos com a extensao .PNG ou .jpg. O restante do cadastro foi consluído com sucesso!')
                        window.location='chat.php';
                         </script>";
            } else if ($_UP['tamanho'] < $_FILES['fileFoto']['size']) {
                mysqli_close($conn);
                echo "
                    <script language=javascript>
                        window.alert('O arquivo enviado é muito grande, o tamanho máximo permitido é de 4Mb.')
                        window.location='chat.php';
                    </script>
                    ";
            } else {

                if ($extensao == ".jpg") {
                    $nome_final = $email . '.jpg';
                } else {
                    $nome_final = $email . '.png';
                }

                if (move_uploaded_file($_FILES['fileFoto']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                    $upload = true;
                } else {
                    $upload = false;
                }
            }
            if (!isset($upload) or $upload == "") {
                $upload = false;
            }
            if ($upload == false) {
                mysqli_close($conn);
                echo " <script language=javascript>
                window.alert('Oops! Ocorreu um erro ao atualizar a sua imagem, tente novamente mais tarde.');
                window.location='chat.php';
                </script>";
            }
        }
    }



    mysqli_close($conn);
    $_SESSION['nome'] = $nome;
    $_SESSION['cor'] = $cor;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $nome;

    buscaImagemPerfil();

    echo " <script language=javascript>
            window.alert('Alterações salvas com sucesso!');
            window.location='chat.php';
            </script>";
} else {
    mysqli_close($conn);
    echo "<script language=javascript>
        window.alert('Oops! Ocorreu um erro ao atualizar seu cadastro, tente novamente mais tarde.');
        window.location='chat.php';
        </script>";
}
