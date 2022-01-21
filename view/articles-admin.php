<?php
/**
 * @file      articles.php
 * @brief     File description
 * @author    Created by Frederique.ANDOLFATT
 * @version   29.11.2021
 */

$title = 'Gestion articles';

ob_start();

?>

    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);">
        <h2 class="l-text2 t-center">
            Nos snows
        </h2>
    </section>


    <!-- Content page -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->

            <?php if (isset($articleErrorMessage)) { ?>
                <h5><span style="color:#ff0000"><?= $articleErrorMessage; ?></span></h5>
            <?php } ?>

            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1">Code</th>
                            <th class="column-2">Photo</th>
                            <th class="column-2">Modèle</th>
                            <th class="column-2">Longueur</th>
                            <th class="column-2">Prix à l'unité</th>
                            <th class="column-2">Quantité</th>
                            <th class="column-2">
                                <a href="index.php?action=articleAdd"><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Ajouter
                                    </button></a>
                            </th>
                        </tr>


                        <?php foreach ($articlesList as $article) { ?>
                        <tr class="table-row">
                            <td class="column-1"><?= $article['code'];?></td>
                            <td class="column-2">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="<?= $article['photo'];?>" alt="IMG-PRODUCT">
                                </div>
                            </td>
                            <td class="column-2"><?= $article['model'];?></td>
                            <td class="column-2"><?= $article['snowlength'];?></td>
                            <td class="column-2"><?= $article['price'];?>
                            </td>
                            <td class="column-2"><?= $article['qtyAvailable'];?></td>
                            <td class="column-2">
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    <a href="index.php?action=articleRemove&code=<?=$article['code'];?>"><img src="view/content/images/icons/bin2.png" alt="delete"></a>
                                </button>
                                <br>
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    <a href="index.php?action=articleUpdate&code=<?=$article['code'];?>"><img src="view/content/images/icons/pencil2.png" alt="update"></a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>

        </div>
    </section>

<?php
    $content = ob_get_clean();
    require 'gabarit.php';
?>