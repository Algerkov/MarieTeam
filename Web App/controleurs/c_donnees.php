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
		if (isset($_REQUEST['nom']) && !empty($_REQUEST['nom']) && isset($_REQUEST['adresse']) & !empty($_REQUEST['adresse']) && isset($_REQUEST['cp']) & !empty($_REQUEST['cp'])
			&& isset($_REQUEST['ville']) & !empty($_REQUEST['ville'])){
				
			$nom=$_REQUEST['nom'];
			$adresse=$_REQUEST['adresse'];
			$cp=$_REQUEST['cp'];
			$ville=$_REQUEST['ville'];
			
			$arrChoix=$pdo->getNomPortArr($pdo->getInfosTraversee($numTr)['codeL']);
			$dateTr=$pdo->getInfosTraversee($numTr)['date'];
			$heureTr=$pdo->getInfosTraversee($numTr)['heure'];
			$types= $pdo->getTypes();
			$nbTypes= $pdo->getNbTypes();
			$tarifs=$pdo->getTarifParTraversee($numTr, $pdo->getPeriodeActuelle());
			
			include("vues/v_reserve.php");
		}
			else 
			include("vues/v_accueil.php");
		break;
	}
}