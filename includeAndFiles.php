<?php 

include 'start.php';

//mytest();

//echo readfile("web.txt");

echo "\n";

$myfile = fopen("web.txt" , "r" ) or die("unable to open file");
//echo fread($myfile , filesize("web.txt"));
fclose($myfile);


$myfile = fopen("web.txt" , "r" ) or die("unable to open file");
echo fgets($myfile); // get the first line move the pointer to the next one


while (!feof($myfile)){ // end of file
    echo fgets($myfile). "   " ;
}



//echo fgetc($myfile); // one char
fclose($myfile);

echo "\n";


// write to a file

$myfile = fopen("new.txt" , "w") or die("error opening");
fwrite($myfile , "anything you wanna write  in the file \n");

fclose($myfile);

?>