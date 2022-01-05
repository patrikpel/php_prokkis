<?php
include_once '../connect.php';
$pdo = new PDO("mysql:host=$hostname;dbname=asiakaskanta", $username, $password);

$nimi = $_POST['valitse_asiakas'];
$stmt="SELECT nimi FROM asiakkaat";
$result = $conn->query("SELECT * FROM asiakkaat WHERE nimi='$nimi'");
if ($result->num_rows > 0) {
    foreach($result as $row){
    $vanhanimi = $row['nimi'];
    $nimi = $row['nimi'];
    $yritys = $row['yritys'];
    $toimenkuva = $row['toimenkuva'];
    $email = $row['email'];
    }
    }
$conn->close();
?>
<html>
    <head>
        <title>Muokkaa asiakasta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>    
    </head>
    <body>
    <div style="background-image: url('../tausta.jpg'); background-size: cover;" class="img-fluid">
            <div class="container vh-100">
                <div class="row justify-content-center h-100">
                    <div class="card my-auto w-25">
                        <div class="card-header text-center">
                            <h3>Asiakastietokanta</h3>
                        </div>
                        <div class="card-body">
                            <form action='hae.php' method='POST'>
                                <div class='form-group'>
                                    <select selected='<?php echo $vanhanimi; ?>' name='valitse_asiakas' onchange='this.form.submit()' class='selectpicker w-100' data-live-search='true' title='Valitse asiakas'>
                                    <?php 
                                            foreach ($result as $row){
                                            echo "<option value=$row[nimi] name=$row[nimi]>$row[nimi]</option>";
                                            }
                                    ?>
                                    </select>
                                </div>
                            </form>
                            <form action='upd.php' method='POST'>
                                <input type='hidden' value='<?php echo $vanhanimi; ?>' name='vanhanimi'>
                                <div class='form-group'>
                                    <label for='nimi'>Nimi</label>
                                    <input type='text' name='nimi' value='<?php echo $nimi; ?>' class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label for='yritys'>Yritys</label>
                                    <input type='text' name='yritys' value='<?php echo $yritys; ?>' class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label for='toimenkuva'>Toimenkuva</label>
                                    <input type='text' name='toimenkuva' value='<?php echo $toimenkuva; ?>' class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label for='email'>Sähköposti</label>
                                    <input type='text' name='email' value='<?php echo $email; ?>' class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <button class='btn btn-primary' type='submit' name='update'>Päivitä tiedot</button>
                                </div>
                            </form>
                            <div class='form-group'>
                                <button class='btn btn-danger' data-toggle='modal' data-target='#poistoModal'>Poista asiakas</button>
                            </div>
                        </div>
                    <div class='card-footer'>
                        <div class='row'>
                            <div class='col-sm text-left'>
                                <button class='btn btn-dark pull-left' data-toggle='modal' data-target='#valikkoModal'>Valikko</button>
                            </div>
                            <div class='col-sm text-right text-nowrap d-flex justify-content-end align-items-center'>
                                <small>&copy; Patrik Peltokorpi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class='modal fade' id='poistoModal' tabindex='-1' role='dialog' aria-labelledby='poistoModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='poistoModalLabel'>Poistetaanko asiakas?</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <p>Haluatko varmasti poistaa asiakkaan?</p>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Peruuta</button>
                <button id='poistoNappi' onclick='delete_record()' class='btn btn-danger'>Poista asiakas</button>
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
<script>
var nimi = "<?php echo $nimi?>";
    console.log('Toimii');
function delete_record(){
    $(document).on('click','#poistoNappi', function(){

        console.log('Toimii');
        $.ajax({
            url:'poista.php',
            method: 'post',
            data:{poistoNimi:nimi},
            success:function(){
                window.location.href = "./muokkaa_asiakasta.php?del=true";
            }
        })
    });
}
</script>