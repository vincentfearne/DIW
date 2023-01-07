<?php


 $myVar = "Bonjour le monde";


$fp = fopen("essai.txt", "a"); 


fputs($fp, $myVar); 

 
fclose($fp);

?>