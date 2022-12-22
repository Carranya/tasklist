<?php

if(isset($_POST['done'])){
    done($_POST['done'], 0);
}

if(isset($_POST['undone'])){
    done($_POST['undone'], 1);
}

if(isset($_POST['delete'])){
    done($_POST['delete'], 2);
}

if(isset($_POST['edit'])){
    edit($_POST['edit'], $_POST['newTitle']);
}

if(isset($_POST['create'])){
    create($_POST['newTask']);
}
    require('data.php');
    include 'pages/showList.php';
