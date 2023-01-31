<?php
    // Récupération des valeurs :
     $disc_id = (isset($_POST['disc_id']) && $_POST['disc_id'] != "") ? $_POST['disc_id'] : Null;
     $disc_title = (isset($_POST['disc_title']) && $_POST['disc_title'] != "") ? $_POST['disc_title'] : Null;
     $disc_year = (isset($_POST['disc_year']) && $_POST['disc_year'] != "") ? $_POST['disc_year'] : Null;
     $disc_label = (isset($_POST['disc_label']) && $_POST['disc_label'] != "") ? $_POST['disc_label'] : Null;
     $artist_name = (isset($_POST['artist_name']) && $_POST['artist_name'] != "") ? $_POST['artist_name'] : Null;
     $disc_genre = (isset($_POST['disc_genre']) && $_POST['disc_genre'] != "") ? $_POST['disc_genre'] : Null;
     $disc_price = (isset($_POST['disc_price']) && $_POST['disc_price'] != "") ? $_POST['disc_price'] : Null;
     $disc_picture = (isset($_POST['disc_picture']) && $_POST['disc_picture'] != "") ? $_POST['disc_picture'] : Null;



    // En cas d'erreur, on renvoie vers le formulaire
    if ($disc_id == Null) {
        header("Location: disc_form.php");
    }
    elseif ($disc_title == Null || $disc_year == Null || $disc_label == Null || $artist_name == Null || $disc_genre == Null || $disc_price == Null || $disc_picture == Null) {
        header("Location: disc_form.php?id=". $disc_id);
        exit;
    }

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE disc SET disc_title = :disc_title, disc_year = :disc_year, disc_label = :disc_label, disc_genre = :disc_genre, disc_price = :disc_price, disc_picture = :disc_picture WHERE disc_id = :disc_id");
    
        $requete->bindValue(":disc_title", $disc_title, PDO::PARAM_STR);
        $requete->bindValue(":disc_year", $disc_year, PDO::PARAM_STR);
        $requete->bindValue(":disc_label", $disc_label, PDO::PARAM_STR);
        $requete->bindValue(":disc_genre", $disc_genre, PDO::PARAM_STR);
        $requete->bindValue(":disc_price", $disc_price, PDO::PARAM_STR);
        $requete->bindValue(":disc_picture", $disc_picture, PDO::PARAM_STR);
        $requete->bindValue(":disc_id", $disc_id, PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: disc_detail.php?id=" . $disc_id);
    exit;