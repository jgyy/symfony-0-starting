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

/*
import sys

def find_state(capital):
    states = {
        "Oregon": "OR",
        "Alabama": "AL",
        "New Jersey": "NJ",
        "Colorado": "CO"
    }
    capital_cities = {
        "OR": "Salem",
        "AL": "Montgomery",
        "NJ": "Trenton",
        "CO": "Denver"
    }
    state_abbrev = None
    for abbrev, city in capital_cities.items():
        if city == capital:
            state_abbrev = abbrev
            break
    if state_abbrev:
        for state, abbrev in states.items():
            if abbrev == state_abbrev:
                return state
    return "Unknown capital city"

def main():
    if len(sys.argv) != 2:
        return
    capital = sys.argv[1]
    result = find_state(capital)
    print(result)

if __name__ == '__main__':
    main()
*/

/*
#!/usr/bin/env -S ruby -w

def find_state_by_capital(capital)
    states = {
        "Oregon" => "OR",
        "Alabama" => "AL",
        "New Jersey" => "NJ",
        "Colorado" => "CO"
    }
    capitals_cities = {
        "OR" => "Salem",
        "AL" => "Montgomery",
        "NJ" => "Trenton",
        "CO" => "Denver"
    }
    state_abbrev = capitals_cities.key(capital)
    return "Unknown capital city" if state_abbrev.nil?
    states.each do |state_name, abbrev|
        return state_name if abbrev == state_abbrev
    end
end
  
puts find_state_by_capital(ARGV[0]) if ARGV.length == 1
*/
?>
