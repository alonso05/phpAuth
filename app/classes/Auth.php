<?php

class Auth
{
    protected $db;
    protected $hash;
    protected $session = 'user';
    protected $table = 'users';
    
    public function __construct(Database $database, Hash $hash)
    {
        $this->db = $database;
        $this->hash = $hash;
    }
    
    public function build()
    {
        return $this->db->query("
            CREATE TABLE IF NOT EXISTS users
            (id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(30) NOT NULL UNIQUE,
            username VARCHAR(30) NOT NULL UNIQUE,
            pasword VARCHAR(255) NOT NULL)
        ");
    }
    
    public function create($data)
    {
        //insert user
        if(isset($data['password'])){
            $data['password'] = $this->hash->make($data['password']);
        }
        
        return $this->db->table($this->table)->insert($data);
    }
    
    public function signin($data)
    {
        $user = $this->db->table($this->table)->where('username', '=', $data['username']);
        
        if($user->count()){
            $user = $user->first();
            echo $this->hash->verify($data['password'], $user->password);
            if($this->hash->verify($data['password'], $user->password))
            {
                
                $this->setAuthSession($user->id);
                return true;
            }
        }
    }
    
    public function check()
    {
        return isset($_SESSION[$this->session]);
    }
    
    public function signout()
    {
        unset($_SESSION[$this->session]);
    }
    
    protected function setAuthSession($id)
    {
        $_SESSION[$this->session] = $id;
    }
}
