<?php

echo "<h3> Combien reste-t-il de jours avant la fin de votre formation ?</h3>";

$echeance = '2023/02/03';

echo 'Nombre de jour avant la fin de la formation : ',floor((strtotime($echeance)-time())/86400)."<br>";


?>