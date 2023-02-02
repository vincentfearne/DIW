<?php



    // Récupération de l'ID :
    $id = $_GET["id"];
    
    // En cas d'erreur, on renvoie vers le formulaire
    if ($id == Null) {
        header("Location: discs.php");
    }

    // // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();

    // Construction de la requête DELETE sans injection SQL :
    try {
        $requete = $db->prepare("DELETE FROM disc WHERE disc_id = ?");
        $requete->execute(array($_GET["id"]));
        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    // Si OK: redirection vers la page discs.php
    header("Location: discs.php");
    exit;
    ?>