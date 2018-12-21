<?php
foreach (filter_list() as $id => $filter ){
    echo   $filter ."   ". filter_id($filter) . "\n";
}

// filter html tags
$str = "<h1>Hello World!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr. "\n";



$int = "100000000000000000s";
echo filter_var($int, FILTER_VALIDATE_INT) . "\n";

$ip = "127.0.1.1";
echo filter_var($ip , FILTER_VALIDATE_IP) . "\n";

$email = "john.doe@example.com";

// Remove all illegal characters from email
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
echo $email . "\n";

//url with or without a query string

$url = "http://localhost:8080/?file='file'";

$check = filter_var($url , FILTER_VALIDATE_URL , FILTER_FLAG_QUERY_REQUIRED);

echo $check."\n";
?>