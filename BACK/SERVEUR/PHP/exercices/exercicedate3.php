<?php

echo "<h3> Comment déterminer si une année est bissextile ? </h3>";


function is_leap_year($year)
{
    if($year %400 == 0)
    {
        return TRUE;
    }
        elseif ($year % 100 == 0)
        {
        return FALSE;
        }
        elseif ($year % 4 == 0)
            {
            return TRUE;
            }
            else
            {
            return FALSE;
            }
}



?>