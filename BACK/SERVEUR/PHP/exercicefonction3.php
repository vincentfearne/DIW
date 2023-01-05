<?php



function verif($a)
{
// $majuscule = preg_match('^[A-Z]+$', $a);
// $minuscule = preg_match('^[a-z]+$', $a);
// $nombre    = preg_match('^[0-9]+$', $a);
$regex = preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $a);

if($a != $regex)
{
    echo "Mot de passe incorrect";
}
else {
    echo "Mot de passe OK";
}
}

verif("TopSecret42");
