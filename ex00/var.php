<?php

$a = 10;
$b = "10";
$c = "ten";
$d = 10.0;

echo "My first variables:\n";
echo "a contains : " . $a . " and has type : " . gettype($a) . "\n";
echo "b contains : " . $b . " and has type : " . gettype($b) . "\n";
echo "c contains : " . $c . " and has type : " . gettype($c) . "\n";
echo "d contains : " . $d . " and has type : " . gettype($d) . "\n";

/*
def my_var():
    var1 = 42
    var2 = "42"
    var3 = "quarante-deux"
    var4 = 42.0
    var5 = True
    var6 = [42]
    var7 = {42: 42}
    var8 = (42,)
    var9 = set()
    print(f"{var1} has a type {type(var1)}")
    print(f"{var2} has a type {type(var2)}")
    print(f"{var3} has a type {type(var3)}")
    print(f"{var4} has a type {type(var4)}")
    print(f"{var5} has a type {type(var5)}")
    print(f"{var6} has a type {type(var6)}")
    print(f"{var7} has a type {type(var7)}")
    print(f"{var8} has a type {type(var8)}")
    print(f"{var9} has a type {type(var9)}")

if __name__ == '__main__':
    my_var()
*/

/*
#!/usr/bin/env -S ruby -w

def my_var
    a = 10
    b = "10"
    c = nil
    d = 10.0
    puts "my variables :"
    puts "    a contains: #{a} and is a type: #{a.class}"
    puts "    b contains: #{b} and is a type: #{b.class}"
    if c.nil?
        puts "    c contains: nil and is a type: #{c.class}"
    else
        puts "    c contains: #{c} and is a type: #{c.class}"
    end
    puts "    d contains: #{d} and is a type: #{d.class}"
end

my_var
*/
?>
