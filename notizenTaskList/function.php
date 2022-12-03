<?php

require('data.php');

function createData($name){

    global $data;
    
    
    $list = $data;
    
    unlink('data.php');
    
    $newLine = "['name' => '" . $name . "', 'age' => 25],";
    
    $content = '<?php $data = [';
    
    foreach($list as $l){
        if($l['name'] != 'Karin'){
            $content .= "['name' => '" . $l['name'] . "', 'age' => " . $l['age'] . "],";
        }
    }
    $content .= $newLine;
    $content .= '];';
    
    file_put_contents('data.php', $content);
}
