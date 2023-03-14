<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <scrip type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></scrip>
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
    <?php session_start();
    ob_start() ?>
</head>

<body style="background-color: #55595c ;">
    <form class="h-100" action="" method="post">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="./image/LibraryPicLogin.jpg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;height:100%" />
                            </div>

                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <img src="./image/logo.png" alt="" srcset="" width="30%" class="position-relative top-0 start-50 translate-middle pt-5">
                                    <h3 class="mb-5 text-center">Log In</h3>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="Email_Inp" class="form-control form-control-lg" name="email" style="border: 1px solid black;" required>
                                        <label class="form-label" for="Email_Inp">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="Password_Inp" class="form-control form-control-lg" name="password" style="border: 1px solid black;" required>
                                        <label class="form-label" for="Password_Inp">Password</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="radio" name="color" value="red"> Accept Our Terms<br>
                                    </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="submit" class="btn  btn-block" style="background-color: #F7E1C1 ;">Log In</button>
                                    </div>


                                    <div class="text-center mt-3 small">
                                        Don't have an account? <a href="register.html">Sign Up</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php


    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['color']) && $_POST['color'] == 'red') {

        $email = $_POST['email'];
        $password = $_POST['password'];


        try {
            $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');


            $stmt1 = $conn->query("SELECT * FROM `adherent` WHERE  `adh_email`='$email '");
            $stmt2 = $conn->query("SELECT * FROM `adherent` WHERE  `adh_pass`='$password'");

            $emailLigne = $stmt1->fetch();
            $passLigne = $stmt2->fetch();


            if (!$emailLigne) {
                $erroremail = " email incorrect.";
                echo "<div style='background-color: #55595c ;color:red'>" . $erroremail . " </div>";
            } elseif (!$passLigne && !password_verify($password, $emailLigne["adh_pass"])) {
                $error = " mot de passe incorrect.";
                echo "<div style='background-color: #55595c ;color:red'>" . $error . "</div>";
            } else {
                if ($emailLigne["adh_pénalités"] > 3) {
                    echo "<div style='background-color: #55595c ;color:red'>
             person who accumulates more than three penalties will not be allowed to continue borrowing books,
            and their account will be immediately locked. Your penlaties are " . $emailLigne["adh_pénalités"] . "</div>";
                } else {
                 
                    $_SESSION['id'] = $emailLigne['adh_id'];
                    echo "in";

                    header("Location:http://localhost:8080/brief16/acueil.php");
                }
            }
        } catch (PDOException $e) {
            $errorMessage = "Error:" . $e->getMessage();
        }
    }
    ob_end_flush();
    ?>





</body>

</html>