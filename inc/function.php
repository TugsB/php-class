<?php

function sestej(int $a, int $b = 1, int $c){
    echo $a + $b + $c;
}
$sestevek = sestej(3, 2, 3);
echo $sestevek;

function primer($parameter){
    return 'neki';
}
primer("nekiParameter");