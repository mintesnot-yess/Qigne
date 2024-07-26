<?php

$database = new Database;

if (isset($_SESSION['admin'])) {

    $admin_ = $database->query('select * from admin_ where email = :email', ['email' => $_SESSION['admin']])->fetchAll();

    foreach ($admin_ as $admin) {
    }

    $users = $database->query('select * from user');
    $activeUser = 'active';
    $back = '<a href="/admin"> Home </a>';
    $title = 'User tabel';
    include views("admin/pages/user_table.php");
} else {
    header("location:admin_login");
}
