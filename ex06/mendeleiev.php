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

$html = '<!-- python3 -m http.server 8080 -->
<!DOCTYPE html>
<html>
<head>
    <title>Periodic Table</title>
    <style>
        table { 
            border-collapse: collapse;
            margin: 20px;
            font-family: Arial, sans-serif;
        }
        td {
            border: 1px solid #ccc;
            padding: 10px;
            width: 120px;
            vertical-align: top;
        }
        .element {
            background-color: #f0f0f0;
        }
        h4 {
            margin: 0 0 10px 0;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
        }
        li {
            margin-bottom: 4px;
        }
        .empty {
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
    $row = floor($element['number'] / 18);
    if ($element['number'] > 56 && $element['number'] < 72) continue;
    if ($element['number'] > 88 && $element['number'] < 104) continue;
    
    // Adjust row for elements after gaps
    if ($element['number'] >= 72) $row = 5;
    if ($element['number'] >= 104) $row = 6;
    
    $table[$row][$element['position']] = $element;
}

for ($row = 0; $row < $maxRows; $row++) {
    $html .= '<tr>';
    for ($col = 0; $col < $maxCols; $col++) {
        if ($table[$row][$col] === null) {
            $html .= '<td class="empty"></td>';
            continue;
        }
        
        $element = $table[$row][$col];
        $html .= '<td class="element">
            <h4>' . htmlspecialchars($element['name']) . '</h4>
            <ul>
                <li>No ' . $element['number'] . '</li>
                <li>' . htmlspecialchars($element['symbol']) . '</li>
                <li>' . $element['molar'] . '</li>
                <li>' . $element['electron'] . ' electron</li>
            </ul>
        </td>';
    }
    $html .= '</tr>';
}

$html .= '</table></body></html>';

file_put_contents('mendeleiev.html', $html);
?>
