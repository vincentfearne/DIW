<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    $id = $_GET["id"];

    // on lance une requête pour chercher la fiche correspondant à l'ID
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");

    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>disc_form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>



<body class="ml-2">
    
<h2>Modifications</h2>

<form action="script_disc_modif.php" method="post" class="form-group">

    <label>Disc ID</label><br>
    <input type="textbox" name="disc_id" value="<?= $tableau->disc_id ?>" readonly="readonly">
    <br><br>
    <label>Title</label><br>
    <input type="textbox" name="disc_title" value="<?= $tableau->disc_title ?>">
    <br><br>
    <label>Year</label><br>
    <input type="textbox" name="disc_year" value="<?= $tableau->disc_year ?>">
    <br><br>
    <label>Label</label><br>
    <input type="textbox" name="disc_label" value="<?= $tableau->disc_label ?>">
    <br><br>
    <label>Artist</label><br>
    <input type="textbox" name="artist_name" value="<?= $tableau->artist_name ?>" readonly="readonly">
    <br><br>
    <label>Genre</label><br>
    <input type="textbox" name="disc_genre" value="<?= $tableau->disc_genre ?>">
    <br><br>
    <label>Price</label><br>
    <input type="textbox" name="disc_price" value="<?= $tableau->disc_price ?>">
    <br><br>
    <label>Picture</label><br>
    <img src="<?= $tableau->disc_picture ?>" name="disc_picture">
    <input type="hidden" value="<?= $tableau->disc_picture ?>" name="disc_picture">
    <br>
    <br>
    <input type="submit" value="Valider">
    <input type="reset" value="Annuler">
    <br>
    <br>
</form>
<a class="btn btn-primary" href="discs.php" role="button">Retour</a>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>





</html>