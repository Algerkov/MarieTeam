package gestionbateau;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;


public class jeuEnregistrement {
    
        String url = "jdbc:mysql://localhost/marieteam";
        String login = "root";
        String password = "";
        Connection cn=null;
        Statement st=null;
        ResultSet rs=null;
    
    public jeuEnregistrement (String chaineSQL){
        
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            cn=DriverManager.getConnection(url, login, password);
            st = cn.createStatement();
            
            rs = st.executeQuery(chaineSQL);
            
        }
        catch(SQLException e){
            System.out.println("Probleme :" + e.getMessage());
        }
        catch(ClassNotFoundException e){
            System.out.println("Probleme :" + e.getMessage());
        }
    }
    public void suivant(){
        try{
            rs.next();
        }
        catch(SQLException e){
            System.out.println("Problème : " +e.getMessage());
        }
    }
    public boolean fin(){
        boolean fini=true;
        try{
            if (rs.next()){
                fini=false;
                rs.previous();
            }
                
        }
        catch(SQLException e){
            System.out.println("Problème : " +e.getMessage());
        }
        return fini;
    }
    public String getValeur(String nomChamp){
        String valeur=null;
        try{
        valeur = rs.getString(nomChamp);
        }
        catch (SQLException e){
            System.out.println("Problème : " +e.getMessage());
        }
        return valeur;
    }
    public void fermer(){
        try{
        if (cn != null && st != null){
        cn.close();
        st.close();
        }}
        catch(SQLException e){
            System.out.println("Problème : " +e.getMessage());
        }
    }
    
}
