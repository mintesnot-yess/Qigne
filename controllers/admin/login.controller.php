<?php

$database = new Database;

if (isset($_POST['login'])) {

    if (empty($_POST['email'])) {
        $error = 'check email ';
    } elseif (empty($_POST['password'])) {
        $error = 'check password';
    } else {

        $admin = $database->query("select * from admin_ where email = :email", ['email' => $_POST['email']])->fetchAll();

        foreach ($admin as $admins) {
            $admins_email = $admins['email'];
            $admins_pass = $admins['password'];
        }

        if ($admins_email == $_POST['email']) {

            if (password_verify($_POST['password'], $admins_pass)) {
                $_SESSION['admin'] = $admins['email'];
                session_regenerate_id(true);
                header("location:/admin");
            } else {
                $error = 'check password';
            }
        } else {

            $error = 'check email or password';
        }
    }
}

include views("admin/pages/login.view.php");
