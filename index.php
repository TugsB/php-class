<?php
echo "Hello world";


$fruits = ["Apple", "Orange", "Lemon", "Banana", "Kiwi"];

$i = 1;

foreach ($fruits as $fruit){
    echo "<p>Fruit nr. $i: ". $fruit."</p>";
}


$fruits2 = ["Apple" => 23, "Orange"=>52, "Lemon"=>4];
$max = 0;
$nameMax="";

foreach ($fruits2 as $name => $value){
    if($value>$max){
        $max = $value;
        $nameMax = $name;
    }
}

echo  "<p>---------</p>";

echo "Max:    ". $nameMax;