<?php
			session_start();
			$_SESSION['logged_in']="admin";
			if($_SESSION['logged_in'] ==="client")
			{
				?>
					<ul class="menu">
						<li> <a href="index.php" >Accueil</a></li>
						<li> <a href="products.html" >Produits</a></li>
						<li> <a href="basket.html" >Panier</a></li>
						<li> <a href="logout.php" >Déconnexion</a></li>
					</ul>
				<?php
			}
			else if($_SESSION['logged_in'] ==="admin")
			{
				?>
					<ul class="menu">
						<li> <a href="index.php" >Accueil</a></li>
						<li> <a href="products.html" >Produits</a></li>
						<li> <a href="basket.html" >Panier</a></li>
						<li> <a href="admin.html" >Administration</a></li>
					</ul>
				<?php
			}
			else
			{
				?>
					<ul class="menu">
						<li> <a href="index.php" >Accueil</a></li>
						<li> <a href="products.html" >Produits</a></li>
						<li> <a href="basket.html" >Panier</a></li>
						<li> <a href="login.html" >Connexion</a></li>
						<li> <a href="register.html" >Inscription</a></li>
					</ul>
				<?php
			}			
?>