<?php

require_once('app/init.php');

if(!empty($_POST))
{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $validator = new Validator($database, $errorHandler);
    $validation = $validator->check($_POST, [
        'email' => [
            'required' => true,
            'maxlength' => 30,
            //'unique' => 'users',
            'email' => true
            
        ],
        'username' => [
            'required' => true,
            'minlength' => 3,
            'maxlength' => 20,
            //'unique' => 'users'
        ],
        'password' => [
            'required' => true,
            'minlength' => 5
        ],
        
    ]);
    
    if($validation->fails())
    {
        echo '<pre>', print_r($validation->errors('username')->all(), true), '<pre>';
    }
    else
    {
        $created = $auth->create([
          'email' => $email,
          'username' => $username,
          'password' => $password
        ]);
        
        if($created)
        {
            header('Location: index.php');
        }
    }



}

?>

<!doctype html>
<html>
    <head><meta charset="utf-8">
        <title>Sign in</title></head>
    <body>
    <form action="signup.php" method="post">
    <fieldset>
        <legend>Sign up</legend>
        <label>
            Email
            <input type="text" name="email">
        </label>
        <label>
            Username
            <input type="text" name="username">
        </label>
        <label>
            Password
            <input type="text" name="password">
        </label>
    </fieldset>
        <input type="submit" value="Sing up">
        </form>
    </body>
    
</html>