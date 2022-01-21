<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   26-MAR-2021
 */

session_start();

require "controller/navigation.php";
require "controller/users.php";
require "controller/articles.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'displayArticles' :
            displayArticles();
            break;
        case 'displayArticlesAdmin' :
            displayArticlesAdmin();
            break;
        case 'displayArticleDetail' :
            displayArticleDetail($_GET['articleId']);
            break;
        case 'register' :
            register($_POST);
            break;
        case 'articleRemove' :
            removeArticle($_GET['code']);
            break;
        case 'articleUpdate' :
            updateArticle($_GET['code']);
            break;
        case 'articleUpdateItem' :
            updateArticleItem($_POST);
            break;
        case 'articleAdd' :
            addArticle();
            break;
        case 'articleAddItem' :
            addArticleItem($_POST);
            break;
        default :
            lost();
    }
} else {
    home();
}