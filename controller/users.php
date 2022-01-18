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
        //if (checkLogin($data)) {
        if (isLoginCorrect($data['email'], $data['userPswd'])) {
            createSession($data['email']);
            require "view/home.php";
        } else {
            $errorMsg = "Erreur email ou mot de passe incorrect";
            require "view/login.php";
        }
    } else { //we ask login page
        require "view/login.php";
    }
}


function register($loginInfo) {

    if (isset($loginInfo['userPswd']) && isset($loginInfo['email']) && isset($loginInfo['userPswd2'])) {
        if ($loginInfo['userPswd'] != $loginInfo['userPswd2']) {
            $errorMsgRegister = "Pwd différents";
            require "view/register.php";
        } else {
            if (registerLogin($loginInfo["email"], $loginInfo["userPswd"])) {
                createSession($loginInfo["email"]);
                require "view/home.php";
            } else {
                $errorMsgRegister = "Erreur insertion user";
                require "view/register.php";
            }
        }
    } else {
        require "view/register.php";
    }
}

function createSession($email) {
    $_SESSION['email'] = $email;
}

function logout()
{
    session_destroy();
    $_SESSION = array();
    require "view/home.php";
}
