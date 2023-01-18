<?php

echo "<h3> Affichez l'heure courante sous cette forme : 00h00 </h3>";

$heureactuelle = explode(':',date("H:i:s"));

echo "Il est ".$heureactuelle[0]."h".$heureactuelle[1].".";




?>