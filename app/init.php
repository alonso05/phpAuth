<?php

session_start();

$app = __DIR__;
require_once "{$app}/classes/Validator.php";
require_once "{$app}/classes/ErrorHandler.php";
require_once "{$app}/classes/Hash.php";
require_once "{$app}/classes/Database.php";
require_once "{$app}/classes/Auth.php";

$database = new Database;
$errorHandler = new ErrorHandler;
$hash = new Hash();



//echo '<pre>', print_r($errorHandler->first('password')), '</pre>';

//var_dump($hash->make('test'));
//var_dump($hash->verify('cats', '$2y$08$sTbcEcvDIfNBkZO9Cfh5ku2.imsOdSQ.H9jiA.2kPV7mSwA0yiTpa'));

/*$database->table('users')->insert([
    'email' => 'alonso05@gmail.com',
    'username' => 'alonso',
    'pasword' => 'cat'
]);
*/

//var_dump($database->table('users')->where('username', "=", 'alonso'));

/*$exists = $database->table('users')->exists([
    'username' => 'noexiste'
]);

//$user = $database->table('users')->where('username', '=', 'alonso')->get();
//$user = $database->table('users')->where('username', '=', 'alonso')->first();

$user = $database->table('users')->where('username', '=', 'alonso')->first();
var_dump($user->username);
*/

$auth = new Auth($database, $hash);