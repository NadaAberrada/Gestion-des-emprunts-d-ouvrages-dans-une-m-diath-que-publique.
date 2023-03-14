<?php session_start();
ob_start();
// Check if the user is logged in
if (!isset($_GET['id'])) {
    // Redirect the user to the login page
    // header("Location: http://localhost:8080/brief16/acueilAdmin.php");
    exit;
} else {
    $received_code = $_GET['id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
        // set the PDO error mode to exception
        $content = $conn->query('SELECT * FROM `ouvrage`');

        while ($ligne = $content->fetch()) {
            if ($ligne['ouvre_id'] == $received_code) {
                // echo $ligne['montant'];
                $titre = $ligne['ouvre_titre'];
                $author = $ligne['ouvre_auteur'];
                $img = $ligne['ouvre_img'];
                $etat = $ligne['ouvre_etat'];
                $type = $ligne['ouvre_type'];

                $edition = $ligne['ouvre_editionD'];
                $achat = $ligne['ouvre_achatD'];
                $page = $ligne['ouvre_pages'];
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
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
        #border {
            box-sizing: border-box;

            position: absolute;
            width: 60%;
            height: 89%;
            left: 20%;
            top: 10%;

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
            <h3 class="mb-5 text-center">Edit Work</h3>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input name="title" type="text" id="title" class="form-control form-control-lg" value="<?php echo $titre; ?>" />

                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input name="author" type="text" id="author" class="form-control form-control-lg" value="<?php echo $author; ?>" />

                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="file" name="image" id="img" class="form-control form-control-lg" value="<?php echo $img; ?>" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <!-- <input name="etat" type="text" id="etat" class="form-control form-control-lg" value="<?php echo $etat; ?>" /> -->
                        <select class="form-select me-2" aria-label="Search category" name="etat">
                                <option value="<?php echo $etat; ?>" selected>your etat:<?php echo $etat; ?></option>
                                <option value="excellent">excellent</option>
                                <option value="bon">bon</option>
                                <option value="bon état">bon état</option>
                                <option value="drama">très bon</option>
                                <option value="new">new</option>
                                <option value="rip">rip</option>
                            </select>
                    </div>
                </div>

            </div>
            <div class="form-outline mb-4">
                <input name="type" type="text" id="type" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" value="<?php echo $type; ?>" />

            </div>
            <div class="form-outline mb-4">
                <h6 class="">DateEdition</h6>
                <input name="DateEdition" type="date" id="DateEdition" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" value="<?php echo $edition; ?>" />


            </div>
            <div class="form-outline mb-4">
                <h6 class="">DateAchat</h6>

                <input name="DateAchat" type="date" id="DateAchat" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" value="<?php echo $achat; ?>" />

            </div>
            <div class="form-outline mb-4">
                <input name="pages" type="text" id="pages" class="form-control form-control-lg" style="border: 1px solid #A5A1A1;" value="<?php echo $page; ?>" />

            </div>

            <div class="d-flex justify-content-center pt-3">
                <button type="submit" name="submit" class="btn  btn-block" style="background-color: #F7E1C1 ;">Edit</button>
            </div>

        </form>
    </div>
    <?php

    $id_AD = $_SESSION['idAdmin'];

    $idOuvrage = $_GET['id'];
    // $idOuvrage = $_POST['ouvre_id'];
    // echo $idOuvrage;
    // echo $id_AD;

    if (
        isset($_POST['title']) && isset($_POST['author']) && isset($_POST['etat'])
        && isset($_POST['DateEdition']) && isset($_POST['DateAchat']) && isset($_POST['pages'])
        && isset($_POST['type'])
    ) {
        $titlee = $_POST["title"];
        $authorr = $_POST["author"];
        $etatt = $_POST['etat'];
        $DateEditionn = $_POST["DateEdition"];
        $DateAchatt = $_POST["DateAchat"];
        $pagess = $_POST["pages"];
        $typee = $_POST["type"];
        echo $titlee;

        $fileName = $_FILES["image"]["name"];
        $fileType = $_FILES["image"]["type"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $fileError = $_FILES["image"]["error"];
        $fileSize = $_FILES["image"]["size"];
        $new_file_name =  $img;
        if (empty($_FILES["image"]["name"])) {
            $new_file_path  = $img;
            $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');



            $stmt = $conn->prepare("UPDATE `ouvrage` SET 
                                `ouvre_titre` = :title,
                                `ouvre_auteur` = :author,
                                `ouvre_img` = :img,
                                `ouvre_etat` = :etat,
                                `ouvre_type` = :type,
                                `ouvre_editionD` = :edit,
                                `ouvre_achatD` = :achat,
                                `ouvre_pages` = :page,
                                `bib-idB` = :bibid
                            WHERE `ouvre_id` = :idouvre");

            $stmt->bindParam(':title', $titlee);
            $stmt->bindParam(':author', $authorr);
            $stmt->bindParam(':img', $new_file_path);
            $stmt->bindParam(':etat', $etatt);
            $stmt->bindParam(':type', $typee);
            $stmt->bindParam(':edit', $DateEditionn);
            $stmt->bindParam(':achat', $DateAchatt);
            $stmt->bindParam(':page', $pagess);
            $stmt->bindParam(':bibid', $id_AD);
            $stmt->bindParam(':idouvre', $idOuvrage);

            $stmt->execute();

            header("Location:http://localhost:8080/brief16/acueilAdmin.php");
        } else {
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");

            // Get the file extension of the uploaded file
            $file_ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Check if the uploaded file extension is allowed
            if (!in_array($file_ext, $allowed_extensions)) {
                // Handle error: Invalid file extension
                exit("Invalid file extension");
            }

            // Set a maximum file size limit
            $max_size = 5000000; // 5MB

            // Check if the uploaded file size is within the limit
            if ($fileSize > $max_size) {
                // Handle error: File size too large
                exit("File size too large");
            }

            // Validate the uploaded file before storing it
            $image_info = getimagesize($fileTmpName);
            if (!$image_info) {
                // Handle error: Invalid image file
                exit("Invalid image file");
            }

            // Generate a unique file name
            $new_file_name_random = time() . "-" . $fileName;
            $new_file_path = "./image/" . $new_file_name_random;

            // Store the uploaded file
            if (!move_uploaded_file($fileTmpName, $new_file_path)) {
                // Handle error: Failed to store file
                exit("Failed to store file");
            }


            // Check if the file was uploaded without errors

            $conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');



            $stmt = $conn->prepare("UPDATE `ouvrage` SET 
                                `ouvre_titre` = :title,
                                `ouvre_auteur` = :author,
                                `ouvre_img` = :img,
                                `ouvre_etat` = :etat,
                                `ouvre_type` = :type,
                                `ouvre_editionD` = :edit,
                                `ouvre_achatD` = :achat,
                                `ouvre_pages` = :page,
                                `bib-idB` = :bibid
                            WHERE `ouvre_id` = :idouvre");

            $stmt->bindParam(':title', $titlee);
            $stmt->bindParam(':author', $authorr);
            $stmt->bindParam(':img', $new_file_path);
            $stmt->bindParam(':etat', $etatt);
            $stmt->bindParam(':type', $typee);
            $stmt->bindParam(':edit', $DateEditionn);
            $stmt->bindParam(':achat', $DateAchatt);
            $stmt->bindParam(':page', $pagess);
            $stmt->bindParam(':bibid', $id_AD);
            $stmt->bindParam(':idouvre', $idOuvrage);

            $stmt->execute();

            header("Location:http://localhost:8080/brief16/acueilAdmin.php");
        }
    }




    ob_end_flush();
    ?>






</body>

</html>