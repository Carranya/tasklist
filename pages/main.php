<form action='index.php' method='post'>
<?php

if(isset($_POST['create'])){
    create($_POST['newTask']);
}

if(isset($_POST['edit'])){
    edit($_POST['edit'], $_POST['taskEdit']);
}

if(isset($_POST['done'])){
    done($_POST['done']);
}

if(isset($_POST['undone'])){
    undone($_POST['undone']);
}
    require('data.php');
    include 'pages/showList.php';
?>
</form>
