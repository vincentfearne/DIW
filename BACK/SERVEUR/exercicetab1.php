<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
      
        <body>


<?php

$tab = array (
    "Janvier" => 31,
    "Fevrier" => 28,
    "Mars" => 31,
    "Avril" => 30,
    "Mai" => 31,
    "Juin" => 30,
    "Juillet" => 31,
    "Aout" => 31,
    "Septembre" => 30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Decembre" => 31
);

arsort($tab);

echo "<table border=2>";

foreach($tab as $cle => $valeur)
{
    echo "<tr>";
    echo "<td>" . $cle . " : " . $valeur . "</td>";
    echo "</tr>";
}


?>

</body>
</html>