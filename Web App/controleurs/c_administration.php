<?php

$action = $_REQUEST['action'];

switch($action){
	case 'accueil':{
		
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
}