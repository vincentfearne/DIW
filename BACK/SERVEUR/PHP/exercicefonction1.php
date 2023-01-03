<?php

function Test1 () 
{ 
   static $a=0; 
   echo "$a<br />"; 
   $a++;
} 

// Appel de la fonction (3 fois)
Test1(); 
Test1(); 
Test1(); 

?>