<?php

echo "<h3>Ecrivez une fonction qui permette de générer un lien :</h3>";

function faireunlien($lien,$texte)
{
   echo "<a href=$lien>".$texte;
}

faireunlien("https://www.reddit.com/", "Reddit Hug");

