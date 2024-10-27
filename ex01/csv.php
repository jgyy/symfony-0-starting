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

/*
def display_numbers():
    try:
        with open('ex01.txt', 'r') as file:
            numbers = file.read().split(',')
            for number in numbers:
                print(number)
    except FileNotFoundError:
        print("Error: numbers.txt file not found")
    except Exception as e:
        print(f"Error: {e}")

if __name__ == '__main__':
    display_numbers()
*/

/*
#!/usr/bin/env -S ruby -w

def sort_numbers_from_file
    begin
        numbers_text = File.read('ex01.txt')
        numbers = numbers_text.split(',').map(&:strip).map(&:to_i)
        sorted_numbers = numbers.sort
        sorted_numbers.each { |num| puts num }
    rescue Errno::ENOENT
        puts "Error: numbers.txt file not found"
    rescue => e
        puts "Error: #{e.message}"
    end
end
  
sort_numbers_from_file
*/
?>
