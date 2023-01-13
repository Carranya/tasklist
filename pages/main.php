<?php

use TaskList\Action;

$action = new Action($data);

if(isset($_POST['done'])){
    $action->modify($_POST['done'], 'active', 0);
}

if(isset($_POST['undone'])){
    $action->modify($_POST['undone'], 'active', 1);
}

if(isset($_POST['delete'])){
    $action->modify($_POST['delete'], 'active', 2);
}

if(isset($_POST['edit'])){
    $action->modify($_POST['edit'], 'task', $_POST['newTitle']);
}

if(isset($_POST['create'])){
    $action->create($_POST['newTask']);
}

$data = $action->getData();
include 'pages/showList.php';