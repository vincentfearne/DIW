<?php

echo "<br><h3>Ecrivez une fonction qui calcul la somme des valeurs d'un tableau :</h3>";

function somme($tab)
{
    $a=0;
    $i=0;
   for($i;$i<count($tab);$i++)
   {
        $a=$a+$tab[$i];
   }
   return $a;
}

$tab = array(4, 3, 8, 2);

$resultat = somme($tab);

echo "Le résultat est : ".$resultat;

?>


