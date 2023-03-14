<?php session_start();
// Check if the user is logged in
if (!isset($_SESSION['id'])) {
  // Redirect the user to the login page
  header("Location: http://localhost:8080/brief16/login.php");
  exit;
}
?>

<?php
$received_code = $_SESSION['id'];
// echo  $received_code;
try {
  $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
  // set the PDO error mode to exception
  $content = $conn->query('SELECT * FROM `adherent`');

  while ($ligne = $content->fetch()) {
    if ($ligne['adh_id'] == $received_code) {
      // echo $ligne['montant'];
      $nom = $ligne['adh_nom'];
      $adresse = $ligne['adh_adresse'];
      $tele = $ligne['adh_phone'];
      $email = $ligne['adh_email'];
      $dateN = $ligne['adh_dateN'];
      $type = $ligne["adh_type"];
      $username = $ligne['adh_userName'];
      $pass = $ligne['adh_pass'];
    }
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    #res {

      margin-top: 10%;

    }

    #penalty {
      margin-top: 15%;
      margin-bottom: 15%;
    }

    #resE {
      margin-top: 5%;
    }

    /* p{
      margin-top: 5%;
    } */
  </style>
</head>


<body>
  <div class="d-flex ">

    <nav id="sidebarMenu" class="col-md-5 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-4 sidebar-sticky text-center" style="background-color:  #f7e1c1;">
        <ul class="nav flex-column" style="margin: buttom 10px;">
          <img src="./image/logo.png" alt="" srcset="" style="width: 100px; margin-left: 90px" />

          <li class="nav-item" style="margin-top: 10%">
            <a class="nav-link active" aria-current="page" href="./acueil.php">
              <span data-feather="home" class="align-text-bottom" style="color:  black"> Home Page</span>

            </a>
          </li>
          <li class="nav-item" style="margin-top: 10%">
            <a class="nav-link" href="#res">
              <span data-feather="file" class="align-text-bottom" style="color:  black"> your Reservations befor 24H</span>

            </a>
          <li class="nav-item" style="margin-top: 10%">
            <a class="nav-link" href="#resE">
              <span data-feather="file" class="align-text-bottom" style="color:  black"> your Reservations</span>

            </a>
          <li class="nav-item" style="margin-top: 10%">
            <a class="nav-link" href="#penalty">
              <span data-feather="file" class="align-text-bottom" style="color:  black">penalty</span>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 10%;">
            <a class="nav-link" href="#edit">
              <span data-feather="file" class="align-text-bottom" style="color:  black"> Edit Profile</span>

            </a>
          </li>
          <li class="nav-item" style="margin-top: 10%;">
            <a class="nav-link">
              <span data-feather="file" class="align-text-bottom" style="color:  black"></span>

            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="edit">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="content">

                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control border-input" value="<?php echo $nom; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>UserName</label>
                        <input type="text" name="UserName" class="form-control border-input" value="<?php echo $adresse; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>tele</label>
                        <input name="Tele" type="text" id="tele" class="form-control form-control-lg" value="<?php echo $tele; ?>" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>date anniverser</label>
                        <input name="Date" type="Date" id="Date" class="form-control form-control-lg" value="<?php echo $dateN; ?>" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">


                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Adress</label>
                        <input name="Adress" type="text" id="Adress" class="form-control form-control-lg" value="<?php echo $adresse; ?>" required />
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label>type</label>
                        <select name="Type" id="type" style="border: 1px solid #A5A1A1;width:100%;height:6vh">
                          <option value="<?php echo $type; ?>"> your type :<?php echo $type; ?> </option>
                          <option value="Student">Student</option>
                          <option value="Official">Official</option>
                          <option value="Employee">Employee</option>
                          <option value="Housewife">Housewife</option>
                          <option value="another">another</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input name="Email" type="email" id="Email_Inp" class="form-control form-control-lg" value="<?php echo $email; ?>" style="border: 1px solid #A5A1A1;" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input name="Password" type="password" id="Adress" class="form-control form-control-lg" value="<?php echo $pass; ?>" required />
                      </div>
                    </div>
                  </div>

              </div>
              <div class="mt-4">
                <button type="submit" id="update-btn" class="btn btn-secondary btn-fill btn-wd">Update Profile</button>
                <!-- <button type="submit" id="save-btn" class="btn btn-secondary btn-fill btn-wd" style="display: none;">Update Profile</button> -->

                </button>

              </div>
              </form>

            </div>
          </div>
        </div>

      </div>
  </div>
  </main>
  </div>
  <?php
  $received_code = $_SESSION['id'];
  if (
    isset($_POST['Name']) && isset($_POST['UserName']) && isset($_POST['Tele'])
    && isset($_POST['Email']) && isset($_POST['Date']) && isset($_POST['Type'])
    && isset($_POST['Password'])
  ) {

    $nom = $_POST['Name'];
    $adresse = $_POST['Adress'];
    $tele = $_POST['Tele'];
    $email = $_POST['Email'];
    $dateN = $_POST['Date'];
    $type = $_POST['Type'];
    $username = $_POST['UserName'];
    $pass = $_POST['Password'];


    try {
      $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("UPDATE `adherent` SET 
      `adh_nom`=:nom, `adh_adresse`=:adresse,
      `adh_email`=:email, `adh_phone`=:tele,
      `adh_dateN`=:dateN, `adh_type`=:type,
      `adh_userName`=:username, `adh_pass`=:pass
      WHERE `adh_id`=:ida");

      $stmt->bindParam(':nom', $nom);
      $stmt->bindParam(':adresse', $adresse);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':tele', $tele);
      $stmt->bindParam(':dateN', $dateN);
      $stmt->bindParam(':type', $type);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':pass', $pass);
      $stmt->bindParam(':ida', $received_code);

      $stmt->execute();

      // header("Refresh:0");
      // echo "Record updated successfully";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  ?>

  <div id="res" class=" container mb-5 ">
    <div class="">
      <p class="h3 text-center bg-warning-subtle"> you can Delete Your Reservations Befor 24H</p>

      <?php

      $id = $_SESSION['id'];

      $group = " GROUP BY `ouvre_titre`";

      try {


        $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // modify query to include filter conditions
        $stmt = $conn->prepare("SELECT DISTINCT o.*
        FROM Ouvrage o
        INNER JOIN Reservation r ON o.ouvre_id = r.ouvre_id
        INNER JOIN emprunt e ON r.reserve_id != e.reserve_id
        WHERE r.`A_id` = $id;");

        $stmt->execute();

        echo "<div class='container text-center' style='display: block;margin-top:5%'>";
        echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5'>";

        while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {


          echo '<div class="col">
                    <div class="card" style="box-shadow: 6px 5px 17px rgba(0, 0, 0, 0.32);">
                    <img id="card_img" src="' . $ligne['ouvre_img'] . '" alt="' . $ligne['ouvre_titre'] . '" width="100%" height="225" fill="none">
                    <div class="card-body">
                        <h4 id="card_title">' . $ligne['ouvre_titre'] . '</h4>
                        <p id="card_price fw-light">' . $ligne['ouvre_auteur'] . '</p>
                        <h5 id="annonce-type" class="text-danger">' . $ligne['ouvre_type'] . '</h5>
                        <h5 id="annonce-type" class=""> ' . $ligne['ouvre_etat'] . '</h5>

                        <div class="d-flex justify-content-center align-items-center" style="margin-top: 9%;">
                            <div class="btn-group">
                                <a  href="AnnulerReservation.php"id="Reserve" class="btn btn-l btn-outline-secondary" style="background-color: #f7e1c1; border-radius: 22px; color: black;" >Delete</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
          </div>
                <br>';
          $_SESSION['ouvredelete'] =  $ligne['ouvre_id'];
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      ?>
    </div>
  </div>



  <div id="resE" class="container bg-body text-body ">
    <p class="h3 text-center bg-warning-subtle"> Your Reservations</p>

    <?php

    $id = $_SESSION['id'];

    $group = " GROUP BY `ouvre_titre`";

    try {


      $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("SELECT DISTINCT o.*
      FROM ouvrage o
      INNER JOIN reservation r ON o.ouvre_id = r.ouvre_id
      INNER JOIN emprunt e ON r.reserve_id = e.reserve_id
      WHERE r.A_id= $id");

      $stmt->execute();

      echo "<div class='container text-center' style='display: block;margin-top:5%''>";
      echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5'>";

      while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ates = $ligne['ouvre_img'];

        echo '<div class="col">
 <div class="card" style="box-shadow: 6px 5px 17px rgba(0, 0, 0, 0.32);">
<img id="card_img" src="' . $ligne['ouvre_img'] . '" alt="' . $ligne['ouvre_titre'] . '" width="100%" height="225" fill="none">
<div class="card-body">
    <h4 id="card_title">' . $ligne['ouvre_titre'] . '</h4>
    <p id="card_price fw-light">' . $ligne['ouvre_auteur'] . '</p>
    <h5 id="annonce-type" class="text-danger">' . $ligne['ouvre_type'] . '</h5>
    <h5 id="annonce-type" class=""> ' . $ligne['ouvre_etat'] . '</h5>

    
</div>
</div>
</div>
</div><br>';
        $_SESSION['ouvre_id'] =  $ligne['ouvre_id'];
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?>

  </div>
  <div id="penalty">
    <p class="h3 text-center">Any person who accumulates more than three penalties will not be allowed to continue borrowing books,
      and their account will be immediately locked.</p>
    <?php
    $id = $_SESSION['id'];
    $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT `adh_pénalités` FROM `adherent` WHERE `adh_id`= $id and `adh_pénalités`>0 ");

    $stmt->execute();
    $Ligne = $stmt->fetch();

    if (is_array($Ligne)) {
      echo " <p class='h3 text-center'> Your Penalties are :" . $Ligne['adh_pénalités'] . "</p>";
    } else {
      echo " <p class='h3 text-center'> You have no penalty.</p>";
    }

    ?>

  </div>

</body>

</html>