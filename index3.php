<?php
$json = file_get_contents('items.json');


$data = json_decode($json);
arr($data, 1);


function arr($array, $y)
{
    foreach ($array as $kay => $val) {

        echo str_repeat("-", $y);
        if (is_object($val) || is_array($val)) {
            echo $kay, '<br />';
        } else echo $val, '<br />';
        if (is_object($val) || is_array($val)) {
            arr($val, $y + 1);
        }
    }

}
