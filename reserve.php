<?php session_start();


ob_start()
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
                        <a class="nav-link navbar-text active" aria-current="page" href="./acueil.php" style="color:black">Home Page</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 90px;color:black">
                                <img src="./image/free-user-login-icon-3057-thumb.png" alt="mdo" width="26" height="26" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="navbarDropdown" style="margin-right: 90px;">

                                <li><a class="dropdown-item" href="./Profil.php">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="border">
        <?php

        $idAdh = $id = $_SESSION['id'];
        $datelimit = date("Y-m-d", strtotime("+1 days"));


        $idouvre = $_GET['ouvre_id'];

        $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');

        $stmt = $conn->prepare("SELECT A_id
        FROM reservation
        WHERE  A_id= $idAdh 
        GROUP BY A_id
        HAVING COUNT(A_id) >=3");
        // Execute the statement
        $stmt->execute();
        // Get the number of rows returned by the SELECT statement
        $rowCount = $stmt->rowCount();

        // Check if the result is true or false
        if ($rowCount > 0) {
            echo "<div id='res'>
            Your reservation inserted Insuccessfully.<br>
            you have already 3 orders 
            
            </div>";
        } else {
            $stmt1 = $conn->prepare("SELECT *
             FROM reservation 
             WHERE `A_id` = 1 and `ouvre_id`=63 
             GROUP BY `A_id` HAVING COUNT(ouvre_id) >=1;
            ");
            // Execute the statement
            $stmt1->execute();
            // Get the number of rows returned by the SELECT statement
            $rowCount = $stmt1->rowCount();

            // Check if the result is true or false
            if ($rowCount > 0) {
                echo "<div id='res'>
                you already ordered this
            
            </div>";
            } else {
                echo $idouvre;
                $stmt = $conn->prepare("INSERT INTO `reservation`(`A_id`, `ouvre_id`, `Date_limite_retrait`) VALUES (:idAdh, :idouvre, :datelimit)");
                $stmt->bindParam(':idAdh', $idAdh);
                $stmt->bindParam(':idouvre', $idouvre);
                $stmt->bindParam(':datelimit', $datelimit);
                $stmt->execute();

                $id = $conn->lastInsertId();


                echo "<div id='res'>
                            Your reservation inserted successfully <br> 
                            code of Your Reservation is :" . $id . "
                </div>";
            }
        }



        ob_end_flush();
        ?>


    </div>


    </header>
</body>

</html>