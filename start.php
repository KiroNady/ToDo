<?php
echo "Hello World!\n";
$x = 15;
$y = 94;

$any = "world";

echo "hello" . $any . "\n";


function mytest() {
    // to access the global var from the inside of a fun
    global $x;
    echo " $x inside \n";
    // or using an array of global 
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];

    echo "y = $GLOBALS[y] inside ";

}
 
echo "$x outside \n ";
echo "y = $y before \n";
mytest();

echo "y = $y after \n";

var_dump($x);
?>

