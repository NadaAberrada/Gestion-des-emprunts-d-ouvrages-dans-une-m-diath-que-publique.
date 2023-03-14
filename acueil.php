<?php session_start();
// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect the user to the login page
    header("Location: http://localhost:8080/brief16/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />



    <style>
        section {
            overflow: hidden;

        }


        footer {
            background-color: #f7e1c1;
            clear: both;

        }
    </style>
    <script>
        function Detail(id, titre, etat, auteur, editionD, achat, page, img) {
            let html = "";


            var mealList = document.getElementById("cardsaffiche");
            html += "<div class='modal fade text-center'  id='exampleModal" + id + "'  tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +
                "<div class='modal-dialog'> <div class='modal-content'> <div class='modal-header'>" +
                "<h1 class='modal-title fs-5' id='exampleModalLabel'style='margin-left:32%'>" + titre + "</h1>" + "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></div>" +
                "<img  src=" + img + " width='70%' height='300'  style='margin-left:16%' alt=" + titre + ">" +
                "<h4 class='modal-body'>Author : " + auteur + "</h4>" +
                "<h6 class='modal-body'>Etat :" + etat + " </h6>" +
                "<h6 class='modal-body'>Edition Date : " + editionD + "</h6>" +
                "<h6 class='modal-body'>Purchase date : " + achat + " </h6>" +
                "<h6 class='modal-body'>Pages : " + page + " </h6>" +
                "<div class='modal-footer'>" + "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>" +
                "</div></div></div></div>";

            mealList.insertAdjacentHTML("afterbegin", html);
        }
    </script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #F7E1C1">
            <div class="container-fluid">
                <img src="./image/logo.png" alt="" srcset="" style="width: 100px; margin-right: 50px" />
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link navbar-text active" aria-current="page" href="#" style="color:black">Home Page</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 90px;color:black">
                                <img src="./image/free-user-login-icon-3057-thumb.png" alt="mdo" width="26" height="26" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="navbarDropdown" style="margin-right: 90px;">

                                <li><a class="dropdown-item" href="./profil.php">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./Deconnecter.php">log out</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>



    </header>
    <main>
        <section class="text-center" style="background-color: #F7E1C1; overflow: hidden;">
            <div class="row py-lg-5">
                <div class="col-lg-8 col-md-8 mx-auto">
                    <h1 class="font-weight-light">New & Trending</h1>
                    <p class="lead text-muted">Explore new worlds from authors</p>
                    <form class="d-flex justify-content-center align-items-center" action="" method="post">
                        <select class="form-select me-2" aria-label="Search category" name="type">
                            <option value="#" selected>Choose Type</option>
                            <option value="science-fiction">Science fiction</option>
                            <option value="fantasy">fantasy</option>
                            <option value="Romance">Romance</option>
                            <option value="drama">drama</option>
                            <option value="DVD">DVD</option>
                        </select>
                        <form class="d-flex justify-content-center align-items-center" action="" method="post">
                            <select class="form-select me-2" aria-label="Search category" name="etat">
                                <option value="#" selected>Choose etat</option>
                                <option value="excellent">excellent</option>
                                <option value="bon">bon</option>
                                <option value="bon état">bon état</option>
                                <option value="drama">très bon</option>
                                <option value="new">new</option>
                                <option value="rip">rip</option>
                            </select>
                            <div class="input-group mb-3" style="margin-top: 16px;">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search" name="search" aria-label="Search">
                            </div>
                            <button class="btn btn-outline-secondary" type="submit" style="background-color: #DAAA63;color:black">Search</button>
                        </form>
                </div>
            </div>
        </section>

        <div class="container" id="test">
            <div class="row justify-content-center mt-4" id="cardsaffiche"></div>
        </div>


        <?php



            // unset($_SESSION['ouvre_id']);

           

        $id = $_SESSION['id'];
        $sql = "";
        $filter_conditions = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $type = $_POST["type"];
            $searchInput = $_POST["search"];

            $etat = $_POST['etat'];


            if ($searchInput != "" &&  $type == "#" && $etat == "#") {
                $sql .= "(`ouvre_titre`='$searchInput' OR `ouvre_auteur`='$searchInput')";
            }

            if ($etat != "#") {
                if ($sql != "") {
                    $sql .= " AND ";
                }
                $sql .= "`ouvre_etat`='$etat'";
            }
            if ($type != "#") {
                if ($sql != "") {
                    $sql .= " AND ";
                }
                $sql .= "`ouvre_type`='$type'";
            }

            if ($searchInput != "" && $type != "#" && $etat != "#") {
                if ($sql != "") {
                    $sql .= " AND ";
                }
                $sql .= "(`ouvre_titre`='$searchInput' OR `ouvre_auteur`='$searchInput') ";
            }


            if ($sql != "") {
                $filter_conditions .= " WHERE " . $sql;
            }
        }
        $group = "GROUP BY `ouvre_titre`";

        try {


            $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // modify query to include filter conditions
            $stmt = $conn->prepare("SELECT * FROM `ouvrage` $filter_conditions $group");

            $stmt->execute();
            $stmt1 = $conn->prepare("SELECT * FROM ouvrage
            INNER JOIN reservation ON ouvrage.ouvre_id = reservation.ouvre_id
            INNER JOIN emprunt ON emprunt.reserve_id = reservation.reserve_id
            WHERE emprunt.empr_retourConfirm IS NULL ");

            $stmt1->execute();

            $ouvreId = $stmt1->fetch(PDO::FETCH_ASSOC);


            // echo $ouvreId['ouvre_id'];



            echo "<div class='container text-center' style='display: block;margin-top:9%;margin-bottom: 9%;'>";
            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5'>";

            while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($ouvreId['ouvre_id'] != $ligne['ouvre_id'] && $ligne['ouvre_etat']!="rip") {
                    $ates = $ligne['ouvre_img'];

                    echo '<div class="col">
             <div class="card" style="box-shadow: 6px 5px 17px rgba(0, 0, 0, 0.32);">
            <img id="card_img" src="' . $ligne['ouvre_img'] . '" alt="' . $ligne['ouvre_titre'] . '" width="100%" height="225" fill="none">
            <div class="card-body">
                <h4 id="card_title">' . $ligne['ouvre_titre'] . '</h4>
                <p id="card_price fw-light">' . $ligne['ouvre_auteur'] . '</p>
                <h5 id="annonce-type" class="text-danger">' . $ligne['ouvre_type'] . '</h5>
                <h5 id="annonce-type" class=""> ' . $ligne['ouvre_etat'] . '</h5>

                <div class="d-flex  flex-wrap justify-content-between align-items-center" style="margin-top: 9%;">
                    <div class="btn-group">
                        <a  href="reserve.php?ouvre_id='. $ligne['ouvre_id'].'"    id="Reserve" class="btn btn-l btn-outline-secondary col-md-2 col-6" style="background-color: #f7e1c1; border-radius: 22px; color: black;" >Reserve</a>
                    </div>
                    <div class="btn-group">
                    <a onclick="Detail(\'' . $ligne['ouvre_id'] . '\',\'' . $ligne['ouvre_titre'] . '\', \'' . $ligne['ouvre_etat'] . '\', \'' . $ligne['ouvre_auteur'] . '\', \'' . $ligne['ouvre_editionD'] . '\', \'' . $ligne['ouvre_achatD'] . '\', \'' . $ligne['ouvre_pages'] . '\', \'' . $ates . '\')" data-bs-toggle="modal" data-bs-target="#exampleModal' . $ligne['ouvre_id'] . '" id="edit" class="btn btn-l btn-outline-secondary col-md-2 col-6" style="background-color: #f7e1c1; border-radius: 22px; color: black;" value=' . $ligne['ouvre_id'] . '>Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br>';
    // $_SESSION['ouvre_id'] = $ligne['ouvre_id'];
    // echo $_SESSION['ouvre_id']; 
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        ?>


    </main>


    <footer style="background-color: #F7E1C1;" class="py-3">
        <div class="container ">
            <div class="row">
                <div class="col-lg-4 col-md-3">
                    <h4 class="mb-3">Contact Us</h4>
                    <p>+234 23 9873237<br>
                       BooksWeb@email.com<br>
                        234 Hidden Pond Road, Ashland City, TN 37015</p>
                </div>

                <div class="col-lg-4 col-md-6"></div>

                <div class="col-lg-4 col-md-3 text-md-end">
                    <h4 class="mb-3" style="margin-right: 36px; padding-bottom:3% ;">Follow Us</h4>
                    <a href="#" class="me-3"><i class="fab fa-facebook fa-lg" style="color:black;"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-twitter fa-lg" style="color:black;"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-instagram fa-lg" style="color:black;"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-pinterest fa-lg" style="color:black;"></i></a>
                </div>
            </div>
        </div>
    </footer>







</body>

</html>