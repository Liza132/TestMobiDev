<?php

$number = 157455544;

$result = '';
$symbol = 1;

$num = $number;
if ($number < 20) {
    echo find($number, $symbol);
} else {
    for ($i = 0; $i < strlen($number); $i++) {
        if ($number % 100 < 20 && $symbol == 1) {
            $val = $num % 100;
            $num = (int)($num / 100);
            $number = $num;
            $result = find($val, $symbol) . ' ' . $result;
            $symbol = $symbol + 2;
        }
        $val = $num % 10;
        $num = (int)($num / 10);
        $result = find($val, $symbol) . ' ' . $result;
        $symbol++;
    }
}
echo $result;

function find($z, $symbol)
{
    $spelling = array(
        0 => 'zero', 10 => 'ten',
        1 => 'one', 11 => 'eleven', 20 => 'twenty', 100 => 'hundred',
        2 => 'two', 12 => 'twelve', 30 => 'thirty', 1000 => 'thousand',
        3 => 'three', 13 => 'thirteen', 40 => 'forty', 1000000 => 'million',
        4 => 'four', 14 => 'fourteen', 50 => 'fifty',
        5 => 'five', 15 => 'fifteen', 60 => 'sixty',
        6 => 'six', 16 => 'sixteen', 70 => 'seventy',
        7 => 'seven', 17 => 'seventeen', 80 => 'eighty',
        8 => 'eight', 18 => 'eighteen', 90 => 'ninety',
        9 => 'nine', 19 => 'nineteen'
    );
    $space = ' ';
    if ($symbol == 4) {
        $symbol = 1;
        $res = $spelling[1000];
    }
    if ($symbol == 5 || $symbol == 8) {
        $symbol = 2;
        $space = ' ';
    }
    if ($symbol == 6 || $symbol == 9) {
        $symbol = 3;
        $space = ' ';
    }
    if ($symbol == 7) {
        $symbol = 1;
        $space = ' ';
        $res = $spelling[1000000];
    }


    $val_number = 1;
    if ($symbol == 1) {
        return $spelling[$z] . $space . $res;
    } else if ($symbol == 2) {
        return $spelling[$z * 10];
    } else {
        for ($i = 1; $i < $symbol; $i++) {
            $val_number = $val_number . '0';
        }
        $space = ' ';
        $res = $spelling[$z] . $space . $spelling[$val_number] . $space . $res;
        return $res;
    }

}