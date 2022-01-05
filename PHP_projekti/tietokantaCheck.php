<?php
    include_once './connect.php';
    if ($conn->connect_error) {
        echo "Yhteyttä ei voitu muodostaa: " .mysqli->connect_error;
        exit();
      } else {
        $stmt = $conn->prepare("CREATE DATABASE IF NOT EXISTS asiakaskanta;");
        $stmt->execute();
        $stmt->close();
        $stmt2 = $conn->prepare("CREATE TABLE IF NOT EXISTS asiakaskanta.asiakkaat (nimi VARCHAR(30), yritys VARCHAR(30), toimenkuva VARCHAR(30), email VARCHAR(30))");
        $stmt2->execute();
        $stmt2->close();
      }
?>