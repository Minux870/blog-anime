<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'function.php';
$articles=getArticles();
$categories=getCategories();
require 'header1.php';
require 'header2.php';
?>

<div class="row">
    <div class="position-fixed col-4 offset-4">
        <div class="search">
            <input class="text-center arrondi fw-bold" style="width:100%; height:50px;" id="search" name="search" value="Recherchez votre anime préféré" type="text">
        </div>
        <div class="getborders" style="overflow-x:hidden; overflow-y: auto; height:200px;">
            
                <?php foreach($articles as $article){ ?>
                    <div class="suggestbg">
                        <a href="single.php?id=<?php echo $article["id"] ?>" hidden class="aa suggest<?php echo $article["id"] ?> bgtrans"></a>
                    </div>
                <?php } ?>
            
        </div>
    </div>
</div>



<div class="container">
    <div class="row">

        <?php foreach($articles as $article){ ?>
            <div class="d-flex my-sm-3 col-sm-10 col-md-4 offset-1 col-lg-3 carte" style="background-image:url('<?php echo $article['image'] ?>')">
                <div class="bodytext fw-bold text-center"> 
                    <div class="title">
                        <?php echo $article['title'] ?>
                    </div>

                    <div class="lightpink petitcomment">
                        <?php echo $article['petit'] ?>
                    </div>

                    <div class="row">
                        <div class="text-danger notimportant col-6 auteur">
                            <?php $id=$article['id'];
                            $pseudo=getAuteur($id);
                            echo $pseudo['pseudo'] ?>
                        </div>
                        <div class="text-danger notimportant col-6 date">
                            <?php echo $article['date de publication'] ?>
                        </div>
                    </div>

                    <div class="bouton">
                        <a href="single.php?id=<?php echo $article['id'] ?>" class="btn btn-primary">Voir Plot</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <!-- FORMULAIRE D'AJOUT-->
    <?php if (!$_SESSION){ ?>
    <div><p class="display-6 text-danger text-center">CONNECTEZ-VOUS POUR AJOUTER UN ANIME</p>
    <?php } ?>
    <?php if ($_SESSION){ ?>
    <div><p class="display-6 text-danger text-center">REMPLISSEZ LES CHAMPS POUR AJOUTER UN ANIME POUR AJOUTER UN ANIME</p>
    <?php } ?>
    <?php if ($_SESSION){ ?>
        <form id="scrollspyHeading1" name="add" method="post" action="traitement.php" enctype='multipart/form-data'>
            
            <div class="row">             
                <label for="title">Titre</label>
                <div>
                    <input style="width:35%; height:40px;" value="" id="title" class="mt-2 mb-2 bg-input" type="text" name="title">
                </div>
            </div>
            
            <div class="row">             
                <label for="image">Chemin de l'image:</label>
                <div>
                    <input style="width:50%; height:40px;" value="" id="image" class="mt-2 mb-2 bg-input" type="text" name="image">
                </div>
            </div>
            
            <div class="row">             
                <label for="petit">Synthèse</label>
                <div>
                    <input style="width:50%; height:40px;" value="" id="petit" class="mt-2 mb-2 bg-input" type="text" name="petit">
                </div>
            </div>

            <div>
                <label for="type">Catégories:</label>
                <div class="row">
                    <?php $getallcategories=getAllCategories();
                    foreach($getallcategories as $getallcategorie){;?>
                    <div class="col-4">
                        <input id="checkbox" value="<?php echo $getallcategorie['id'] ?>" class="mt-2 mb-2 type" type="checkbox" name="category<?php echo $getallcategorie['id'] ?>">
                        <label for="type"><?php echo $getallcategorie['category'] ?></label>
                    </div>
                    <?php } ?>
                    <div class="col-4">
                        <label for="addcategory">Autre catégorie</label>
                        <input id="addcategory" value="" class="mt-2 mb-2 type bg-input" type="text" name="addcategory">
                        <button class="btn btn-primary" value="" id="btncategory" name="btncategory">Ajouter</button>
                    </div>
                </div>
            </div>

            <div>             
                <label for="content">Commentaire</label>
                <div class="row">
                    <input style="height:100px;" value="" id="content" class="mt-2 mb-2 bg-input" type="text" name="content">
                </div>
            </div>
            <!--<div>             
                <label for="date de publication">Date</label>
                <input value="" id="date de publication" class="nes-input mt-2 mb-2" type="date" name="date de publication">
            </div>-->
            <input id="submit" class="mt-5 mb-5 col-2 offset-5" type="submit" value="Ajouter">
        </form>
    <?php } ?>
    </div>
</div>






<?php require 'footer.php';?>