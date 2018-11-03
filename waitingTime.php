<?php

/*
************************************************************************************************************
    FUNCTION TO CALCULATE HOW LONG A PARTICLULAR PERSON IS GOING TO TAKE TO GET ALL THE TICKETS IN A QUEUE
************************************************************************************************************
*/

function waitingTime(array $tickets, int $p)
{
    /*CHECKS IF THE VALUE PASSED IN AN ARRAY IS A VALID INTEGER*/
    if (!checkInt($tickets)) {
        return "Value must be an Integer and not a decimal. Eg (1,2,,8,100)";
        exit;
    }
    /*CHECKS IF THE POSITION IS VALID IN A QUEUE*/
    if (!(($p < count($tickets)) and $p >= 0)) {
        echo "Not a valid position in a queue.";
        exit;
    }

    /*Size of $tickets indicates how long is the queue and each value indiacates how much ticket they want to buy*/
    /*$p is the position of that particular person in a queue*/
    /*$i is used to track index of queue*/
    /*INITIALLLY TIME IS ZERO*/
    $time = 0;
    /*COUNTS TIME (IN SECONDS) FOR THE PEOPLE STANDING IN FRONT THE PERSON*/
    for ($i = 0; $i <= $p; $i++) {
        if ($tickets[$i] <= $tickets[$p]) {
            $time += $tickets[$i];
        } else {
            $time += $tickets[$p];
        }
    }
    /*COUNTS TIME (IN SECONDS) FOR THE PEOPLE STANDING BEHIND THE PERSON*/
    for ($i = $p + 1; $i < count($tickets); $i++) {
        if ($tickets[$i] >= $tickets[$p]) {
            $time += $tickets[$p] - 1;
        } else {
            $time += $tickets[$i];
        }
    }
    return $time;
}

/*
Eg: echo waitingTime(array(1,2,3,4), 2);
*/


/*
*******************************************************************************************
    CHECKS IF AN ARRAY CONTAINS POSITIVE INTEGERS AND NOT A DECIMAL OR NEGATIVE VALUE
    RETURNS BOOLEAN 
*******************************************************************************************
*/
function checkInt(array $tickets)
{
    $isValid = true;
    foreach ($tickets as $ticket) {
        if (is_int($ticket)) {                          /*CHECKS IF IT CONTAINS INTEGER AND NOT OTHER VALUES*/  
            if ($ticket % 1 != 0 or $ticket <= 0) {     /*CHECKS FOR VALUE WHICH IS NOT DECIMAL AND NOT LESS THAN ZERO*/
                $isValid = false;
                break;
            }
        } else {
            $isValid = false;
            break;
        }
    }
    return $isValid;
}
?>
