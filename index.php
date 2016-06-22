<html>
<head>
    <title>Home Page</title>
</head>
</body>
<?php
    $m = new MongoClient();
    echo "Connection to database Successfuly.";
    $db = $m->new;

    echo phpinfo();
    echo "New database new selected.";
?>
</body>
</html>
