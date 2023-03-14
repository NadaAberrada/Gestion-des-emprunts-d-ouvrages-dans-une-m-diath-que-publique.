<?php session_start();
// Check if the user is logged in
if (!isset($_SESSION['idAdmin'])) {
    // Redirect the user to the login page
    header("Location: http://localhost:8080/brief16/login.php");
    exit;
}
ob_start();
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
        #border {
            box-sizing: border-box;

            position: absolute;
            width: 40%;
            height: 40%;
            left: 30%;
            top: 30%;

            background: #FFFFFF;
            border: 1px solid #000000;
            box-shadow: 7px 8px 4px rgba(0, 0, 0, 0.25);
        }

        #res {
            position: absolute;
            width: 90%;
            height: 20%;
            left: 5%;
            top: 30%;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 32px;
            line-height: 39px;
            display: flex;
            align-items: center;
            text-align: center;

            color: #000000;
        }
    </style>
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
                        <a class="nav-link navbar-text active" aria-current="page" href="./acueilAdmin.php" style="color:black">Home Page</a>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 90px;color:black">
                                <img src="./image/free-user-login-icon-3057-thumb.png" alt="mdo" width="26" height="26" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="navbarDropdown" style="margin-right: 90px;">




                                <li><a class="dropdown-item" href="./DeconnecterAdmin.PHP">Log Out</a></li>
                            </ul>
                        </li>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="border">
        <form method="POST" action="" enctype="multipart/form-data" style="margin-left:5%;margin-right:5%">
            <h3 class="mb-5 text-center">Edit Borrower</h3>
            <div class="form-outline mb-4">
                <input name="idres" type="text" id="idres" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" placeholder="id reservation" required />
            </div>
            <div class="form-outline mb-4">
                <h6 class=""> Date Retour Confirm</h6>
                <input name="date" type="date" id="date" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" placeholder="id reservation" required />
            </div>
            <div class="d-flex justify-content-center pt-3">
                <button type="submit" name="submit" class="btn  btn-block" style="background-color: #F7E1C1 ;">ADD</button>
            </div>
        </form>

    </div>
    <?php

    $idadmin = $_SESSION['idAdmin'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idres = $_POST["idres"];
        $date = $_POST["date"];

        $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
        // Prepare the SQL statement
        $stmt = $conn->prepare(" UPDATE `emprunt` SET
    `empr_retourConfirm`=$date
       WHERE `reserve_id=$idres");




        $stmt->execute();

        header("Location:http://localhost:8080/brief16/acueilAdmin.php");
    }



    ob_end_flush();

    ?>


    </header>
</body>

</html>