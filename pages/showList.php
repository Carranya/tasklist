<div class='inline-block w-96 border border-blue-300 rounded-xl text-left p-3 m-5 bg-blue-300 shadow-xl'>
    <div class='float-right'>
    <?php
        if(isset($_POST['showAll'])){
            echo "<input type='hidden' name='showAll' value=true>";
            include 'buttons/showActive.php';
        } else {
            include 'buttons/showAll.php';
        }
        ?>
    </div>
    <h1 class='text-center text-2xl font-bold underline mb-3 mr-3'>Aufgabenliste</h1>

    <?php
        global $data;
        $step = 0;
        foreach($data as $dat){

            if(!isset($_POST['showAll'])){
                if($dat['active'] == 0){
                    continue;
                }
            }

            if($dat['active'] == 2){
                continue;
            }

            if($step == 0){
                $step++;
                $bg = 'bg-blue-200';
            } else {
                $step--;
                $bg = 'bg-blue-100';
            }

            if($dat['active'] == 0){
                $opacity = "opacity-40";
            } else {
                $opacity = null;
            }

            echo "<div class='p-3 " . $bg . " flex justify-between items-center " . $opacity . "'>"; 
            
                if(@$_POST['pickToEdit'] == $dat['id']){
                    echo "<input name='newTitle' value='" . $dat['task'] . "' size='10'>";
                } else {
                    echo "<span>" . $dat['task'] . "</span>";
                }

                $date = new \DateTimeImmuTable($dat['date']);
                $showDate = $date->format('d. M. Y');

                echo "<span>" . $showDate . "</span>";

                echo "<div class='flex'>";
                    if(@$_POST['pickToEdit'] == $dat['id']){
                        include 'buttons/edit.php';
                        include 'buttons/cancel.php';
                    } else if($dat['active'] == 0) {
                        include 'buttons/delete.php';
                        include 'buttons/undone.php';
                    } else {
                        include 'buttons/pickToEdit.php';
                        include 'buttons/done.php';
                    }
                echo "</div>";
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