<?php

function array2hash($input_array) {
    $result = array();
    
    foreach ($input_array as $pair) {
        if (count($pair) >= 2) {
            $name = $pair[0];
            $age = $pair[1];
            $result[$age] = $name;
        }
    }
    
    return $result;
}

?>
