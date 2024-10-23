<?php

function search_by_states($search_string) {
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
    
    $search_terms = array_map('trim', explode(',', $search_string));
    $results = [];
    
    foreach ($search_terms as $term) {
        if (isset($states[$term])) {
            $state_code = $states[$term];
            if (isset($capitals[$state_code])) {
                $results[] = $capitals[$state_code] . " is the capital of " . $term . ".";
            }
        }
        elseif (in_array($term, $capitals, true)) {
            $state_code = array_search($term, $capitals);
            $state_name = array_search($state_code, $states);
            if ($state_name) {
                $results[] = $term . " is the capital of " . $state_name . ".";
            } else {
                $results[] = $term . " is neither a capital nor a state.";
            }
        }
        else {
            $results[] = $term . " is neither a capital nor a state.";
        }
    }
    
    return $results;
}

?>
