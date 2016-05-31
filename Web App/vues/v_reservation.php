        <section class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12">

			<?php
								 
				echo "Liaison ".$depChoix['nom']." - ".$arrChoix['nom'];
				echo "Traversée n°".$numTr;
				echo " le ". $dateTr;
				echo " à ". $heureTr;
				?>
				<form class="form-horizontal col-lg-8" role="form" method="post" action="index.php?uc=donnee&action=validerReservation">
					<div class="form-group">
						<legend>Saisissez les informations relatives à la réservation</legend>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="text" class="col-lg-2 control-label"> Nom *: </label>
								<div class="col-lg-4">
								<input type="text" class="form-control" id="text" name="nom">
								</div>
						</div>
					</div>
					<div class="row">
					  <div class="form-group">
						<label for="textarea" class="col-lg-2 control-label"> Adresse *: </label>
						 <div class="col-lg-8">
							<input type="textarea" class="form-control" id="textarea" name="adresse">
						  </div>
						</div>
					</div>
					
					<div class="row">
					  <div class="form-group">
						<label for="textarea" class="col-lg-2 control-label"> CP *: </label>
						 <div class="col-lg-3">
							<input type="textarea" class="form-control" id="textarea" name="cp">
						  </div>
						<label for="textarea" class="col-lg-2 control-label"> Ville *: </label>
						 <div class="col-lg-3">
							<input type="textarea" class="form-control" id="textarea" name="ville">
						  </div>
						</div>
					</div>
					
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th>  </th>
								<th> Tarif en € </th>	
								<th> Quantité </th>	
							</tr>
						</thead>
						<tbody>
						<?php
							for ($i=0; $i<$nbTypes;$i++){
					
						?>
							<tr>
								<th><?php echo $types[$i]['libelle'];?></th>
								<th><?php echo $tarifs[$i];?></th>
								<th><input type="number" class="form-control" id="textarea" name="qte<?php echo $types[$i]['libelle'];?>"></th>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
					<div class="form-group">
						<button class="btn btn-default pull-right">Envoyer</button>
					</div>
				</form>
				
			</div>
			
        </section>

      </div>

 