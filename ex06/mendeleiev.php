<?php

$elements = [];
$lines = file('ex06.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    if (preg_match('/^(\w+)\s*=\s*position:(\d+),\s*number:(\d+),\s*small:\s*(\w+),\s*molar:([\d.]+),\s*electron:(.+)$/', $line, $matches)) {
        $elements[] = [
            'name' => $matches[1],
            'position' => (int)$matches[2],
            'number' => (int)$matches[3],
            'symbol' => $matches[4],
            'molar' => $matches[5],
            'electron' => $matches[6]
        ];
    }
}

// python3 -m http.server 8080
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Periodic Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        table {
            border-collapse: separate;
            border-spacing: 2px;
            margin: 0 auto;
        }
        .element {
            width: 70px;
            height: 80px;
            padding: 4px;
            text-align: center;
            position: relative;
            transition: transform 0.2s;
            border-radius: 2px;
            background-color: #d6d6d6;
        }
        .element:hover {
            transform: scale(2);
            z-index: 1;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        .number {
            font-size: 10px;
            text-align: left;
        }
        .symbol {
            font-size: 18px;
            font-weight: bold;
            margin: 4px 0;
        }
        .name {
            font-size: 10px;
            margin-bottom: 2px;
        }
        .mass {
            font-size: 9px;
            color: #666;
        }
        .empty {
            width: 70px;
            height: 80px;
            border: none;
        }
    </style>
</head>
<body>
<table>';

$maxRows = 10;
$maxCols = 18;
$table = array_fill(0, $maxRows, array_fill(0, $maxCols, null));

foreach ($elements as $element) {
    $row = null;
    $col = $element['position'];
    $num = $element['number'];

    if ($num <= 2) $row = 0;
    elseif ($num <= 10) $row = 1;
    elseif ($num <= 18) $row = 2;
    elseif ($num <= 36) $row = 3;
    elseif ($num <= 54) $row = 4;
    elseif ($num <= 86) {
        $row = 5;
        if ($num > 57 && $num < 72) continue;
    } else {
        $row = 6;
        if ($num > 89 && $num < 104) continue;
    }

    if ($row !== null) {
        $table[$row][$col] = $element;
    }
}

for ($row = 0; $row < $maxRows; $row++) {
    $html .= '<tr>';
    for ($col = 0; $col < $maxCols; $col++) {
        if (isset($table[$row][$col])) {
            $element = $table[$row][$col];
            $html .= sprintf('
                <td class="element">
                    <div class="number">%d</div>
                    <div class="symbol">%s</div>
                    <div class="name">%s</div>
                    <div class="mass">%s</div>
                </td>',
                $element['number'],
                htmlspecialchars($element['symbol']),
                htmlspecialchars($element['name']),
                $element['molar']
            );
        } else {
            $html .= '<td class="empty"></td>';
        }
    }
    $html .= '</tr>';
}

$html .= '</table></body></html>';

file_put_contents('mendeleiev.html', $html);

/*
def parse_element(line):
    """Parse a single element line into a dictionary."""
    name, data = line.strip().split(' = ')
    properties = {}
    properties['name'] = name
    for prop in data.split(', '):
        key, value = prop.split(':')
        properties[key] = value
    return properties

def create_element_cell(element):
    """Create an HTML table cell for an element."""
    return f"""    <td class="element">
        <div class="number">{element['number']}</div>
        <div class="symbol">{element['small']}</div>
        <div class="name">{element['name']}</div>
        <div class="mass">{element['molar']}</div>
    </td>"""

def generate_periodic_table():
    """Generate the complete periodic table HTML."""
    elements = []
    with open('ex06.txt', 'r') as f:
        for line in f:
            elements.append(parse_element(line))
    grid = [[None for _ in range(18)] for _ in range(10)]
    for element in elements:
        position = int(element['position'])
        row = 0
        num = int(element['number'])
        if num <= 2:
            row = 0
        elif num <= 10:
            row = 1
        elif num <= 18:
            row = 2
        elif num <= 36:
            row = 3
        elif num <= 54:
            row = 4
        elif num <= 86:
            row = 5
        elif num <= 118:
            row = 6
        grid[row][position] = element
    html = """<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Periodic Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        table {
            border-collapse: separate;
            border-spacing: 2px;
            margin: 0 auto;
        }
        .element {
            width: 70px;
            height: 80px;
            padding: 4px;
            text-align: center;
            position: relative;
            transition: transform 0.2s;
            border-radius: 2px;
            background-color: #d6d6d6;
        }
        .element:hover {
            transform: scale(2);
            z-index: 1;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        .number {
            font-size: 10px;
            text-align: left;
        }
        .symbol {
            font-size: 18px;
            font-weight: bold;
            margin: 4px 0;
        }
        .name {
            font-size: 10px;
            margin-bottom: 2px;
        }
        .mass {
            font-size: 9px;
            color: #666;
        }
        .empty {
            width: 70px;
            height: 80px;
            border: none;
        }
    </style>
</head>
<body>
    <table>"""
    for row in grid:
        if any(row):
            html += "\n        <tr>"
            for element in row:
                if element:
                    html += "\n" + create_element_cell(element)
                else:
                    html += '\n            <td class="empty"></td>'
            html += "\n        </tr>"
    html += """
    </table>
</body>
</html>"""
    with open('periodic_table.html', 'w') as f:
        f.write(html)

if __name__ == '__main__':
    generate_periodic_table()
*/

/*
#!/usr/bin/env -S ruby -w

def parse_element(line)
    name, attributes = line.split(' = ')
    attrs = attributes.split(', ').map do |attr|
        key, value = attr.split(':')
        [key, value]
    end.to_h
    attrs['name'] = name
    attrs
end

def create_element_html(element)
    <<~HTML
        <td class="element box">
            <div class="number">#{element['number']}</div>
            <div class="symbol">#{element['small']}</div>
            <div class="name">#{element['name']}</div>
            <div class="mass">#{element['molar']}</div>
        </td>
    HTML
end

def create_empty_cell
    '<td class="empty"></td>'
end

def generate_periodic_table
    elements = File.readlines('periodic_table.txt').map { |line| parse_element(line.chomp) }
    # python3 -m http.server 8080
    html = <<~HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Periodic Table</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    background-color: #f5f5f5;
                }
                table {
                    border-collapse: separate;
                    border-spacing: 2px;
                    margin: 0 auto;
                }
                .element {
                    width: 70px;
                    height: 80px;
                    padding: 4px;
                    text-align: center;
                    position: relative;
                    transition: transform 0.2s;
                    border-radius: 2px;
                }
                .element:hover {
                    transform: scale(2);
                    z-index: 1;
                    box-shadow: 0 0 10px rgba(0,0,0,0.3);
                }
                .number {
                    font-size: 10px;
                    text-align: left;
                }
                .symbol {
                    font-size: 18px;
                    font-weight: bold;
                    margin: 4px 0;
                }
                .name {
                    font-size: 10px;
                    margin-bottom: 2px;
                }
                .mass {
                    font-size: 9px;
                    color: #666;
                }
                .empty {
                    width: 70px;
                    height: 80px;
                }
                .box {
                    background-color: #d6d6d6;
                }
            </style>
        </head>
        <body>
            <table>
    HTML
    current_row = []
    max_position = 17
    elements.each do |element|
        position = element['position'].to_i
        while current_row.length < position
            current_row << create_empty_cell
        end
        current_row << create_element_html(element)
        if position == max_position
            html += "        <tr>#{current_row.join("\n")}</tr>\n"
            current_row = []
        end
    end
    html += "        <tr>#{current_row.join("\n")}</tr>\n" unless current_row.empty?
    html += <<~HTML
            </table>
        </body>
        </html>
    HTML
    File.write('periodic_table.html', html)
end

generate_periodic_table
*/
?>
