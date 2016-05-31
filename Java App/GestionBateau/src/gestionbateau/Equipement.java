package gestionbateau;

public class Equipement {
	private String idEquip;
	private String libEquip;
	
	
	public Equipement(String unid, String unLib){
		idEquip = unid ;
		libEquip = unLib;
	}
	
	public String toString(){
		return idEquip + " - " + libEquip;
	}
}
