
		
			<div>
				<div class="dropdown">
					<button class="haut-gauche btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						Categories
					</button>
					<ul class="dropdown-menu bggristransparent" aria-labelledby="dropdownMenuButton1">
						<?php foreach($categories as $categorie){ ?>
							<li><a class="dropdown-item" href="categories.php?category=<?php echo $categorie['category'] ?>"><?php echo $categorie['category'] ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>


			<?php if(!$_SESSION){ ?>
				<div>
					<button class="haut-droite btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
						Connexion
					</button>
					<ul class="bggristransparent dropdown-menu" aria-labelledby="dropdownMenuButton3">
						
						<li>
 							<div class="dropdown-item">
								<form name="identification" method="post" action="identification.php">
									<div>             
										<label for="pseudo">Pseudo:</label></br>
										<input value="" id="pseudo" class="mt-2 mb-2" type="text" name="pseudo">
									</div>
									<div>             
										<label for="password">Mot de passe:</label></br>
										<input value="" id="password" class="mt-2 mb-2" type="password" name="password">
									</div>
									<input id="submit" class="mt-2 offset-4" type="submit" value="Connexion">
								</form>
							</div>
							<div class="text-center col-10 offset-1 text-danger alert">

								<?php if(isset($_GET['message'])){ if($_GET['message']=="pasok"){?>
									Veuillez remplir tous les champs.
								<?php }?>
								<?php if($_GET['message']=="pseudofalse"){?>
									Pseudo inconnu.
								<?php }?>
								<?php if($_GET['message']=="mdpfalse"){?>
									Mot de passe incorrect.
								<?php }}?>
							</div>
							<div class="text-center col-10 offset-1">
								<p>Pas encore de compte?</p>
							</div>
							<div class="text-center col-10 offset-1">
								<div>
									<a href="forminscription.php"> Incrivez-vous</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			<?php } ?>
			
			<?php if($_SESSION){?>
				<div>
					<div class="dropdown">
						<button class="haut-droite btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['pseudo'] ?></button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
							<li><a class="dropdown-item" href="deco.php?">Deconnexion</a></li>
							<li><a class="dropdown-item" href="articlebyauteur.php?">Articles</a></li>
							<li class="nav-item">
								<a class="dropdown-item be bg-white" href="#scrollspyHeading1">Ajouter un post</a>
							</li>
						</ul>
					</div>
				</div>
			<?php } ?>
		