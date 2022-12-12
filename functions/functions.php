<?php

function done($id, $active){
    global $data;
    $content = "<?php \$data = [\n\n";
    foreach($data as $dat){
        $content .= "[\n";
        $content .= "'id' => " . $dat['id'] . ",\n";
        $content .= "'task' => '" . $dat['task'] . "',\n";
        $content .= "'date' => '" . $dat['date'] . "',\n";
        if($dat['id'] == $id){
            $content .= "'active' => " . $active . ",\n";
        } else {
            $content .= "'active' => " . $dat['active'] . ",\n";
        }
        $content .= "],\n\n";
    }
    $content .= "];";
    unlink('data.php');
    file_put_contents('data.php', $content);
}

function edit($id, $newTitle){
    global $data;
    $content = "<?php \$data = [\n\n";
    foreach($data as $dat){
        $content .= "[\n";
        $content .= "'id' => " . $dat['id'] . ",\n";
        if($dat['id'] == $id){
            $content .= "'task' => '" . $newTitle . "',\n";
        } else {
            $content .= "'task' => '" . $dat['task'] . "',\n";
        }
        $content .= "'date' => '" . $dat['date'] . "',\n";
        $content .= "'active' => " . $dat['active'] . ",\n";
        $content .= "],\n\n";
    }
    $content .= "];";
    unlink('data.php');
    file_put_contents('data.php', $content);
}

function create($newTask){
    global $data;
    $content = "<?php \$data = [\n\n";
    foreach($data as $dat){
        $content .= "[\n";
        $content .= "'id' => " . $dat['id'] . ",\n";
        $content .= "'task' => '" . $dat['task'] . "',\n";
        $content .= "'date' => '" . $dat['date'] . "',\n";
        $content .= "'active' => " . $dat['active'] . ",\n";
        $content .= "],\n\n";
    }

    $id = count($data)+1;
    $date = new DateTimeImmuTable;
    $newDate = $date->format('Y-m-d');

    $content .= "[\n";
    $content .= "'id' => " . $id . ",\n";
    $content .= "'task' => '" . $newTask . "',\n";
    $content .= "'date' => '" . $newDate . "',\n";
    $content .= "'active' => 1,\n";
    $content .= "],\n\n";
    $content .= "];";
    unlink('data.php');
    file_put_contents('data.php', $content);
}