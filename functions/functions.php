<?php

function createData($content){
    unlink('data.php');
    file_put_contents('data.php', $content);
}

function create($task){
    global $data;
    $lists = $data;
    
    $id = count($lists) + 1;
    $actualDate = new DateTimeImmuTable();
    $date = $actualDate->format('Y-m-d');
    $newLine = "[
        'id' => $id,
        'task' => '$task',
        'date' => '$date',
        'active' => 1,
    ],";

    $content = '<?php $data = [';

    foreach ($lists as $list){
        $content .= "[
            'id' => " . $list['id'] . ",
            'task' => '" . $list['task'] . "',
            'date' => '" . $list['date'] . "',
            'active' => " . $list['active'] . ",
        ],";
    }

    $content .= $newLine;
    $content .= "];";
    createData($content);
}
