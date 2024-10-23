<?php
$states = [
    'Oregon' => 'OR',
    'Alabama' => 'AL',
    'New Jersey' => 'NJ',
    'Colorado' => 'CO'
];

$capitals = [
    'OR' => 'Salem',
    'AL' => 'Montgomery',
    'NJ' => 'trenton',
    'KS' => 'Topeka'
];

function capital_city_from($state_name) {
    global $states, $capitals;
    
    if (!isset($states[$state_name])) {
        return "Unknown\n";
    }
    
    $state_code = $states[$state_name];
    
    if (!isset($capitals[$state_code])) {
        return "Unknown\n";
    }
    
    return $capitals[$state_code] . "\n";
}

?>
