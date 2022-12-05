<?php

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