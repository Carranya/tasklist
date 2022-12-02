

<div class='inline-block w-96 border border-blue-300 rounded-xl text-left p-3 m-5 bg-blue-300 shadow-xl'>
    <h1 class='text-center text-2xl font-bold underline mb-3'>Aufgabenliste</h1>

    <?php
    global $data;
    $step = 0;
    // $showAll = true;
    foreach($data as $list){
        if(!isset($showAll)){
            if($list['active'] == 0){
                continue;
            }
        }

        if($step == 0){
            $bg = 'bg-blue-200';
            $step--;
        } else {
            $bg = 'bg-blue-100';
            $step++;
        }
        
        $date = new \DateTimeImmuTable($list['date']);
        $showDate = $date->format('d. M Y');

        echo "<div class='p-3 " . $bg . " flex justify-between items-center'>";
        echo "<span>" . $list['id'] . "</span>";
        echo "<span>" . $list['task'] . "</span>";
        echo "<span>" . $showDate . "</span>";
        include 'buttons/done.php';
        echo "</div>";
    }
    ?>
</div>
