package gestionbateau;


import java.util.ArrayList;

import static java.lang.Integer.parseInt;




public class Main {
	
	public static void main(String[] args) throws NullPointerException{
            
                ArrayList<BateauVoyageur> mesBat = new ArrayList<BateauVoyageur>();
                BateauVoyageur monBat;
                PDF monPDF = new PDF("BateauxVoyageurs");
                Passerelle P= new Passerelle();
                String backslash= System.getProperty("file.separator") ;
                
            mesBat=P.chargerLesBatVoy();
            for (BateauVoyageur B : mesBat){
                monPDF.chargerImage("img_bat" + backslash + B.getImages());
                monPDF.ecrireTexte(B.toString());
            }
            
            monPDF.fermer();
            
            
        }
}
