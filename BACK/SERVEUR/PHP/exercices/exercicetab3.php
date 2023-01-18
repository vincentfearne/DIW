
<?php

$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);

echo "<br><h3> Liste des régions (par ordre alphabétique) suivie du nom des départements :</h3>";

ksort($departements);
foreach ($departements as $region => $valeur)
{
    echo $region . " : ";
    foreach ($valeur as $dep)
    {
        echo $dep . " ";
    }
    echo "<br>";
}

echo "<br>";

echo "<h3> Liste des régions suivie du nombre de départements :</h3>";

foreach ($departements as $region => $valeur)
{
    $nb = count($valeur);
    echo $region . " : ".$nb."<br>";
    
}

?>