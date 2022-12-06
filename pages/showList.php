<div class='inline-block w-96 border border-blue-300 rounded-xl text-left p-3 m-5 bg-blue-300 shadow-xl'>
    <span class='float-right'>
    <?php
        if(isset($_POST['showAll'])){
            $showAll = true;
            echo "<input type='hidden' name='showAll' value=true>";
        }

        if(isset($showAll)){
            include 'buttons/showActive.php';
        } else {
            include 'buttons/showAll.php';
        }
        ?>
    </span>
    <h1 class='text-center text-2xl font-bold underline mb-3 mr-3'>Aufgabenliste</h1>

    <?php
        global $data;
        $step = 0;
        foreach($data as $list){
            if($list['id'] == -100){
                continue;
            }

            if(!isset($showAll)){
                if($list['active'] == 0){
                    continue;
                }
            }

            if($step == 0){
                $bg = 'bg-blue-200';
                $step++;
            } else {
                $bg = 'bg-blue-100';
                $step--;
            }

            $date = new \DateTimeImmuTable($list['date']);
            $showDate = $date->format('d. M. Y');
            if($list['active'] == 0){
                echo "<div class='p-3 " . $bg . " flex justify-between items-center opacity-40'>"; 
            } else {
                echo "<div class='p-3 " . $bg . " flex justify-between items-center'>";
            }

            if(@$_POST['pickToEdit'] == $list['id']){
                echo "<input name='taskEdit' value='" . $list['task'] . "' size='10'>";
            } else {
               echo "<span>" . $list['task'] . "</span>";
            }
            
            echo "<span>" . $showDate . "</span>";

            if($list['active'] == 0){
                echo "<div class='flex'>";
                    include 'buttons/delete.php';
                    include 'buttons/undone.php';
                echo "</div>";
            } else if(@$_POST['pickToEdit'] == $list['id']) {
                echo "<div class='flex'>";
                    include 'buttons/edit.php';
                    include 'buttons/cancel.php';
                echo "</div>";
            } else {
                echo "<div class='flex'>";
                    include 'buttons/pickToEdit.php';
                    include 'buttons/done.php';
                echo "</div>";
            }
                echo "</div>";
        }
    ?>

    <div class='p-3 mt-5 bg-blue-100 flex justify-between items-center border border-solid border-blue-400'>
        <input name='newTask' size='20' placeholder='Neue Aufgabe'>
        <div class='flex items-center'>
            <?php include 'buttons/create.php'; ?>
        </div>
    </div>
</div>