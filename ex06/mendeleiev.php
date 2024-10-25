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

$html = '<!DOCTYPE html>
<html lang="en">
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
    $row = null;
    $col = $element['position'];
    $num = $element['number'];
    
    if ($num <= 2) {
        $row = 0;
    }
    else if ($num <= 10) {
        $row = 1;
    }
    else if ($num <= 18) {
        $row = 2;
    }
    else if ($num <= 36) {
        $row = 3;
    }
    else if ($num <= 54) {
        $row = 4;
    }
    else if ($num <= 86) {
        $row = 5;
        if ($num > 57 && $num < 72) continue;
    }
    else {
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
            $html .= '<td class="element">
                <h4>' . htmlspecialchars($element['name']) . '</h4>
                <ul>
                    <li>No ' . $element['number'] . '</li>
                    <li>' . htmlspecialchars($element['symbol']) . '</li>
                    <li>' . $element['molar'] . '</li>
                    <li>' . $element['electron'] . ' electron</li>
                </ul>
            </td>';
        } else {
            $html .= '<td class="empty"></td>';
        }
    }
    $html .= '</tr>';
}

$html .= '</table></body></html>';

file_put_contents('mendeleiev.html', $html);
?>
