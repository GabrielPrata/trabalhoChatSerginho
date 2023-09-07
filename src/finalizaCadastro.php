<?php
include 'conn.php';
$nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
$email = mysqli_real_escape_string($conn, $_POST['emailEmail']);
$senha = mysqli_real_escape_string($conn, $_POST['passSenha']);
$cor = mysqli_real_escape_string($conn, $_POST['colorCor']);

$sql = "INSERT INTO usuarios";
$sql .= "(nome, email, senha, cor) ";
$sql .= " VALUES('$nome', '$email', '$senha', '$cor')";

if (mysqli_query($conn, $sql)) {
    $_UP['pasta'] = '../img/users';
    $_UP['tamanho'] = 1024 * 1024 * 4;
    $_UP['renomeia'] = true;


    $extensao = substr($_FILES['fileFoto']['name'], -4);
    if ($extensao != ".jpg" and $extensao != ".png") {
        echo " <script language=javascript>
					window.alert('Por favor envie apenas arquivos com a extensao .PNG ou .jpg')
					window.history.back()
				 	</script>";
    } else if ($_UP['tamanho'] < $_FILES['fileFoto']['size']) {
        echo "
				<script language=javascript>
					window.alert('O arquivo enviado é muito grande, o tamanho máximo permitido é de 4Mb.')
					window.history.back()
				</script>
				";
    } else {
        
        if($extensao == ".jpg"){
            $nome_final = $nome . $email . '.jpg';
        }else {
            $nome_final = $nome . $email . '.png';
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
    if($upload == false){
        echo " <script language=javascript>
        window.alert('Oops! Ocorreu um erro ao subir sua imagem, tente novamente mais tarde.');
        </script>";
    die();
    }

    echo " <script language=javascript>
        window.alert('Cadastro finalizado com sucesso!');
        history.back()
        </script>";
    die();
    
} else {
    echo " <script language=javascript>
    window.alert('Oops! Ocorreu um erro ao finalizar seu cadastro, tente novamente mais tarde.');
    //history.back()
    </script>";
die();
}
