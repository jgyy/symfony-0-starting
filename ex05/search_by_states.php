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

/*
import sys

def search_term(states, capital_cities, term):
    term = term.strip().title()
    if term in states:
        state_code = states[term]
        capital = capital_cities[state_code]
        return f"{capital} is the capital of {term}"
    for state_code, capital in capital_cities.items():
        if capital == term:
            for state_name, code in states.items():
                if code == state_code:
                    return f"{capital} is the capital of {state_name}"
    return f"{term} is neither a capital city nor a state"

def all_in(search_string):
    states = {
        "Oregon" : "OR",
        "Alabama" : "AL",
        "New Jersey": "NJ",
        "Colorado" : "CO"
    }
    capital_cities = {
        "OR": "Salem",
        "AL": "Montgomery",
        "NJ": "Trenton",
        "CO": "Denver"
    }
    if not search_string or ",," in search_string:
        return
    terms = search_string.split(",")
    for term in terms:
        if term.strip():
            result = search_term(states, capital_cities, term)
            print(result)
if __name__ == '__main__':
    if len(sys.argv) == 2:
        all_in(sys.argv[1])
*/

/*
#!/usr/bin/env -S ruby -w

def search_location(input)
    return if input.nil? || input.empty?
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
    capitals_to_states = {}
    states.each do |state, abbrev|
        capital = capitals_cities[abbrev]
        capitals_to_states[capital.downcase] = [state, abbrev] if capital
    end
    return if input.include?(",,")
    input.split(",").each do |location|
        location = location.strip
        next if location.empty?
        location_lower = location.downcase   
        if capitals_to_states.key?(location_lower)
            state, abbrev = capitals_to_states[location_lower]
        puts "#{capitals_cities[abbrev]} is the capital of #{state} (akr: #{abbrev})"
        elsif states.key?(location)
            abbrev = states[location]
            puts "#{capitals_cities[abbrev]} is the capital of #{location} (akr: #{abbrev})"
        else
            puts "#{location} is neither a capital city nor a state"
        end
    end
end

search_location(ARGV[0]) if ARGV.length == 1
*/
?>
