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

/*
def sort_by_year_name():
    d = {
        'Hendrix' : '1942',
        'Allman' : '1946',
        'King' : '1925',
        'Clapton' : '1945',
        'Johnson' : '1911',
        'Berry' : '1926',
        'Vaughan' : '1954',
        'Cooder' : '1947',
        'Page' : '1944',
        'Richards' : '1943',
        'Hammett' : '1962',
        'Cobain' : '1967',
        'Garcia' : '1942',
        'Beck' : '1944',
        'Santana' : '1947',
        'Ramone' : '1948',
        'White' : '1975',
        'Frusciante': '1970',
        'Thompson' : '1949',
        'Burton' : '1939',
    }
    musicians = [(name, year) for name, year in d.items()]
    sorted_musicians = sorted(musicians, key=lambda x: (x[1], x[0]))
    for musician, _ in sorted_musicians:
        print(musician)

if __name__ == '__main__':
    sort_by_year_name()
*/

/*
#!/usr/bin/env -S ruby -w

def display_sorted_names
    data = [
        ['Frank', 33],
        ['Stacy', 15],
        ['Juan' , 24],
        ['Dom' , 32],
        ['Steve', 24],
        ['Jill' , 24]
    ]
    sorted_data = data.sort_by { |person| [person[1], person[0]] }
    sorted_data.each do |person|
        puts person[0]
    end
end
  
display_sorted_names
*/
?>
