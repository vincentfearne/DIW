<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Liste</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<br>
<div class="row mx-auto">
    <h2 class="col-11">Liste des disques</h2>
    <a class="btn btn-primary" href="disc_new.php" role="button">Ajouter</a>
</div>
<br>

<table class="table table-hover table-bordered">
        <tr>
            <th width=50px>ID</th>
            <th width=300px>Jaquette</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Label</th>
            <th>Genre</th>
            <th>Prix</th>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>

        <?php foreach ($tableau as $disc): ?>
        <tr>
            <td><?= $disc->disc_id ?></td>
            <td><img src="<?= $disc->disc_picture ?>" width=60%></td>
            <td><?= $disc->disc_title ?></td>
            <td><?= $disc->disc_year ?></td>
            <td><?= $disc->disc_label ?></td>
            <td><?= $disc->disc_genre ?></td>
            <td><?= $disc->disc_price ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a class="btn btn-primary" role="button" href="disc_detail.php?id=<?= $disc->disc_id ?>">Détail</a></td>
        </tr>
        <?php endforeach; ?>

    </table>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>