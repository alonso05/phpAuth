<?php

require_once 'app/init.php';

$auth->build();

?>

<!doctype html>
<html>
    <head><meta charset="utf-8">
        <title>Index</title></head>
    <body>
    <?php if($auth->check()): ?>
        <p>You are signed in. <a href="singout.php">Sign Out</a></p>
    <?php else: ?>
        <p>You are not signed in! <a href="signup.php">Sign Up</a> or <a href="signin.php">Sign In</a> </p>
    <?php endif ?>
    </body>
    
</html>