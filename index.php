<!DOCTYPE html>
<html land="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="css/output.css">
</head>
<body>
    <form action='index.php' method='post'>
    <?php
        require('data.php');
        require('functions/functions.php');
        include 'pages/main.php';
    ?>
    </form>
</body>
</html>

