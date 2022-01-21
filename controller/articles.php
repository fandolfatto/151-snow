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

function displayArticlesAdmin() {

    try {
        $articlesList = findArticles();
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher nos produits. Désolé du dérangement !";
    } finally {
        require "view/articles-admin.php";
    }

}

function removeArticle($articleid) {

    try {
        if( deleteArticle($articleid)) {
            //we get again the list of articles
            $articlesList = findArticles();
        }
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher nos produits. Désolé du dérangement !";
    } finally {
        require "view/articles-admin.php";
    }
}

function addArticle()
{
    require "view/article-add.php";
}

function addArticleItem($data) {
    try {
        $pathPhotos = "view/content/images/";
        $target = $data['inputItemAudience'];
        $photo = $_FILES['inputItemPhoto']['name'];
        if ($target == "Homme") {
            $pathPhotos .= "men_snows/";
        } else if ($target == "Femme") {
            $pathPhotos .= "women_snows/";
        } else {
            $pathPhotos .= "kid_snows/";
        }
        $pathPhotos1 = $pathPhotos;
        $pathPhotos .= $photo;

        echo $_FILES['inputItemPhoto']['tmp_name'];
        echo $_FILES['inputItemPhoto']['name'];

        $fichier = basename($_FILES['inputItemPhoto']['name']);

        if (isset($photo)) {
            //Size of file less than 1 MB
            if ($_FILES['inputItemPhoto']['size'] < 1000000) {
                if (is_uploaded_file($_FILES['inputItemPhoto']['tmp_name'])) {
                    // Notice how to grab MIME type
                    $mimeType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['inputItemPhoto']['tmp_name']);

                    // If you want to allow certain files
                    $allowedFileTypes = ['image/png', 'image/jpeg'];
                    if (!in_array($mimeType, $allowedFileTypes)) {
                        $articleErrorMessage = 'Format fichier incorrect : que png ou jpeg !';
                    } else {

                        if (move_uploaded_file($_FILES['inputItemPhoto']['tmp_name'], $pathPhotos1 . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                        {
                            if (!addArticleInDB($data, $pathPhotos)) {
                                $articleErrorMessage = "impossible d'ajouter l'article";
                            }
                        } else //Sinon (la fonction renvoie FALSE).
                        {
                            echo 'Echec de l\'upload !';
                            $articleErrorMessage = 'Echec de l\'upload !';
                        }
                    }
                }
            }
            else {
                echo 'Echec de l\'upload !';
                $articleErrorMessage = 'Echec de l\'upload ! Fichier trop gros!';
            }
        }
        //we get again the list of articles
        $articlesList = findArticles();
        require "view/articles-admin.php";
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher nos produits. Désolé du dérangement !";
    }
}


function updateArticle($articleId){
    try {
        $articlesInfo = findArticleWithId($articleId);
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher le produit demandé. Désolé du dérangement !";
    } finally {
        require "view/article-update.php";
    }
}

function updateArticleItem($data){
    try {
        if (!updateArticleInDB($data)) {
            $articleErrorMessage ="impossible de modifier l'article";
        }
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher le produit demandé. Désolé du dérangement !";
    } finally {
        //we get again the list of articles
        $articlesList = findArticles();
        require "view/articles-admin.php";
    }
}


