<?php

$action = $_REQUEST['action'];

switch($action){
	case 'detailSecteur':{
		
		if (isset($_REQUEST['idSecteur']) || (isset($_REQUEST['codeLiaison']) && isset($_REQUEST['date']))){
		if (isset($_REQUEST['idSecteur'])){
		$idSecteur = $_REQUEST['idSecteur'];
		}
		else $idSecteur= $pdo->getInfosLiaison($_REQUEST['codeLiaison'])['idSec'];
		$portsDep=$pdo->getNomPortsDep($idSecteur);
		$portsArr=$pdo->getNomPortsArr($idSecteur);
		$liaisons=$pdo->getLiaisons($idSecteur);
		$nbLiaisons=$pdo->getNbLiaisons($idSecteur);
		
		
		if (isset($_REQUEST['codeLiaison']) && isset($_REQUEST['date'])){
			$codeLiaison= $_REQUEST['codeLiaison'];
			$date= $_REQUEST['date'];
			$portDep=$pdo->getNomPortDep($codeLiaison);
			$portArr=$pdo->getNomPortArr($codeLiaison);
			$lesTraversees=$pdo->getTraversees($codeLiaison, $date);
			$nbTraversees= $pdo->getNbTraversees($codeLiaison, $date);
			$nomBateaux= $pdo->getNomBateauxParLiaison($codeLiaison);
			$disposA= $pdo->getPlacesDispoParCat($codeLiaison, 'A', $date);
			$disposB= $pdo->getPlacesDispoParCat($codeLiaison, 'B', $date);
			$disposC= $pdo->getPlacesDispoParCat($codeLiaison, 'C', $date);
		}
		include("vues/v_choixLiaison.php");
		}
		else 
			include("vues/v_accueil.php");
		break;
	}
	
	case 'creerReservation':{
		if (isset($_REQUEST['numTr'])){
			$numTr=$_REQUEST['numTr'];
			$depChoix=$pdo->getNomPortDep($pdo->getInfosTraversee($numTr)['codeL']);
			$arrChoix=$pdo->getNomPortArr($pdo->getInfosTraversee($numTr)['codeL']);
			$dateTr=$pdo->getInfosTraversee($numTr)['date'];
			$heureTr=$pdo->getInfosTraversee($numTr)['heure'];
			$types= $pdo->getTypes();
			$nbTypes= $pdo->getNbTypes();
			$tarifs=$pdo->getTarifParTraversee($numTr, $pdo->getPeriodeActuelle());
			
			include("vues/v_reservation.php");
		}
			else 
			include("vues/v_accueil.php");
		break;
	}
	
	case 'validerReservation':{
		if ((isset($_REQUEST['nom']) && !empty($_REQUEST['nom']) && isset($_REQUEST['adresse']) & !empty($_REQUEST['adresse']) && isset($_REQUEST['cp']) & !empty($_REQUEST['cp']) && isset($_REQUEST['ville']) & !empty($_REQUEST['ville']) && isset($_REQUEST['numTr']) & !empty($_REQUEST['numTr'])) && ((isset($_REQUEST['qteA1'])) && (!empty($_REQUEST['qteA1'])) || isset($_REQUEST['qteA2']) && (!empty($_REQUEST['qteA2'])) || isset($_REQUEST['qteA3']) && (!empty($_REQUEST['qteA3']))|| isset($_REQUEST['qteB1']) && (!empty($_REQUEST['qteB1'])) ||isset($_REQUEST['qteB2']) && (!empty($_REQUEST['qteB2']))|| isset($_REQUEST['qteC1']) && (!empty($_REQUEST['qteC1'])) || isset($_REQUEST['qteC2']) && (!empty($_REQUEST['qteC2'])) || isset($_REQUEST['qteC3']) && (!empty($_REQUEST['qteC3'])))){
				
			$nom=$_REQUEST['nom'];
			$adresse=$_REQUEST['adresse'];
			$cp=$_REQUEST['cp'];
			$ville=$_REQUEST['ville'];
            $numTr=$_REQUEST['numTr'];
			
			$depChoix=$pdo->getNomPortDep($pdo->getInfosTraversee($numTr)['codeL']);
			$arrChoix=$pdo->getNomPortArr($pdo->getInfosTraversee($numTr)['codeL']);
			$dateTr=$pdo->getInfosTraversee($numTr)['date'];
			$heureTr=$pdo->getInfosTraversee($numTr)['heure'];
            
            
            $numR= $pdo->nextReservation();
            
            $pdo->creerReservation($nom, $adresse, $cp, $ville, $numTr);
            
            if (!empty($_REQUEST['qteA1'])) $pdo->enregistrerQuantite($_REQUEST['qteA1'], 'A1', $numR);
            if (!empty($_REQUEST['qteA2'])) $pdo->enregistrerQuantite($_REQUEST['qteA2'], 'A2', $numR);
            if (!empty($_REQUEST['qteA3'])) $pdo->enregistrerQuantite($_REQUEST['qteA3'], 'A3', $numR);
            
            if (!empty($_REQUEST['qteB1'])) $pdo->enregistrerQuantite($_REQUEST['qteB1'], 'B1', $numR);
            if (!empty($_REQUEST['qteB2'])) $pdo->enregistrerQuantite($_REQUEST['qteB2'], 'B2', $numR);
            
            if (!empty($_REQUEST['qteC1'])) $pdo->enregistrerQuantite($_REQUEST['qteC1'], 'C1', $numR);
            if (!empty($_REQUEST['qteC2'])) $pdo->enregistrerQuantite($_REQUEST['qteC2'], 'C2', $numR);
            if (!empty($_REQUEST['qteC3'])) $pdo->enregistrerQuantite($_REQUEST['qteC3'], 'C3', $numR);
            
            
            $nbTypes= $pdo->getNbTypes();
            $typesR = $pdo->getInfosReservation($numR);
            $types= $pdo->getTypes();
            $tarifs=$pdo->getTarifParTraversee($numTr, $pdo->getPeriodeActuelle());
            
            $total=0;
			
            for ($i=0; $i<$nbTypes;$i++){
            foreach ($typesR as $unTypeR){
                if ($types[$i]['code']==$unTypeR['code']) $total+= $tarifs[$i]*$unTypeR['quantite']; 
            }
            }
            
			
			include("vues/v_reserve.php");
		}
			else 
			include("vues/v_accueil.php");
		break;
	}
}