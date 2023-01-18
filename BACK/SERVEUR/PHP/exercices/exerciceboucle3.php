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

echo "<table border=2>";
for ($i=0;$i<13;$i++)
{
    
    echo ("<tr>");
    for ($j=0;$j<13;$j++)
    {
        echo "<td>";
        echo $i*$j;
        echo "</td>";
    }
    echo ("</tr>");
}
echo "</table>"
?>



</body>
</html>