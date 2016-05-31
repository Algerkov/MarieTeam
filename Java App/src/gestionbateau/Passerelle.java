package gestionbateau;


import static java.lang.Integer.parseInt;
import java.util.ArrayList;

public class  Passerelle {
  
    private ArrayList<BateauVoyageur> maColl;
    private BateauVoyageur monBatVoy;
    private ArrayList<Equipement> mesEquip ;
    private jeuEnregistrement monJeuBat;
    private String chaine;
    
    public  ArrayList<Equipement> chargerLesEquipements(int unIdBateau) throws NumberFormatException, NullPointerException{
      chaine = "select e.idbateau, e.idequip, eq.libequip from equiper e, equipement eq where e.idequip=eq.idequip and e.idbateau="+unIdBateau;
      jeuEnregistrement monJeuEquip =  new jeuEnregistrement(chaine);
    
      mesEquip= new ArrayList<Equipement>();
 
      do{
                
            monJeuEquip.suivant();
            Equipement monEquip = new Equipement(monJeuEquip.getValeur("idequip"), (monJeuEquip.getValeur("libequip")));
            mesEquip.add(monEquip);
                
        }while (!monJeuEquip.fin());
          
          return mesEquip;
      }
   
   
    public ArrayList<BateauVoyageur> chargerLesBatVoy() throws NumberFormatException, NullPointerException{
       chaine="select b.idbateau, b.nom, bv.imageBatVoyageur, bv.longueur, bv.largeur, bv.vitesse from bateau b, bvoyageur bv where bv.idbateau = b.idbateau";
       monJeuBat =  new jeuEnregistrement(chaine);
          
       maColl= new ArrayList<BateauVoyageur>();
       
      do{
            monJeuBat.suivant();
            monBatVoy = new BateauVoyageur(monJeuBat.getValeur("idbateau"), monJeuBat.getValeur("nom"), Double.parseDouble(monJeuBat.getValeur("longueur")), Double.parseDouble(monJeuBat.getValeur("largeur")), Double.parseDouble(monJeuBat.getValeur("vitesse")), monJeuBat.getValeur("imageBatVoyageur"), chargerLesEquipements(parseInt(monJeuBat.getValeur("idbateau"))));
            maColl.add(monBatVoy);
            
        }while (!monJeuBat.fin());
          
          monJeuBat.fermer();
          return maColl;
      }
}
    

