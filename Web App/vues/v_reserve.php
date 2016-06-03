
        <section class="col-lg-10 col-lg-offset-1">
			<div class="col-lg-12">
			<div class="jumbotron">
                <h2>Récapitulatif de votre réservation :</h2> 
                <p><?php
								 
				echo "Liaison ".$depChoix['nom']." - ".$arrChoix['nom'];
				echo " Traversée n°".$numTr;
				echo " le ". $dateTr;
				echo " à ". $heureTr;
                echo "<br>Réservation enregistrée sous le n°".$numR." ";
                echo $nom." ".$adresse." ".$cp." ".$ville;
			 
                foreach ($typesR as $unType){
                    echo "<br>";
                    echo $unType["libelle"]." : ".$unType["quantite"];
                }
                echo "<br> Montant total à regler : ".$total."€";
				?></p> 
            </div>
			</div>
        </section>

      </div>
