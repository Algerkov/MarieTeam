<?php

/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=marieteam';	
      	private static $user='marieteam';    		
      	private static $mdp='marieteam';	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
		PdoGsb::$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * Retourne les informations d'un visiteur
 
 * @param $login 
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getListeSecteurs(){
		$req = 'SELECT * FROM secteur';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getListeTables(){
		$req = 'SHOW TABLES FROM marieteam';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getNomPortsDep($idSecteur){
		$req = 'SELECT P.nom FROM port P, liaison L where P.id=L.idDep and L.idSec='.$idSecteur.' ORDER BY L.code ASC';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getNomPortsArr($idSecteur){
		$req = 'SELECT P.nom FROM port P, liaison L where P.id=L.idArr and L.idSec='.$idSecteur.' ORDER BY L.code ASC';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getNomPortDep($codeLiaison){
		$req = 'SELECT P.nom 
				FROM port P, liaison L 
				where P.id=L.idDep and L.code=\'' . $codeLiaison . '\'';
		$res = PdoGsb::$monPdo->query($req);
		$ligne = $res->fetch();
		return $ligne;
	}
	
	public function getNomPortArr($codeLiaison){
		$req = 'SELECT P.nom 
				FROM port P, liaison L 
				where P.id=L.idArr and L.code=\'' . $codeLiaison . '\'';
		$res = PdoGsb::$monPdo->query($req);
		$ligne = $res->fetch();
		return $ligne;
	}
	
	public function getLiaisons($idSecteur){
		$req = 'SELECT * FROM liaison where liaison.idSec='.$idSecteur.' ORDER BY code ASC';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getNbLiaisons($idSecteur){
		return count($this->getLiaisons($idSecteur));
	}
	
	public function getTraversees($codeLiaison, $date){
		$req = 'SELECT * FROM traversee Tr, liaison L 
				where Tr.codeL=L.code and L.code=\'' . $codeLiaison . '\' and Tr.date= \''.$date.'\'
				ORDER BY Tr.num ASC';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getNbTraversees($codeLiaison, $date){
		return count($this->getTraversees($codeLiaison, $date));
	}
	
	public function getNomBateauxParLiaison($codeLiaison){
		$req = 'SELECT B.nom
				FROM bateau B, traversee Tr, liaison L 
				where Tr.codeL=L.code and Tr.idBat=B.idbateau and L.code=\'' . $codeLiaison . '\'';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getInfosLiaison($codeLiaison){
		$req = 'SELECT idSec from liaison where code=\'' . $codeLiaison . '\'';
		$res = PdoGsb::$monPdo->query($req);
		$ligne = $res->fetch();
		return $ligne;
	}
	
	public function getInfosTraversee($numTr){
		$req = 'SELECT * from traversee where num=\'' . $numTr . '\'';
		$res = PdoGsb::$monPdo->query($req);
		$ligne = $res->fetch();
		return $ligne;
	}
	
	public function getPlacesDispoParCat($codeLiaison, $lettreCat, $date){
		
		$dispo= array();
		
		foreach ($this->getTraversees($codeLiaison, $date) as $uneTraversee){
			
			$req1 ='SELECT C.capaciteMax from contenir C, Traversee Tr where Tr.idBat = C.idBat and C.lettreC= \''. $lettreCat .'\' and Tr.num='.$uneTraversee['num'];
			$req2 ='SELECT SUM(E.quantite) as "disponible" from enregistrer E, reservation R where R.num=E.numR and E.type like \''.$lettreCat.'%\' and R.numT='.$uneTraversee['num'];
			
			$res1 = PdoGsb::$monPdo->query($req1);
			$capMax = $res1->fetch();
			
			$res2 = PdoGsb::$monPdo->query($req2);
			$placeReservees = $res2->fetch();
			
			$dispo[] = $capMax['capaciteMax'] - $placeReservees ['disponible'];
		
		}
		
		return $dispo;
	}
	
	
	public function getTypes(){
		$req = 'SELECT * FROM type ORDER BY code';
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getNbTypes(){
		return count($this->getTypes());
	}
	
	public function getTarifParTraversee($numTr, $debPeriode){
		$tarifs= array();
		
		foreach ($this->getTypes() as $unType){
		$req= 'SELECT T.tarif from tarifier T, Traversee Tr where Tr.codeL = T.codeL and T.codeT=\''.$unType['code'].'\' and T.dateDebutP=\''.$debPeriode.'\' and Tr.num='.$numTr;
		$res = PdoGsb::$monPdo->query($req);
		$tarif = $res->fetch();
		$tarifs[]= $tarif['tarif'];
		}
		return $tarifs;
	}
	
	public function getPeriodeActuelle(){
		$req ='SELECT * from periode';
		
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
			
		$dateDeb=array();
		$dateFin=array();
		$aujourdhui = new DateTime();
		$date = new DateTime();
		
		foreach ($lesLignes as $uneLigne){
			$dateDeb= new DateTime($uneLigne['dateDebut']);
			$dateFin= new DateTime($uneLigne['dateFin']);
			if ($dateDeb < $aujourdhui && $aujourdhui < $dateFin){
				$date = $dateDeb;
			}
		}
		
		return $date->format('Y-m-d');
	}
    
    public function creerReservation($nom, $adresse, $cp, $ville, $numTr){
        $req="insert into reservation values ('', '$nom', '$adresse', '$cp', '$ville', '$numTr')";
        PdoGsb::$monPdo->exec($req);
    }
    
    public function enregistrerQuantite($qte, $type, $numR){
        $req="insert into enregistrer values ('$qte', '$type', '$numR')";
        PdoGsb::$monPdo->exec($req);
    }
    
    public function nextReservation(){
        $req="SELECT max(num) from reservation ";
        $res = PdoGsb::$monPdo->query($req);
		$max = $res->fetch();
        $num = $max['max(num)']+1;
            
        return $num;
    }
    
    public function getInfosReservation($numR){
        $req='select * from type, enregistrer where type.code=enregistrer.type and enregistrer.numR='.$numR;
        $res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
    }
    
    public function getNbInfosReservation($numR){
        return count($this->getNbInfosReservation($numR));
    }
	
}
?>