<?php

$database = new Database;


if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $date = date('y-m-d');
    $query = "select * from user where name = :name";
    $userNames = $database->query($query, ['name' => $name])->fetchAll();
    foreach ($userNames as $userName) {
    }
    $query = "select * from user where email = :email";
    $userEmails = $database->query($query, ['email' => $email])->fetchAll();
    foreach ($userEmails as $userEmail) {
    }
    if (empty($name)) {
        $error['error'] = 'name is requered';
    } elseif ($userName['name'] == $name) {
        $error['error'] = 'user name is already used';
    } elseif (empty($email)) {
        $error['error'] = 'email is requered';
    } elseif ($userEmail['email'] == $email) {
        $error['error'] = 'email name is already used';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['error'] = 'Invalid email';
    } elseif (empty($password)) {
        $error['error'] = 'Password is requer';
    } elseif (strlen($password) < 6) {
        $error['error'] = 'your password length is ' . strlen($password);
    } else {



        $query = "insert into user(name,email,password,description,date) values(:name,:email,:password,'',:date)";
        if ($database->query($query, ['name' => $name, 'email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT), 'date' => $date])) {
            $_SESSION['email'] = $email;
            session_regenerate_id(true);
            header("location:/");
        }
    }
}
include views("register.php");
