<nav class="col-lg-1">
		
			<div class="navbar-collapse collapse sidebar-navbar-collapse">
			<div class="navbar-header">
			<a class="navbar-brand" href="#">Tables</a>
			</div>
			<ul class="nav navbar-nav">
            <?php 
			foreach ($lesTables as $uneTable){
				$nom= $uneTable['Tables_in_marieteam'];
			?>
			<li><a href="index.php?uc=donnee&action=detailSecteur&idSecteur=<?php echo $nom; ?>"><?php echo $nom; ?></a></li>
			<?php } ?>
			</ul>
			</div><!--/.nav-collapse -->
			
</nav>