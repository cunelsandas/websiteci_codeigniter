<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/2/2561
 * Time: 13:35
 */
function CreateArray($NoArray, $post)
{
    $data = [];
    foreach ($post as $key => $item) {
        if (!in_array($key, $NoArray)) {
            $data[$key] = $item;
        }
    }
    return $data;
}