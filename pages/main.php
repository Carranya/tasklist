<form action='index.php' method='post'>
<?php

if(isset($_POST['create'])){
    create($_POST['newTask']);
}
    require('data.php');
    include 'pages/showList.php';
?>
</form>
