<?php
require('data.php');

global $data;

foreach($data as $da){
    $show = $da['id'];
}

var_dump($show);