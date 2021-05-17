<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/2/2561
 * Time: 15:12
 */
function IsCheck($check)
{
    return $check == 0 ? '' : 'checked';
}

function IsVal($val)
{
    return $val == '' ? '' : $val;
}

function IsSelect($set, $val)
{
    return $set == $val ? 'selected' : '';
}