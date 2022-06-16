<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'function.php';
$articles=getArticlesByAuteur();
$categories=getCategories();
require 'header1.php';
require 'header2.php';
?>

<div class="container">
    <div class="row">

        <?php foreach($articles as $article){?>
            <div class="d-flex my-sm-3 col-sm-10 col-md-4 offset-1 col-lg-3 carte" style="background-image:url('<?php echo $article['image'] ?>')">
                <div class="bodytext fw-bold text-center"> 
                    <div class="title">
                        <?php echo $article['title'] ?>
                    </div>
                    <div class="row">
                        <div class="col-6 auteur">
                            <?php $id=$article['id'];
                            $pseudo=getAuteur($id);
                            echo $pseudo['pseudo'] ?>
                        </div>
                        <div class="col-6 date">
                            <?php echo $article['date de publication'] ?>
                        </div>
                    </div>
                    <div class="petitcomment">
                        <?php echo $article['petit'] ?>
                    </div>
                    <div class="bouton">
                        <a href="single.php?id=<?php echo $article['id'] ?>" class="btn btn-primary">Voir Plot</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="my-5 text-center">
            <a class="pt-2 px-4 btn btn-outline-secondary" href="index.php"><img width="50px"src="https://cdn-icons-png.flaticon.com/512/25/25694.png"></br><p class="p-0 m-0 text-black fw-bold">
            Menu</p></a>
        </div>
    </div>
</div>

<?php require 'footer.php';?>