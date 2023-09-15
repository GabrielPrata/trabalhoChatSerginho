<?php
include 'conn.php';
$nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
$email = mysqli_real_escape_string($conn, $_POST['emailEmail']);
$senha = mysqli_real_escape_string($conn, $_POST['passSenha']);
$cor = mysqli_real_escape_string($conn, $_POST['colorCor']);

$sql = "SELECT * FROM usuarios WHERE email='$email'";

$query = mysqli_query($conn, $sql);

$rows = mysqli_num_rows($query);

if ($rows < 1) {
    $sql = "INSERT INTO usuarios";
    $sql .= "(nome, email, senha, cor) ";
    $sql .= " VALUES('$nome', '$email', '$senha', '$cor')";

    if (mysqli_query($conn, $sql)) {
        if ($_FILES['fileFoto']['name'] != "") {
            $_UP['pasta'] = '../img/users/';
            $_UP['tamanho'] = 1024 * 1024 * 4;


            $extensao = substr($_FILES['fileFoto']['name'], -4);
            if ($extensao != ".jpg" and $extensao != ".png") {
                mysqli_close($conn);
                echo " <script language=javascript>
					window.alert('Por favor envie apenas arquivos com a extensao .PNG ou .jpg. O restante do cadastro foi conluído com sucesso!')
					window.close();
				 	</script>";
            } else if ($_UP['tamanho'] < $_FILES['fileFoto']['size']) {
                mysqli_close($conn);
                echo "
				<script language=javascript>
					window.alert('O arquivo enviado é muito grande, o tamanho máximo permitido é de 4Mb. O restante do cadastro foi conluído com sucesso!')
					window.close();
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
                window.alert('Oops! Ocorreu um erro ao subir sua imagem. O restante do cadastro foi concluído com sucesso!');
                window.close();
                </script>";
            } else {
                mysqli_close($conn);
                echo " <script language=javascript>
                window.alert('Cadastro finalizado com sucesso!');
                window.close();
                </script>";
            }
        } else {
            mysqli_close($conn);
            echo " <script language=javascript>
                window.alert('Cadastro finalizado com sucesso!');
                window.close();
                </script>";
        }
    } else {
        mysqli_close($conn);
        echo " <script language=javascript>
        window.alert('Oops! Ocorreu um erro ao finalizar seu cadastro, tente novamente mais tarde.');
        window.location='../index.php';
        </script>";
    }
} else {
    mysqli_close($conn);
    echo " <script language=javascript>
        window.alert('E-mail já cadastrado no sistema!');
        window.location='../index.php';
        </script>";
}
