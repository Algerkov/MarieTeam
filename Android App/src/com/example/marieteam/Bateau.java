package com.example.marieteam;

public class Bateau {
	private String idBat ;
	private String nomBat ;
	private double longeurBat ;
	private double largeurBat ;
	
	public Bateau(String unId , String unNom , double uneLongeur , double uneLargeur){
		idBat = unId ;
		nomBat = unNom ;
		longeurBat = uneLongeur ;
		largeurBat = uneLargeur ;
	}
	
	public String toString(){
		String mot1="Nom du bateau : " + nomBat; 
		String mot2="Longeur : " + longeurBat + " mètres"; 
		String mot3="Largeur : " + largeurBat + " mètres"; 
		String Newligne=System.getProperty("line.separator"); 
		String resultat=mot1+Newligne+mot2+Newligne+mot3; 
		return resultat ;
	}

	public String getIdBat() {
		return idBat;
	}

	public void setIdBat(String idBat) {
		this.idBat = idBat;
	}

	public String getNomBat() {
		return nomBat;
	}

	public void setNomBat(String nomBat) {
		this.nomBat = nomBat;
	}

	public double getLongeurBat() {
		return longeurBat;
	}

	public void setLongeurBat(double longeurBat) {
		this.longeurBat = longeurBat;
	}

	public double getLargeurBat() {
		return largeurBat;
	}

	public void setLargeurBat(double largeurBat) {
		this.largeurBat = largeurBat;
	}
}
