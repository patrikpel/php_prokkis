<?php
include_once '../connect.php';

$name = $_POST['name'];
$comp = $_POST['comp'];
$job = $_POST['job'];
$e_mail = $_POST['e_mail'];

if($conn->connect_error){
    die('Yhteys epäonnistui: '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT into asiakkaat(nimi, yritys, toimenkuva, email)
    VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$comp,$job,$e_mail);
    $stmt->execute();
    $stmt->close();
    echo 'Uusi asiakas luotu!';
    header("Location: ./luo_asiakas.php?create=true");
}

?>