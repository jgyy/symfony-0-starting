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

/*
def convert_and_display():
    d = [
        ('Hendrix' , '1942'),
        ('Allman' , '1946'),
        ('King' , '1925'),
        ('Clapton' , '1945'),
        ('Johnson' , '1911'),
        ('Berry' , '1926'),
        ('Vaughan' , '1954'),
        ('Cooder' , '1947'),
        ('Page' , '1944'),
        ('Richards' , '1943'),
        ('Hammett' , '1962'),
        ('Cobain' , '1967'),
        ('Garcia' , '1942'),
        ('Beck' , '1944'),
        ('Santana' , '1947'),
        ('Ramone' , '1948'),
        ('White' , '1975'),
        ('Frusciante', '1970'),
        ('Thompson' , '1949'),
        ('Burton' , '1939')
    ]
    year_dict = {}
    for name, year in d:
        if year in year_dict:
            year_dict[year].append(name)
        else:
            year_dict[year] = [name]
    for year, names in year_dict.items():
        print(f"{year} : {' '.join(names)}")

if __name__ == '__main__':
    convert_and_display()
*/

/*
#!/usr/bin/env -S ruby -w

def convert_to_hash
    data = [['Caleb' , 24],
            ['Calixte' , 84],
            ['Calliste', 65],
            ['Calvin' , 12],
            ['Cameron' , 54],
            ['Camil' , 32],
            ['Camille' , 5],
            ['Can' , 52],
            ['Caner' , 56],
            ['Cantin' , 4],
            ['Carl' , 1],
            ['Carlito' , 23],
            ['Carlo' , 19],
            ['Carlos' , 26],
            ['Carter' , 54],
            ['Casey' , 2]]
    hash = {}
    data.each do |name, age|
        hash[age] = name
    end
    hash.each do |age, name|
        puts "#{age} : #{name}"
    end
end
  
convert_to_hash
*/
?>
