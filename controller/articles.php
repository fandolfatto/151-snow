<?php
/**
 * @file      articles.php
 * @brief     File description
 * @author    Created by Frederique.ANDOLFATT
 * @version   29.11.2021
 */

require "model/articlesManager.php";

function displayArticles() {

    try {
        $articlesList = findArticles();
    } catch (Exception $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher nos produits. Désolé du dérangement !";
    } finally {
        require "view/articles.php";
    }

}

function displayArticleDetail($articleId) {
    try {
        $articlesInfo = findArticleWithId($articleId);
    } catch (Exception $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher le produit demandé. Désolé du dérangement !";
    } finally {
        require "view/article-detail.php";
    }

}


