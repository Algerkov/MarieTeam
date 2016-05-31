<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;

$pdo = PdoGsb::getPdoGsb();



if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'accueil';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'accueil':{
		include("controleurs/c_secteurs.php");
		include("vues/v_accueil.php");
		break;
	}
	case 'donnee' :{
		include("controleurs/c_secteurs.php");
		include("controleurs/c_donnees.php");
		break;
	}
	
	case 'reservation' :{
		include("controleurs/c_secteurs.php");
		include("controleurs/c_reservation.php");
		break; 
	}
		
	case 'administration' :{
		include("controleurs/c_tables.php");
		include("controleurs/c_administration.php");
		break; 
	}
}

include("vues/v_pied.php");
?>

