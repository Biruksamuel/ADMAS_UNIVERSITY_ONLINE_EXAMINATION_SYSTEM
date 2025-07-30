<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>welcome</title>
</head>
<body>
    <?php
     $name = $_GET['name'];
     echo"<h2>welcome $name </h2>";
     ?>
   
    <?php
    echo isset($_GET['name']) ? $_GET ['name'] : 'Guest';
    ?></h2>
</body>
</html>