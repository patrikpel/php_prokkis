<html>
    <head>
        <title>Asiakastietokanta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php
        include_once "./tietokantaCheck.php";
        include_once "./connect.php";
        $result = $conn->query("SELECT * FROM asiakkaat");
        $conn->close();
    ?>
        <div style="background-image: url('./tausta.jpg'); background-size: cover;" class="img-fluid">
            <div class="container vh-100">
                <div class="row justify-content-center h-100">
                    <div class="card w-50 my-auto" style="opacity: 1">
                        <div class="card-header text-center">
                            <h3>Asiakastietokanta</h3>
                        </div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <th scope="col">Nimi</th>
                                <th scope="col">Yritys</th>
                                <th scope="col">Toimenkuva</th>
                                <th scope="col">Sähköposti</th>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    foreach($result as $row){
                                        echo "<tr><td>";
                                            echo$row['nimi'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo$row['yritys'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo$row['toimenkuva'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo$row['email'];
                                        echo "</td></tr>";

                                    }
                                    } else {
                                    echo "<p class='text-center'>Tietokannassa ei ole vielä asiakkaita.<br>Lisää asiakas valikosta löytyvällä Luo uusi asiakas -toiminnolla!</p>";
                                }
                                ?>
                            </tbody>
                        </table>
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
                    <button class='btn btn-success m-1' onclick="location.href='./index.php'">Aloitussivulle</button>
                </div>
                <div class='row justify-content-center'>
                    <button class='btn btn-primary m-1' onclick="location.href='./luonti/luo_asiakas.php'">Luo uusi asiakas</button>
                </div>
                <div class='row justify-content-center'>
                    <button class='btn btn-primary m-1' onclick="location.href='./muokkaa/muokkaa_asiakasta.php'">Muokkaa asiakasta</button> 
                </div>
            </div>
                <div class='modal-footer'>
            </div>
        </div>
    </div>
</div>    
    </body>
</html>