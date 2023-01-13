<?php

namespace TaskList;

class Action {
    public function __construct(public $data){
        $this->data = $data;
    }

    public function save(){
        global $demo;
        if($demo == true){
            include 'demo/demo.php';
            die;
        }

        $content = "<?php \$data = [\n\n";
        foreach($this->data as $dat){
            $content .= "[\n";
            $content .= "'id' => " . $dat['id'] . ",\n";
            $content .= "'task' => '" . $dat['task'] . "',\n";
            $content .= "'date' => '" . $dat['date'] . "',\n";
            $content .= "'active' => " . $dat['active'] . ",\n";
            $content .= "],\n\n";
        }
        $content .= "];";
        file_put_contents('data.php', $content);
        chmod('data.php', 0777);
    }

    public function modify($id, $key, $value){
        $this->data[$id-1][$key] = $value;
        $this->save();
    }

    public function create($newTask){
        
        $id = count($this->data)+1;
        $date = new \DateTimeImmuTable;
        $newDate = $date->format('Y-m-d');
        $this->data[] = [
            'id' => $id,
            'task' => $newTask,
            'date' => $newDate,
            'active' => 1,
        ];
        $this->save();
    }

    public function getData(){
        return $this->data;
    }
}