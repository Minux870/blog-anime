<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'function.php';
require 'header1.php';
?>

    <div class="row pt-5">
        <div class="col-4"><img width="100%"src="https://media3.giphy.com/media/naiatn5LxTOsU/200w.webp?cid=ecf05e47fuwg759pzzqhlp8d83q9v2qjodbawbp4f8bqztkq&rid=200w.webp&ct=g"></div>
        <div class="col-4 text-center forminscription py-lg-5 py-0">
            <form name="forminscription" method="post" action="inscription.php">
                <div class="pt-lg-5">             
                    <label for="pseudo">Pseudo:</label>
                    <input value="" style="width:100%;" id="pseudo" class="my-0 my-lg-3" type="text" name="pseudo">
                </div>
                <div>             
                    <label for="email">Email</label>
                    <input value="" style="width:100%;" id="email" class="my-0 my-lg-3" type="text" name="email">
                </div>
                <div>             
                    <label for="password">Mot de passe:</label>
                    <input value="" style="width:100%;" id="password" class="my-0 my-lg-3" type="password" name="password">
                </div>
                <input id="submit" style="width:100%;" class="mt-4 mb-2" type="submit" value="inscription">
            </form>
        </div>
        <div class="col-4"><img width="100%"src="https://media3.giphy.com/media/naiatn5LxTOsU/200w.webp?cid=ecf05e47fuwg759pzzqhlp8d83q9v2qjodbawbp4f8bqztkq&rid=200w.webp&ct=g"></div>
    </div>

