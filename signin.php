<?php

require_once('app/init.php');

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//if(!empty($_POST))
if(!empty($post))
{
    $username = $post['username'];
    $password = $post['password'];
    
    $signin = $auth->signin([
        'username' => $username,
        'password' => $password
    ]);
        
    if($signin)
    {
        header('Location: index.php');
    }
}

?>

<!doctype html>
<html>
    <head><meta charset="utf-8">
        <title>Sign in</title></head>
    <body>
    <form action="signin.php" method="post">
    <fieldset>
        <legend>Sign in</legend>
        <label>
            Username
            <input type="text" name="username">
        </label>
        <label>
            Password
            <input type="text" name="password">
        </label>
    </fieldset>
        <input type="submit" value="Sing in">
        </form>
    </body>
    
</html>