package com.example.marieteam;

import java.util.*;


public class BateauVoyageur extends Bateau {
	
	private double vitesse ;
	private String images ;
	private ArrayList<Equipement> collEquip = new ArrayList<Equipement>() ;
	
	
	public BateauVoyageur(String unId, String unNom, double uneLongeur,double uneLargeur,double uneVitesse,String uneImage,ArrayList uneCollEquip) {
		super(unId, unNom, uneLongeur, uneLargeur);
		vitesse = uneVitesse;
		images = uneImage ;
		collEquip = uneCollEquip ;
	}
	
	public String toString(){
		String resultat;
		String mot1="Vitesse : " + vitesse + " noeuds"; 
		String mot2="Liste des équipements du bateau :"; 
		String Newligne=System.getProperty("line.separator"); 
		resultat= super.toString()+Newligne+mot1+Newligne+mot2; 
		
		for(Equipement unEquipement : collEquip){
			String mot3 = unEquipement.toString();
			resultat = resultat + Newligne + mot3;
		}
		
		return resultat ;
	}

	public double getVitesse() {
		return vitesse;
	}

	public void setVitesse(double vitesse) {
		this.vitesse = vitesse;
	}

	public String getImages() {
		return images;
	}

	public void setImages(String images) {
		this.images = images;
	}

	public ArrayList getCollEquip() {
		return collEquip;
	}

	public void setCollEquip(ArrayList collEquip) {
		this.collEquip = collEquip;
	}
	
	
	
}
