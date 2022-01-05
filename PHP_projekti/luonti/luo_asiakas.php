<!DOCTYPE HTMTL>
<html>
<head>
    <title>Luo uusi asiakas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<div style="background-image: url('../tausta.jpg'); background-size: cover;" class="img-fluid">
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-25 my-auto">
                <div class="card-header text-center">
                    <h3>Luo uusi asiakas</h3>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['create']) && $_GET['create'] == 'true'){
                        echo    "<div class='alert text-nowrap alert-success w-100 mx-auto row justify-content-center alert-dismissible center-block show role='alert'>Asiakas luotu
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span></button>
                                    </div>";
                    }
                    ?>
                    <form action="luo_asiakas_post.php" method="post">
                        <div class="form-group">
                            <label for="name">Nimi</label>
                            <input type="text" class="form-control" id="name" name="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="comp">Yritys</label>
                            <input type="text" class="form-control" id="comp" name="comp" required/>
                        </div>
                        <div class="form-group">
                            <label for="job">Toimenkuva</label>
                            <input type="text" class="form-control" id="job" name="job" required/>
                        </div>
                        <div class="form-group">
                            <label for="e_mail">Sähköposti</label>
                            <input type="email" class="form-control" id="e_mail" name="e_mail" required/>
                        </div>
                        <input type="submit" class="btn btn-primary w-100" name="create" value="Luo uusi asiakas">
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
                        <button class='btn btn-primary m-1' onclick="location.href='./luonti/luo_asiakas.html'">Luo uusi asiakas</button>
                    </div>
                    <div class='row justify-content-center'>
                        <button class='btn btn-primary m-1' onclick="location.href='../muokkaa/muokkaa_asiakasta.php'">Muokkaa asiakasta</button> 
                    </div>
                </div>
                <div class='modal-footer'>
                </div>
            </div>
        </div>
    </div>
</body>
</html>