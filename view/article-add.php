<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'SnowPoint . Ajout d\'article';

ob_start();
?>

<?php if (isset($loginErrorMessage)) : ?>
    <h5><span style="color:red"><?= $loginErrorMessage; ?></span></h5>
<?php endif ?>

    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);">
        <h2 class="l-text2 t-center">
            Ajout d'article
        </h2>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">

        <div class="container">
            <div class="row">

                <div class="col-md-12 p-b-30">
                    <form class="leave-comment" action="index.php?action=articleAddItem" method="post" enctype="multipart/form-data">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Nouvel article
                        </h4>

                        <div class="bo4 of-hidden size15 m-b-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemCode" placeholder="Code de l'article" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemBrand" placeholder="Marque de l'article" required>
                         </div>

                        <div class="bo4 of-hidden size15 m-b-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemModel" placeholder="Modèle de l'article" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="inputItemLength" placeholder="Longueur de l'article" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="inputItemUnitPrice" placeholder="Prix à l'unité" required>
                        </div>
                        <div class="bo4 of-hidden size15 m-b-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="inputItemQuantity" placeholder="Quantité" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-10">
                            <!--<input class="sizefull s-text7 p-l-22 p-r-22" type="file" name="inputItemPhoto" id="photo" style="display:none;"/>
                            <label class="s-text7 p-l-22 p-r-22" for="photo" style="padding-left:20px;padding-top:12px;">Ajouter photo</label>-->
                            <input class="sizefull s-text7 p-l-22 p-r-22" style="padding-top:12px;padding-left:20px" type="file" name="inputItemPhoto" id="photo" required/>
                        </div>

                        <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden size15 m-b-10 m-t-8 s-text7" style="padding-left:20px;padding-top:12px;">
                            <select name="inputItemAudience" required>
                                <option>Pour qui?</option>
                                <option>Homme</option>
                                <option>Femme</option>
                                <option>Enfant</option>
                            </select>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="bo4 of-hidden size15 m-b-10">
                                <textarea class="sizefull s-text7 bo4" rows="4" name="inputItemDescription" placeholder="Description" required style="padding-left:20px"></textarea>
                            </div>
                        </div>

                        <div class="flex-m flex-w p-b-10">
                            <div class="bo4 of-hidden size15 m-b-10">
                                <textarea class="sizefull s-text7 bo4" rows="6" name="inputItemDescriptionFull" placeholder="Description complète" required style="padding-left:20px"></textarea>
                            </div>
                        </div>


                        <div class="flex-m flex-w p-b-10">
                            <input type="submit" value="Ajouter l'article" class="flex-c-m size11 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
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