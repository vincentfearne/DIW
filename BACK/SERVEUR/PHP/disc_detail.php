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
    <title>Disc_detail</title>
    <link rel="stylesheet" href="disc.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>



<body class="ml-2">
<br>
<h1 class="ml-3">Détails</h1>
<br>

<div class="container-fluid">
<form class="form-group">

<div class="card text-white bg-info mb-3 border-info" id="card" style="width: 18%;">
    <img class="card-img-top" src="<?= $tableau->disc_picture ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $tableau->disc_title ?></h5>
            <div class="card-text form-group">
                <input type="hidden" value="<?= $tableau->disc_id ?>">
                <label>Title</label><br>
                <input type="textbox" value="<?= $tableau->disc_title ?>" readonly="readonly">
                <br><br>
                <label>Year</label><br>
                <input type="textbox" value="<?= $tableau->disc_year ?>" readonly="readonly">
                <br><br>
                <label>Label</label><br>
                <input type="textbox" value="<?= $tableau->disc_label ?>" readonly="readonly">
                <br><br>
                <label>Artist</label><br>
                <input type="textbox" value="<?= $tableau->artist_name ?>" readonly="readonly">
                <br><br>
                <label>Genre</label><br>
                <input type="textbox" value="<?= $tableau->disc_genre ?>" readonly="readonly">
                <br><br>
                <label>Price</label><br>
                <input type="textbox" value="<?= $tableau->disc_price ?>" readonly="readonly">
                <br><br>
            </div>
            <a class="btn btn-primary" role="button" href="disc_form.php?id=<?= $tableau->disc_id ?>">Modifier</a>
            <a class="btn btn-primary" role="button" href="script_disc_delete.php?id=<?= $tableau->disc_id ?>" role="button">Supprimer</a>
            <a class="btn btn-primary" href="discs.php" role="button">Retour</a>
    </div>
</div>
    <br>
    <br>

</form>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>





</html>