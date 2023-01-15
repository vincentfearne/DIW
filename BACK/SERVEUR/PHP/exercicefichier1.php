<?php

$fichier = "lien.txt";
$tabfichier = file($fichier);
$i=0;

for($i=0;$i<count($tabfichier);$i++)
{
    $fp = fopen("lien.html", "a");
    fputs($fp, "<a href= $tabfichier[$i]></a>");
}

?>