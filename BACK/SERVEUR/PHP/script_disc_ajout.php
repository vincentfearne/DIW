<?php
    // Récupération du Nom :
    if (isset($_POST['disc_title']) && $_POST['disc_title'] != "") {
        $disc_title = $_POST['disc_title'];
    }
    else {
        $nom = Null;
    }

    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;
    $disc_id = (isset($_POST['disc_id']) && $_POST['disc_id'] != "") ? $_POST['disc_id'] : Null;
    $disc_title = (isset($_POST['disc_title']) && $_POST['disc_title'] != "") ? $_POST['disc_title'] : Null;
    $disc_year = (isset($_POST['disc_year']) && $_POST['disc_year'] != "") ? $_POST['disc_year'] : Null;
    $disc_genre = (isset($_POST['disc_genre']) && $_POST['disc_genre'] != "") ? $_POST['disc_genre'] : Null;
    $disc_label = (isset($_POST['disc_label']) && $_POST['disc_label'] != "") ? $_POST['disc_label'] : Null;
    $disc_price = (isset($_POST['disc_price']) && $_POST['disc_price'] != "") ? $_POST['disc_price'] : Null;
    $disc_picture = (isset($_POST['disc_picture']) && $_POST['disc_picture'] != "") ? $_POST['disc_picture'] : Null;
    $artist_id = (isset($_POST['artist_id']) && $_POST['artist_id'] != "") ? $_POST['artist_id'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($disc_title == Null || $disc_year == Null) {
        header("Location: disc_new.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();


try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("INSERT INTO disc (disc_id, disc_title, disc_year, disc_genre, disc_label, disc_price, disc_picture, artist_id)
    VALUES (:disc_id, :disc_title, :disc_year, :disc_genre, :disc_label, :disc_price, :disc_picture, :artist_id);");

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":disc_id", $disc_id, PDO::PARAM_STR);
    $requete->bindValue(":disc_title", $disc_title, PDO::PARAM_STR);
    $requete->bindValue(":disc_year", $disc_year, PDO::PARAM_STR);
    $requete->bindValue(":disc_genre", $disc_genre, PDO::PARAM_STR);
    $requete->bindValue(":disc_label", $disc_label, PDO::PARAM_STR);
    $requete->bindValue(":disc_price", $disc_price, PDO::PARAM_STR);
    $requete->bindValue(":disc_picture", $disc_picture, PDO::PARAM_STR);
    $requete->bindValue(":artist_id", $artist_id, PDO::PARAM_STR);

    // Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_artist_ajout.php)");
}

// Si OK: redirection vers la page discs.php
header("Location: discs.php");

// Fermeture du script
exit;
?>