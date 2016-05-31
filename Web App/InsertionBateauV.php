<?php

$base = $base = mysqli_connect ('localhost', 'root', '', 'marieteam') or die (mysqli_errno().": ".mysqli_error()."<BR>");
if (isset($_POST['idBat']) && !empty($_POST['idBat']) && isset($_POST['nomBat']) && !empty($_POST['nomBat']) && isset($_POST['longBat']) && !empty($_POST['longBat']) && isset($_POST['largBat']) && !empty($_POST['largBat']) && isset($_POST['vitBat']) && !empty($_POST['vitBat'])){
		
$idBat = $_POST['idBat'];
$nomBat = $_POST['nomBat'];
$longBat = $_POST['longBat'];
$largBat = $_POST['largBat'];
$vitBat = $_POST['vitBat'];

$insertionBat= "INSERT INTO bateau values('$idBat', '$nomBat')";
$verifBat= "Select * from bateau where idBat='.$idBat.'";
$insertionBatV="INSERT INTO bvoyageur values ('$idBat', '$nomBat', '$longBat', '$largBat', '$vitBat')";

if (mysqli_query($base, $insertionBat)->fetch()){
	$response["success"] = 0;
    $response["message"] = "Bateau avec id existant";
    die(json_encode($response));
}

if(mysqli_query($base, $insertionBat)){ //&& mysqli_query($base, $insertionBatV)){
    $response["success"] = 1;
    $response["message"] = "Boat Successfully Added!";
    echo json_encode($response);
}else{
    $response["success"] = 0;
    $response["message"] = 'Erreur SQL !' . $insertionBat . '<br />' . mysql_error();
    echo json_encode($response);
}
}
else {
	$response["success"] = 0;
    $response["message"] = "Un des champs est vide";
    die(json_encode($response));
}
