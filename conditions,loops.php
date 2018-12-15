<?php
$t = date("H");

if ($t < "12"){
    echo "have a nice day\n";
}
elseif($t  < "20" ){
    echo "good night\n";
}

$x = 0;


while($x <= 5){
    echo "$x   ";
    $x++;
}

for ($x = 0; $x <=10; $x++){
    echo "the number is $x \t";
}

echo "\n";


$colors = array("red" , "green" , "blue" , "yellow");

foreach ($colors as $val) {
    echo "$val    ";
}

echo "\n";

for ($row = 0; $row<4; $row++){
    for ($col = 0; $col < 4; $col++){
        $cars[$row][$col] = $col*$row; 
        
    }
}

print_r ($cars);
?>

