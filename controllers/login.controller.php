<?php

$database = new Database;

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $error['error'] = 'email is empty';
    } else {
        if (empty($password)) {
            $error['error'] = 'password is empty';
        } else {
            $users = $database->query("SELECT * FROM `user` WHERE email = :email", ['email' => $email])->fetchAll();
            foreach ($users as $user) {
                $user_email = $user['email'];
                $user_pass = $user['password'];
            }
            if ($user_email === $email) {
                if (password_verify($_POST['password'], $user_pass)) {

                    $_SESSION['email'] = $_POST['email'];
                    session_regenerate_id(true);
                    
                    header("location:/");
                } else {
                    $error['error'] = "cheke email or password";
                }
            } else {
                $error['error'] = "cheke email or password";
            }
        }
    }
}

include views("login.php");
