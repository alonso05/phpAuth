<?php

require('password.php');

class Hash
{
    
    public function make($plain)
    {
        return password_hash($plain, PASSWORD_BCRYPT, ['cost' => 8]);
    }
    
    public function verify($plain, $hashed)
    {
        return password_verify($plain, $hashed);
    }
}
