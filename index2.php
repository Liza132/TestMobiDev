<?php

$number = 144234;

$symbol = 1;
$result = [];
$num = $number;
if ($number < 20) {
    echo find($number, $symbol);
} else {
    for ($i = 0; $i < strlen($number); $i++) {
        if ($number % 100 < 20 && $symbol == 1) {
            $val = $num % 100;
            $num = (int)($num / 100);
            $number = $num;
            $result[] = find($val, $symbol);
            $symbol = $symbol + 2;
        }
        $val = $num % 10;
        $num = (int)($num / 10);
        $res = find($val, $symbol);
        $result = array_merge($result, is_array($res) ? $res : [$res]);
        $symbol++;

    }
}
echo implode(' ', array_reverse($result));


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
    $val_number = '';
    if ($symbol == 4) {
        $symbol = 1;
        $val_number = $spelling[1000];
    }
    if ($symbol == 5 || $symbol == 8) {
        $symbol = 2;
    }
    if ($symbol == 6 || $symbol == 9 || $symbol == 3) {
        $symbol = 3;
        $val_number = $spelling[100];
    }
    if ($symbol == 7) {
        $symbol = 1;
        $val_number = $spelling[1000000];
    }

    if ($symbol == 1) {
        $res[] = $val_number;
        $res[] = $spelling[$z];
    } else if ($symbol == 2) {
        $res[] = $spelling[$z * 10];
    } else {
        $res[] = $val_number;
        $res[] = $spelling[$z];
    }
    return $res;



}