<?php

$xo = [
    ['x', '', 'x'],
    ['', 'x', 'x'],
    ['x', 'o', '']
];


function check($line)
{

    for ($i = 0; $i < 3; $i++) {
        if ($line[$i][0] == $line[$i][1] && $line[$i][1] == $line[$i][2]) {
            return ($line[$i][0]);
        } else if ($line[0][$i] == $line[1][$i] && $line[1][$i] == $line[2][$i]) {
            return ($line[0][$i]);
        } else if ($line[0][0] == $line[1][1] && $line[1][1] == $line[2][2] || $line[0][2] == $line[1][1] && $line[1][1] == $line[2][0]) {
            return ($line[1][1]);
        }
    }
    return '';
}

echo check($xo);
