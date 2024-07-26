<?php

$database = new Database;

if (isset($_SESSION['admin'])) {

    $admin_ = $database->query('select * from admin_ where email = :email', ['email' => $_SESSION['admin']])->fetchAll();

    foreach ($admin_ as $admin) {
    }

    $artists = $database->query('select * from user where id = :user_id', ['user_id' => $_GET['user_id']])->fetchAll();

    $musics = $database->query("select * from music where user_id = :user_id", ['user_id' => $_GET['user_id']])->fetchAll();

    foreach ($artists as $artist) {
    }

    $back = '<a  href="admin"> Home </a> | <a href="user_table"> User table </a>';
    $title = $artist['name'];
    include views("admin/pages/user_detail.php");
} else {
    header("location:admin_login");
}
