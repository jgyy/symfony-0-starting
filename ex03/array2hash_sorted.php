<?php

function array2hash_sorted($array) {
    $result = array();
    
    foreach ($array as $item) {
        if (count($item) >= 2) {
            $name = $item[0];
            $age = $item[1];
            $result[$name] = $age;
        }
    }
    
    krsort($result);
    
    return $result;
}

?>
