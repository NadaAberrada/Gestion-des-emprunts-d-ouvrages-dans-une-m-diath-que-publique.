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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
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

        body {
            background-color: #55595c;
        }
    </style>
    <?php
    ob_start() ?>
</head>

<body>
    <form class="h-100" method="POST" action="signup.php">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="./image/LibraryPicSignUp.jpg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;height:100%" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <a href="../Page Visiteure/Guest.php" class="navbar-brand d-flex align-items-center mt-5">
                                        <img src="./image/logo.png" alt="" srcset="" width="30%" class="position-relative top-0 start-50 translate-middle pt-5">
                                    </a>
                                    <h3 class="mb-5 text-center">Join our library community today <br> Sign Up Now!</h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input name="Name_Inp" type="text" id="Name_Inp" class="form-control form-control-lg" required />
                                                <label class="form-label" for="Name_Inp">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input name="UserName" type="text" id="UserName" class="form-control form-control-lg" required />
                                                <label class="form-label" for="UserName">UserName</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input name="CIN" type="text" id="CIN" class="form-control form-control-lg" required />
                                                <label class="form-label" for="CIN">CIN</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input name="tele" type="text" id="tele" class="form-control form-control-lg" required />
                                                <label class="form-label" for="tele">tele</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input name="Date" type="Date" id="Date" class="form-control form-control-lg" required />

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input name="Adress" type="text" id="Adress" class="form-control form-control-lg" required />
                                                <label class="form-label" for="Adress">Adress</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <select name="type" id="type" style="border: 1px solid #A5A1A1;width:100%;height:6vh">
                                            <option value="#">select your type</option>
                                            <option value="Student">Student</option>
                                            <option value="Official">Official</option>
                                            <option value="Employee">Employee</option>
                                            <option value="Housewife">Housewife</option>
                                            <option value="another">another</option>
                                        </select>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input name="Email_Inp" type="email" id="Email_Inp" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" required />
                                        <label class="form-label" for="Email_Inp">Email</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input name="Password_Inp" type="password" id="Password_Inp" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" required />
                                        <label class="form-label" for="Password_Inp">Password</label>
                                    </div>


                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="submit" name="submit" class="btn  btn-block" style="background-color: #F7E1C1 ;">Sign Up</button>
                                    </div>
                                    <div class="text-center mt-3 small">
                                        Already have an account? <a href="../brief16/login.php">Log IN</a>
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
    ob_start();
    // Redirect to member page if no error occurs
    if (isset($_POST['submit'])) {
        // Connect to the database
        $name = test_input($_POST['Name_Inp']);
        $UserName = test_input($_POST['UserName']);
        $email = test_input($_POST['Email_Inp']);
        $password = test_input($_POST['Password_Inp']);
        $CIN = test_input($_POST['CIN']);
        $type = test_input($_POST['type']);
        $Adress = test_input($_POST['Adress']);
        $Date = test_input($_POST['Date']);
        $tele = test_input($_POST['tele']);
        $current_date = date('Y-m-d');
        $penalty = 0;
        $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
        if ($type != "#") {
            $stmt1 = $conn->query("SELECT `adh_CIN` FROM `adherent` WHERE  `adh_CIN`='$CIN '");
            $emailCIN = $stmt1->fetch();
            $rows = $stmt1->rowCount();
            if ($rows == 0) {


                // Verify passwords match
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                // Prepare and execute SQL query
                $stmt = $conn->prepare("INSERT INTO adherent (adh_nom, adh_adresse, adh_email, adh_phone, adh_CIN, adh_dateN, adh_type, adh_userName, adh_pass, adh_creation, adh_pénalités) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindValue(1, $name);
                $stmt->bindValue(2, $Adress);
                $stmt->bindValue(3, $email);
                $stmt->bindValue(4, $tele);
                $stmt->bindValue(5, $CIN);
                $stmt->bindValue(6, $Date);
                $stmt->bindValue(7, $type);
                $stmt->bindValue(8, $UserName);
                $stmt->bindValue(9, $passHash);
                $stmt->bindValue(10, $current_date);
                $stmt->bindValue(11, $penalty);
                // Check if the query was successful
                $stmt->execute();

                // Get the number of affected rows
                $num_rows = $stmt->rowCount();

                // Check if any rows were affected
                if ($num_rows > 0) {
                    // Redirect to member page
                    header("Location: http://localhost:8080/brief16/signup.php");
                    exit(); // Terminate the script
                } else {
                    // Handle the case where there are no affected rows
                    echo "No rows were affected.";
                }
            } else {
                echo 'your account already existe';
            }
        }
    }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ob_end_flush();





    ?>





</body>

</html>