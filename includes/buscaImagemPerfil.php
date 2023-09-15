<?php
    function buscaImagemPerfil(){
        if(file_exists('../img/users/' . $_SESSION['email'] . '.jpg')){
            $_SESSION['imagemPerfil'] = "../img/users/" . $_SESSION['email'] . ".jpg";
        
        }else if(file_exists('../img/users/' . $_SESSION['email'] . '.png')){
            $_SESSION['imagemPerfil'] = "../img/users/" . $_SESSION['email'] . ".png";
        
        }else {
            $_SESSION['imagemPerfil'] = "../img/users/defaultUser.png";
        }
    }
