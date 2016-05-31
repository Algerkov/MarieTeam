<nav class="col-lg-1">
		
			<div class="navbar-collapse collapse sidebar-navbar-collapse">
			<div class="navbar-header">
			<a class="navbar-brand" href="#">Secteurs</a>
			</div>
			<ul class="nav navbar-nav">
            <?php 
			foreach ($lesSecteurs as $unSecteur){
				$nom= $unSecteur['nom'];
				$id= $unSecteur['id'];
			?>
			<li><a href="index.php?uc=donnee&action=detailSecteur&idSecteur=<?php echo $id; ?>"><?php echo $nom; ?></a></li>
			<?php } ?>
			</ul>
			</div><!--/.nav-collapse -->
			
</nav>