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

/**
 * @brief This function is designed to verify user's login
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : users's password
 * @return bool : "true" only if the user and psw match the database. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;

    $loginQuery = "SELECT userHashPsw FROM users WHERE userEmailAddress =:femail";

    require_once 'model/dbConnector.php';
    $params = array(':femail' => $userEmailAddress);
    $queryResult = executeQuerySelect($loginQuery,$params);

    if (count($queryResult) == 1) {
        $userHashPsw = $queryResult[0]['userHashPsw'];
        //if password is not hashed
        //$result = ($userPsw == $userHashPsw);
        $result = password_verify($userPsw, $userHashPsw);
    }
    return $result;
}

function registerLogin($email, $pwd){
    $result = false;

    $loginQuery = "insert into users(userEmailAddress, userHashPsw, isAdmin) VALUES	(:femail, :fpwd, 0)";

    $userHashPsw = password_hash($pwd, PASSWORD_DEFAULT);

    require_once 'model/dbConnector.php';
    $params = array(':femail' => $email,':fpwd' => $userHashPsw);
    return executeQueryInsert($loginQuery,$params);

}
