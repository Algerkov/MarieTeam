<?php 


require("config.inc.php");

$equiper="110110";
$idBat="100";
try {
$stmt = $db->prepare("INSERT INTO equiper VALUES ('$idBat', :idEquip)");
$stmt->bindParam(':idEquip', $idEquip);
    
for ($i=0; $i<=5; $i++){
    $idEquip=$i+1;
    if ($equiper[$i]=='1')  $stmt->execute();
    echo $equiper[$i];
    echo $idEquip;
    }
}

    catch (PDOException $ex) {
        echo $ex->getMessage();
    }