
        <section class="col-lg-10 col-lg-offset-1">
			<form class="form-horizontal col-lg-11 role="form" method="post" action="index.php?uc=donnee&action=detailSecteur">
				<p>Sélectionner la liaison, et la date souhaitée :</p>
				<div class="form-group col-lg-4">
				<select id="select" name="codeLiaison" class="form-control">
					<?php 
					foreach ($portsDep as $unPortDep){
					$pDep[] = $unPortDep['nom'];
					}
					
					foreach ($portsArr as $unPortArr){
					$pArr[] = $unPortArr['nom'];
					}
					
					foreach ($liaisons as $uneLiaison){
					$cL[] = $uneLiaison['code'];
					}
					
					for ($i=0; $i<$nbLiaisons;$i++) {
						for ($j=0; $j<$nbLiaisons;$j++) {
							if ($i==$j){
					?>
								<option value="<?php echo $cL[$i]; ?>"><?php echo $pDep[$i]." - ". $pArr[$j]; ?></option>
								<?php }}} ?>
				</select>
				</div>
				
				<div class="form-group col-lg-4">
					<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					<input class="form-control date" name="date" id="date" type="text" >
					</div>
				</div>
				
				<div class="col-lg-4">
					<button type="submit" class="btn btn-default">Afficher les traversées</button>
				</div>
				
				<script type="text/javascript">
					$('#date').datetimepicker({
					todayBtn:"true",
					format:"yyyy-mm-dd", 
					autoclose:"true",
					pickerPosition:"bottom-left",
					startView:"year",
					minView:"month",
					language:"fr"
					});
				</script>
			</form>

			<div class="col-lg-12">
				<?php 
				
				if (isset($codeLiaison) && !empty($codeLiaison) && isset($date) && !empty($date)){
				
				echo $portDep['nom']." - ".$portArr['nom'];
				echo " Traversées pour ".$date.". Sélectionner la traversée souhaitée";			
				?>
				
				<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th colspan="3"> Traversée </th>
						<th colspan="3"> Places disponibles par catégorie </th>	
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<th>Num</th>
						<th>Heure</th>
						<th>Bateau</th>
						<th>A - Passager</th>
						<th>B - Véh.inf.2m</th>
						<th>C - Véh.sup.2m</th>
					</tr>
					<form class="form" role="form" method="post" action="index.php?uc=donnee&action=creerReservation">
					<?php 
						
						foreach($lesTraversees as $uneTraversee) {
						$numTraversee[]=$uneTraversee['num'];
						$heureTraversee[]=$uneTraversee['heure'];
						}
						
						
						foreach ($nomBateaux as $unBateau) {
						$bateauTraversee[]=$unBateau['nom'];
						}
						
						
						for ($i=0; $i<$nbTraversees;$i++) {
						?>
						<tr>
						<th><?php echo $numTraversee[$i];?></th>
						<td><?php echo $heureTraversee[$i];?></td>
						<td><?php echo $bateauTraversee[$i];?></td>
						<td><?php 
							 echo $disposA[$i];
							
						?></td>
						<td><?php
							 echo $disposB[$i];
							
						?></td>
						<td><?php 
							if ($disposC[$i] > 0 ) echo $disposC[$i];
							else echo "Plus de places disponibles";
						?></td>
						<td><input type="radio" name="numTr" value="<?php echo $numTraversee[$i];?>"></td>
						</tr>
						<?php } ?>
				</tbody>
				
				</table>
					
				<button class="btn btn-primary" type="submit">Réserver cette traversée</button>
				</form>
					
					<?php 
				}
					?>
			</div>
			
        </section>

      </div>
