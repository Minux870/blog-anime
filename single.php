<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$id=$_GET['id'];

require 'function.php';
$resultid=getArticleById($id);
$categories=getCategories();
$categories2=getArticlesByCategory2($id);
$commentslist=getCommentsById($id);
require 'header1.php';
require 'header2.php';

?>


<div class="gigadiv container">
    <div class="row">
        <div class="title2 text-center my-4 fw-bold text-primary">
            <?php echo $resultid['title'] ?>
        </div>
        <div class="col-lg-6">
            <div class="singleimg" style="background-image:url('<?php echo $resultid['image'] ?>')">
            </div>
        </div>
        <div class="col-lg-6 textsize35">
            
            <div class="fontsize">
                <?php echo $resultid['content'] ?>
            </div>

            <div class="my-3 fw-bold text-center"> 
                <div class="row">
                    <div class="col-6">
                        <?php $pseudo=getAuteur($id);
                        echo $pseudo['pseudo'] ?>
                    </div>
                    <div class="col-6">
                        <?php echo $resultid['date de publication'] ?>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center"><?php foreach($categories2 as $categorie2){ ?>
                <a class="btn btn-primary arrondi" href="categories.php?category=<?php echo $categorie2['category'] ?>"><?php echo $categorie2['category'] ?></a>
            <?php } ?></div>
            

            <?php if(isset($_SESSION['id'])){ if($resultid['auteur_id']==$_SESSION['id']){ ?>
            <div class="row">
                <div class="offset-3 col-3">
                    <div class="my-2 text-center">
                        <a class="btn btn-warning" href="singlemodif.php?id=<?php echo $id ?>">Modifier</a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="my-2 text-center">
                        <a id="btnsuppress<?php echo $id ?>" class="btnsuppress btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
            <?php }} ?>

            <div class="my-5 text-center">
                <a class="pt-2 px-4 btn btn-outline-secondary" href="index.php"><img width="50px"src="https://cdn-icons-png.flaticon.com/512/25/25694.png"></br><p class="p-0 m-0 text-black fw-bold">
                Menu</p></a>
            </div>
        </div>

        <?php if($_SESSION){?>
            <form class="text-center" name="usercomment" method="post" action="usercomment.php?id=<?php echo $id ?>" enctype='multipart/form-data'>
                    <Label class=" mb-5 display-6 text-danger">Commente ce post</Label>
                    <textarea style="width:100%;height:200px;" class="mb-5"name="usercomment" id="" ></textarea>
                    <div class="text-center mb-5">
                        <input id="submit"  type="submit" value="Comment">
                    </div>
            </form>
        <?php } ?>
        <?php if(!$_SESSION){?>
            <div class="text-center display-6 text-danger">CONNECTEZ-VOUS POUR AJOUTEZ UN COMMENTAIRE</div>
        <?php } ?>
        <div>
            <?php foreach($commentslist as $commentlist){ ?>
            <div class="row espacecomment my-5">
                <div class="col-2 py-3 fw-bold">
                    <?php echo $commentlist['pseudo'] ?>
                </div>
                <div class="offset-8 col-2 py-3">
                    <?php echo $commentlist['date de publication'] ?>
                </div>
                <div class="col-12 py-3">
                <?php echo $commentlist['contenu'] ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</div>


<?php require 'footer.php';?>