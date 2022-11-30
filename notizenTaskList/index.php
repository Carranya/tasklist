<form action='index.php' method='post'>
    <?php
        require('function.php');
        if(isset($_POST['name'])){
            createData($_POST['name']);
        }
    ?>
    <input name='name'>
    <input type='submit'>
</form>