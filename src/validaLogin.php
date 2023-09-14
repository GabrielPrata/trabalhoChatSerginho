<?php
    include 'conn.php';

    $email = mysqli_real_escape_string($conn, $_POST['emailEmail']);
    $senha = mysqli_real_escape_string($conn, $_POST['passSenha']);

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";

    $query = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($query);

    if($rows > 0){
        if(!isset($_SESSION)){
            session_start();
        }

        while($reg = mysqli_fetch_array($query)) {
            $_SESSION['id'] = $reg['id'];
            $_SESSION['nome'] = $reg['nome'];
            $_SESSION['email'] = $reg['email'];
            $_SESSION['cor'] = $reg['cor'];
            $_SESSION['senha'] = $reg['senha'];
            $_SESSION['validado'] = true;
        }

        if(file_exists('../img/users/' . $_SESSION['email'] . '.jpg')){
            $_SESSION['imagemPerfil'] = "../img/users/" . $_SESSION['email'] . ".jpg";
        
        }else if(file_exists('../img/users/' . $_SESSION['email'] . '.png')){
            $_SESSION['imagemPerfil'] = "../img/users/" . $_SESSION['email'] . ".png";
        
        }else {
            $_SESSION['imagemPerfil'] = "../img/users/defaultUser.png";
        }

        header('location: chat.php');
    }else{
        echo" <script language=javascript>
        window.alert('Usuário não encontrado!');
        history.back()
        </script>";
    }
