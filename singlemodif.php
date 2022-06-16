<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$id=$_GET['id'];

require 'function.php';
$resultid=getArticleById($id);
$categories=getCategories();
$categories2=getArticlesByCategory2($id);
require 'header1.php';

?>
<form name="modif" method="post" action="modif.php?<?php $id ?>" enctype='multipart/form-data'>
    <div class="row">
        <div class="mt-5 col-2 offset-10">
            <button type="submit" class="px-4 py-3 btn text-success bgfixe">Sauvegarder</button>
        </div>
    </div>
    <div class="gigadiv container">
            <div class="row">
                <div class="col-6">
                    <input name="id" hidden value="<?php echo $id ?>" >
                    <textarea name="image" rows="1" cols="30"><?php echo $resultid['image'] ?></textarea>
                    <div class="singleimg" style="background-image:url('<?php echo $resultid['image'] ?>')">
                    </div>
                    <div class="unpeuplusgros text-primary mb-3 fw-bold text-center col-6 offset-3">
                        <label class="mt-4" for="type">Commentaire pre-plot:</label>
                    </div>
                    <div class="col-6 offset-3">
                        <textarea name="petit" rows="1" cols="30"><?php echo $resultid['petit'] ?></textarea>
                    </div>
                </div>
                <div class="col-6 display-6">
                    <div class="title text-center display-5 fw-bold text-primary">
                        <textarea name="title" rows="1" cols="3"><?php echo $resultid['title'] ?></textarea>
                    </div>
                    <div class="mx-3 my-3 fw-bold text-center"> 
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
                    <div class="fontsize row-10">
                        <textarea name="content" rows="10" cols="30" type="text"><?php echo $resultid['content'] ?></textarea>
                    </div>

                    
                    <label class="mt-4" for="type">Catégories:</label>
                    <div class="row my-4">
                        <?php $getallcategories=getAllCategories();
                        foreach($getallcategories as $getallcategorie){
                            if($getallcategorie['id']!=0){?>
                                <div class="col-3 my-2 text-15">
                                    <?php $catid=$getallcategorie['id'];$compcat=compcat($id, $catid);
                                        if($compcat!=false){?>
                                        <input id="checkbox" checked value="<?php echo $getallcategorie['id'] ?>" class="mt-2 mb-2" type="checkbox" name="category<?php echo $getallcategorie['id'] ?>">
                                        <label><?php echo $getallcategorie['category']; ?></label>
                                    <?php }else{?>
                                        <input id="checkbox" value="<?php echo $getallcategorie['id'] ?>" class="mt-2 mb-2" type="checkbox" name="category<?php echo $getallcategorie['id'] ?>">
                                        <label><?php echo $getallcategorie['category']; ?></label>
                                    <?php } ?>
                                </div>
                        <?php }} ?>
                    </div>
                    

                    
                </div>
            </div>

    </div>
</form>

<?php require 'footer.php';?>