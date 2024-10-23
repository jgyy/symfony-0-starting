<?php

if (!file_exists('ex01.txt')) {
    die("Error: ex01.txt file not found\n");
}

$content = file_get_contents('ex01.txt');

$content = trim($content);

$values = explode(',', $content);

foreach ($values as $value) {
    echo trim($value) . "\n";
}

?>
