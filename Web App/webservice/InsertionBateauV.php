<?php

require("config.inc.php");
$base = $base = mysqli_connect ('localhost', 'root', '', 'marieteam') or die (mysqli_errno().": ".mysqli_error()."<BR>");

if (isset($_POST['idBat']) && !empty($_POST['idBat']) && isset($_POST['nomBat']) && !empty($_POST['nomBat']) && isset($_POST['longBat']) && !empty($_POST['longBat']) && isset($_POST['largBat']) && !empty($_POST['largBat']) && isset($_POST['vitBat']) && !empty($_POST['vitBat'])){
		
$idBat = $_POST['idBat'];
$nomBat = $_POST['nomBat'];
$longBat = $_POST['longBat'];
$largBat = $_POST['largBat'];
$vitBat = $_POST['vitBat'];
$imgBat = $nomBat.'.jpg';
$equiper = $_POST['equiper'];
    
$insertionBat= "INSERT INTO bateau values('$idBat', '$nomBat', '$longBat', '$largBat')";
$insertionBatV="INSERT INTO bvoyageur values ('$idBat', '$imgBat', '$vitBat')";

if(mysqli_query($base, $insertionBat) && mysqli_query($base, $insertionBatV)){
    
    $stmt = $db->prepare("INSERT INTO equiper VALUES ('$idBat', :idEquip)");
    $stmt->bindParam(':idEquip', $idEquip);
    
    for ($i=0; $i<=5; $i++){
        $idEquip=$i+1;
        if ($equiper[$i]=='1')  $stmt->execute();
    }
    
    $response["success"] = 1;
    $response["message"] = "Boat Successfully Added!";
    echo json_encode($response);
    
}else{
    $response["success"] = 0;
    $response["message"] = "Un bateau existe déjà avec cet ID";
    echo json_encode($response);
}
}
else {
	$response["success"] = 0;
    $response["message"] = "Un des champs est vide";
    die(json_encode($response));
}
