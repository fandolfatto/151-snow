<?php

/**
 * @file      users.php
 * @brief     File description
 * @author    Created by Frederique.ANDOLFATT
 * @version   16.11.2021
 */

require "model/userMgt.php";

function login($data) {
    //check if email is set, if we come from the login page and click on the login button
    if (isset($data['email'])) {
        //TO DO : traiter le retour du checklogin pour la redirection
        if (checkLogin($data)) {
            $_SESSION['email']=$data['email'];
            require "view/home.php";
        } else {
            $errorMsg = "Erreur email ou mot de passe incorrect";
            require "view/login.php";
        }
    } else { //we ask login page
        require "view/login.php";
    }
}

function logout()
{
    session_destroy();
    $_SESSION = array();
    require "view/home.php";
}
