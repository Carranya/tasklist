

<div class='inline-block w-96 border border-blue-300 rounded-xl text-left p-3 m-5 bg-blue-300 shadow-xl'>
    <h1 class='text-center text-2xl font-bold underline mb-3'>Aufgabenliste</h1>

    <?php
    global $data;
    $step = 0;
    foreach($data as $list){
        if($step == 0){
            $bg = 'bg-blue-200';
            $step--;
        } else {
            $bg = 'bg-blue-100';
            $step++;
        }
        echo "<div class='p-3 " . $bg . " flex justify-between items-center'>";
        echo "<span>" . $list['id'] . "</span>";
        echo "<span>" . $list['task'] . "</span>";
        echo "<span>" . $list['date'] . "</span>";
        echo "</div>";
    }
    ?>
</div>
