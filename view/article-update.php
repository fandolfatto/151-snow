<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'SnowPoint . Modification d\'article';

ob_start();
?>

<?php if (isset($loginErrorMessage)) : ?>
    <h5><span style="color:red"><?= $loginErrorMessage; ?></span></h5>
<?php endif ?>

    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);">
        <h2 class="l-text2 t-center">
            Modification d'article
        </h2>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">

        <div class="container">
            <div class="row">

                <div class="col-md-12 p-b-30">
                    <form class="leave-comment" action="index.php?action=articleUpdateItem" method="post" enctype="multipart/form-data">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Modification d'article
                        </h4>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Code
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemCode" value="<?=$articlesInfo['code']?>" readonly>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Marque
                            </div>

                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemBrand" value="<?=$articlesInfo['brand']?>" required>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Modèle
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemModel" value="<?=$articlesInfo['model']?>" required>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Longueur
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemLength"  value="<?=$articlesInfo['snowlength']?>" required>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Prix à l'unité
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="inputItemUnitPrice" value="<?=$articlesInfo['price']?>" required>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Quantité
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="inputItemQuantity" value="<?=$articlesInfo['qtyAvailable']?>" required>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Audience
                            </div>
                            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden size15 m-b-10 m-t-8 s-text7" style="padding-left:20px;padding-top:12px;">
                                <select name="inputItemAudience" required>
                                    <?php if ($articlesInfo['audience'] == "Homme") { ?>
                                        <option selected>Homme</option>
                                    <?php } else { ?>
                                         <option>Homme</option>
                                    <?php } ?>
                                    <?php if ($articlesInfo['audience'] == "Femme") { ?>
                                        <option selected>Femme</option>
                                    <?php } else { ?>
                                        <option>Femme</option>
                                    <?php } ?>
                                    <?php if ($articlesInfo['audience'] == "Enfant") { ?>
                                        <option selected>Enfant</option>
                                    <?php } else { ?>
                                        <option>Enfant</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Description
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <textarea class="sizefull s-text7 bo4" rows="4" name="inputItemDescription" required style="padding-left:20px"> <?=$articlesInfo['description']?>
                                </textarea>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="s-text15">
                                Description complète
                            </div>
                            <div class="bo4 of-hidden size15 m-b-10">
                                <textarea class="sizefull s-text7 bo4" rows="6" name="inputItemDescriptionFull" required style="padding-left:20px"> <?=$articlesInfo['descriptionfull']?>
                                </textarea>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                        <input type="submit" value="Modifier l'article" class="flex-c-m size11 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                        &nbsp;
                        <input type="button" value="Annuler" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4" onclick="location.href='index.php?action=displayArticlesAdmin';">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>