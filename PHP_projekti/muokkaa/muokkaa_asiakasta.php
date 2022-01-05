<?php
    include_once '../connect.php';
    $stmt="SELECT nimi FROM asiakkaat";
?>
<html>
<head>
    <title>Valitse asiakas</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</head>
<body>
<div style="background-image: url('../tausta.jpg'); background-size: cover;" class="img-fluid">
    <div class="container">
        <div class="row justify-content-center h-100">
            <div class="card w-25 my-auto">
                <div class='card-header text-center'>
                    <h3>Valitse asiakas</h3>
                </div>
                <div class='card-body text-center'>
                    <?php
                    if(isset($_GET['edit']) && $_GET['edit'] == 'true'){
                        echo    "<div class='alert text-nowrap alert-success w-100 mx-auto row justify-content-center alert-dismissible center-block show role='alert'>Asiakasta muokattu
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span></button>
                                    </div>";
                    }
                    ?>
                    <?php
                    if(isset($_GET['del']) && $_GET['del'] == 'true'){
                        echo    "<div class='alert text-nowrap alert-danger w-100 mx-auto row justify-content-center alert-dismissible center-block show role='alert'>Asiakas poistettu
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span></button>
                                    </div>";
                    }
                    ?>
                    <form method="POST" action="hae.php">
                        <select name="valitse_asiakas" class="selectpicker" data-live-search="true" title="Valitse asiakas">
                            <?php 
                                foreach ($conn->query($stmt) as $row){
                                echo "<option value=$row[nimi] name=$row[nimi]>$row[nimi]</option>";
                                }
                            ?>
                        </select>
                        <div class='mt-3'>
                            <input type="submit" class="btn btn-primary" value="Muokkaa">
                        </div>
                    </form>
                </div>
                <div class='card-footer'>
                    <div class='row'>
                        <div class='col-sm text-left'>
                            <button class='btn btn-dark pull-left' data-toggle='modal' data-target='#valikkoModal'>Valikko</button>
                        </div>
                        <div class='col-sm text-right text-nowrap d-flex align-items-center'>
                            <small>&copy; Patrik Peltokorpi</small>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<div class='modal fade' id='valikkoModal' tabindex='-1' role='dialog' aria-labelledby='valikkoModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header' style='text-align:center'>
                <h3>Valikko</h3>
                <button type='button' class='close' data-dismiss='modal' aria-label='close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body mx-auto'>
                <div class='row justify-content-center'>
                    <button class='btn btn-success m-1' onclick="location.href='../index.php'">Aloitussivulle</button>
                </div>
                <div class='row justify-content-center'>
                    <button class='btn btn-primary m-1' onclick="location.href='../luonti/luo_asiakas.php'">Luo uusi asiakas</button>
                </div>
                <div class='row justify-content-center'>
                    <button class='btn btn-primary m-1' onclick="location.href='./muokkaa_asiakasta.php'">Muokkaa asiakasta</button> 
                </div>
            </div>
            <div class='modal-footer'>
            </div>
        </div>
    </div>
</div>
</body>
</html>