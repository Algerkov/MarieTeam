package gestionbateau;

import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Image;
import com.itextpdf.text.PageSize;
import com.itextpdf.text.Phrase;
import com.itextpdf.text.pdf.PdfWriter;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.*;

public class PDF {
    
    String nomDoc;
    BateauVoyageur monBatVoy ;
    Document monPDF;
    
    public PDF (String nomDoc){
        //Passerelle.chargerLesBatVoy();
        monPDF = new Document(PageSize.A4);
        try {
            PdfWriter.getInstance(monPDF, new FileOutputStream(nomDoc+".pdf"));
            monPDF.open();
        }
        catch(DocumentException de) {
            System.err.println(de.getMessage());
        }
        catch(IOException ioe) {
            System.err.println(ioe.getMessage());
        }
    }
        
    public void ecrireTexte (String leTexte){
        try {
            monPDF.add(new Phrase(leTexte));
        }
        catch(DocumentException de) {
            System.err.println(de.getMessage());
        }
    }
    
    public void chargerImage (String chemin){
        try {
            Image image = Image.getInstance(chemin);
            image.scalePercent(50f);
            
            image.setAlignment(Image.LEFT);
            monPDF.add(image);
        }
        catch(DocumentException de) {
            System.err.println(de.getMessage());
        }
        catch(IOException ioe) {
            System.err.println(ioe.getMessage());
        }
    }
    public void fermer(){
        monPDF.close();
    }
    
}
