<?php

/**
 * @file      userMgt.php
 * @brief     File description
 * @author    Created by Frederique.ANDOLFATT
 * @version   19.11.2021
 */

function checkLogin($data) {
    //get json file, save as an associated array the content of the json file, read this content
    //check if the value set by ths user is in this array

    $jsonUsers = file_get_contents("C:/temp/users.json"); // a directory on the web server
    $tabUsers = json_decode($jsonUsers, true);
    $email = $data['email'];
    $pwd = $data['userPswd'];
    foreach ($tabUsers as $key => $tabUsersInter) {     // another way to do it : $tabUsersInter = $tabUsers["logins"];
        foreach ($tabUsersInter as $entry => $tabLogin) {
            if (in_array($email, $tabLogin, true) &&  in_array($pwd, $tabLogin, true)) {
                return true;
            }
        }
    }
    return false;

}