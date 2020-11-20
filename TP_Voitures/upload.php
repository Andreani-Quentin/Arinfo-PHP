<?php
try 
{
        $pdo = new PDO('mysql:host=localhost;dbname=location;port=3306', 'root', '0f78dhch',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST))
        {
            $immatriculation = $_POST['immatriculation'];
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            $image = "uploads/".$_FILES['fileToUpload']['name'];
        }

                //$sth appartient à la classe PDOStatement
        $sth = $pdo->prepare("
            INSERT INTO voitures(immatriculation,marque,modele,annee,image)
            VALUES (:immatriculation, :marque, :modele, :annee, :image)");

        $sth->execute(array(
            ':immatriculation' => $immatriculation,
            ':marque' => $marque,
            ':modele' => $modele,
            ':annee' => $annee,
            ':image' => $image)); 
    
    /*===================================> Upload Image <===================================*/
    
    /////////////////////////////Create The Upload File PHP Script/////////////////////////////

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    ////////////////////////////Check if File Already Exists///////////////////////////////////

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

    ////////////////////////////Limit File Type///////////////////////////////////

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    ////////////////////////////Complete Upload File PHP Script////////////////////////////

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

}

    catch (PDOException $e) 
    {
        echo "Erreur : " . $e->getMessage();
    }

     header('Location: index.php');
?>