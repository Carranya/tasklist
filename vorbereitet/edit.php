<?php

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