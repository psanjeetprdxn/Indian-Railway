<?php

/*
************************************************************************************************************
    FUNCTION TO CALCULATE HOW LONG A PARTICLULAR PERSON IS GOING TO TAKE TO GET ALL THE TICKETS IN A QUEUE
************************************************************************************************************
*/

function waitingTime(array $tickets, int $p)
{
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

?>
