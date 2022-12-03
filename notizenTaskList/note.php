<?php

if(isset($_POST['create'])){
    createData();
}


function createData($task){
    global $data;
    $lists = $data;
    unlink('data.php');

    $newId = count($lists) + 1;

    $date = new DateTimeImmuTable();
    $newDate = $date->format('Y-m-d');

    $newDate = create_date();
    $newLine = "[
        'id' => " . $newId . ",
        'task' => $task,
        'date' => $newDate,
        'active' => 1,
        ],";

    $content = "<?php $data = [";

    foreach($lists as $list){
        $content .= "[
            'id' => '" . $list['id'] . "',
            'task' => '" . $list['task'] . "',
            'date' => '" . $list['date'] . "',
            'active' => '" . $list['active'] . "',
        ],";
    }
    $content .= $newLine;
    $content .= "];";
    
    file_put_contents("data.php", $contents);
}