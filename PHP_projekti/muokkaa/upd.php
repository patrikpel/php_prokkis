<?php
session_start();
include_once '../connect.php';

$vanhanimi = $_POST['vanhanimi'];
$nimi = $_POST['nimi'];
$yritys = $_POST['yritys'];
$toimenkuva = $_POST['toimenkuva'];
$email = $_POST['email'];

if(isset($_POST['update'])){
    if($conn->connect_error){
        die('Yhteys epäonnistui: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("UPDATE asiakkaat SET nimi='$nimi', yritys='$yritys', toimenkuva='$toimenkuva', email='$email' WHERE nimi='$vanhanimi'");
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location: ./muokkaa_asiakasta.php?edit=true');
    }
}
?>