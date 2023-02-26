<?php
// check it is number or string or mix. 
function checkNumberColumns($values)
{
    if (isNumber($values)) {
        return "Number";
    } elseif (isString($values)) {
        return "String";
    } else {
        return "Mix";
    }
}


// check it is number or not
function isNumber($values)
{
    if (is_numeric($values)) {
        return true;
    } else {
        return false;
    }
}


// check it will either number or string 
function isMix($values)
{
    if (((int) $values) == 0) {
        return true;
    }
}

function isString($values)
{
    for ($i = 0; $i < strlen($values); $i++) {
        if (is_numeric($values[$i])) {
            return false;
        }
    }
    return true;
}

// Test
// print("is Number : " . checkNumberColumns("111") . "\n");
// print("is Number : " . checkNumberColumns(222) . "\n");
// print("is String : " . checkNumberColumns("Mahesh") . "\n");
// print("is Mix : " . checkNumberColumns("6ihj7") . "\n");
?>