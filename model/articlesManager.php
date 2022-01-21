<?php
/**
 * @file      articlesManager.php
 * @brief     File description
 * @author    Created by Frederique.ANDOLFATT
 * @version   29.11.2021
 */

function findArticles()
{
    $articlesQuery = "SELECT id, brand, model, code, qtyAvailable, price, photo, snowlength from snows";

    require_once 'model/dbConnector.php';
    $params = array();
    return executeQuerySelect($articlesQuery,$params);

}

function findArticleWithId($articleId)
{
    $articleQuery = "SELECT id, brand, model, code, qtyAvailable, price, photo, description, descriptionfull, snowlength, level, audience from snows where code = :code";

    require_once 'model/dbConnector.php';
    $params = array(":code"=>$articleId);
    $articlesDetail = executeQuerySelect($articleQuery,$params);

    return $articlesDetail[0];

}

function deleteArticle($articleId)
{
    $articleQuery = "delete from snows where code = :code";

    require_once 'model/dbConnector.php';
    $params = array(":code"=>$articleId);
    return executeQueryInsert($articleQuery,$params);

}

function addArticleInDB($data, $pathPhotos)
{

    $articleQuery = "INSERT INTO `snows` (code, brand, model, snowLength, audience, qtyAvailable, price, description, descriptionFull, active, photo) VALUES
                    (:code, :brand, :model, :length, :target, :qty, :unitprice, :desc, :descFull , 1, :photo)";
    require_once 'model/dbConnector.php';

    //TODO télécharger image + vérifier format

    $params = array(":code"=>$data['inputItemCode'], ":brand"=>$data['inputItemBrand'], ":model"=>$data['inputItemModel'], ":length"=>$data['inputItemLength'], ":qty"=>$data['inputItemQuantity'], ":unitprice"=>$data['inputItemUnitPrice'], ":target"=> $data['inputItemAudience'], ":photo"=>$pathPhotos, ":desc" => $data['inputItemDescription'], ":descFull" => $data['inputItemDescriptionFull'] );
    return executeQueryInsert($articleQuery,$params);

}

function updateArticleInDB($data)
{

    $articleQuery = "update snows set brand = :brand, model = :model, snowLength=:length, audience=:target, qtyAvailable=:qty, price=:unitprice, description=:desc, descriptionFull=:descFull, 
                 active = 1 where code = :code";
    require_once 'model/dbConnector.php';

    $params = array(":code"=>$data['inputItemCode'], ":brand"=>$data['inputItemBrand'], ":model"=>$data['inputItemModel'], ":length"=>$data['inputItemLength'], ":qty"=>$data['inputItemQuantity'], ":unitprice"=>$data['inputItemUnitPrice'], ":target"=> $data['inputItemAudience'], ":desc" => $data['inputItemDescription'], ":descFull" => $data['inputItemDescriptionFull'] );
    return executeQueryInsert($articleQuery,$params);

}

