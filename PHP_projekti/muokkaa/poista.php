<?php
include_once '../connect.php';

$nimi = $_POST['poistoNimi'];

if($conn->connect_error){
    echo "Yhteyttä ei voitu muodostaa: " .mysqli->connect_error;
}else{
    $stmt = $conn->query("DELETE FROM asiakkaat WHERE nimi='$nimi'");
    echo 'Asiakas poistettu';
}
?>