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

function edit($id, $task){
    global $data;
    $lists = $data;
    $content = '<?php $data = [';
    foreach($lists as $list){
        $content .= "[
            'id' => " . $list['id'] . ",";
        if($list['id'] == $id){
            $content .= "
            'task' => '$task',";
        } else {
            $content .= "
            'task' => '" . $list['task'] . "',";
        }
        $content .= "
            'date' => '" . $list['date'] . "',
            'active' => " . $list['active'] . ",
    ],";
    }
    $content .= "];";
    createData($content);
}

function done($id){
    global $data;
    $lists = $data;
    $content = '<?php $data = [';
    foreach($lists as $list){
        $content .= "[
            'id' => " . $list['id'] . ",
            'task' => '" . $list['task'] . "',
            'date' => '" . $list['date'] . "',";
          
        if($list['id'] == $id){
            $content .= "
            'active' => 0,";
        } else {
            $content .= "
            'active' => " . $list['active'] . ",";
        }
        $content .= "
    ],";
    }
    $content .= "];";
    createData($content);
}

function undone($id){
    global $data;
    $lists = $data;
    $content = '<?php $data = [';
    foreach($lists as $list){
        $content .= "[
            'id' => " . $list['id'] . ",
            'task' => '" . $list['task'] . "',
            'date' => '" . $list['date'] . "',
            ";

        if($list['id'] == $id){
            $content .= "
            'active' => 1,";
        } else {
            $content .= "
            'active' => " . $list['active'] . ",";
        }
        $content .= "
        ],";
    }
    $content .= "];";
    createData($content);
}

function delete($id){
    global $data;
    $lists = $data;
    $content = '<?php $data =[';
    foreach($lists as $list){
        $content .= "[";
        if($list['id'] == $id){
            $content .= "'id' => -100,";
        } else {
            $content .= "'id' => " . $list['id'] . ",";
        }

        $content .= "
            'task' => '" . $list['task'] . "',
            'date' => '" . $list['date'] . "',
            'active' => " . $list['active'] . ",
        ],";
    }
    $content .= "];";
    createData($content);
}