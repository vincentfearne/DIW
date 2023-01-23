<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>



<body>
<br>   
<h2 class="ml-2">Ajouter un Vinyle</h2>
<br>
<br>

<div class="form-group ml-2 mr-3">
<form action="script_disc_ajout.php" method="POST">

    <label for="disc_title">Title</label><br>
    <input type="text" name="disc_title" id="disc_title" class="form-control">
    <br>
    
    <label for="artist_name">Artist</label><br>
    <select name="artist_name" id="artist_name" class="form-control">
        <option value="">Choose an artist</option>
        <?php foreach ($tableau as $artist): ?>
            <option value = <?= $artist->artist_name ?>> <?= $artist->artist_name ?> </option>
        <?php endforeach; ?>
    </select>
    <br>
    
    <label for="disc_year">Year</label><br>
    <input type="text" name="disc_year" id="disc_year" class="form-control">
    <br>
    
    <label for="disc_genre">Genre</label><br>
    <input type="text" name="disc_genre" id="disc_genre" class="form-control">
    <br>
    
    <label for="disc_label">Label</label><br>
    <input type="text" name="disc_label" id="disc_label" class="form-control">
    <br>
   
    <label for="disc_price">Price</label><br>
    <input type="text" name="disc_price" id="disc_price" class="form-control">
    <br>
    
    <label for="disc_picture">Picture</label><br>
    <input type="file" id="disc_picture" name="disc_picture" accept="image/png, image/jpeg, image/jpg">
    <br>
    <br>
    <input type="submit" value="Envoyer">
    <input type="reset" value="Annuler">
   
</form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</body>

</html>