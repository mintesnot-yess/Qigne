<?php

$database = new Database;
if (isset($_SESSION['admin'])) {

    if (isset($_GET['order_by'])) {
        $order_by = $_GET['order_by'];
    } else {
        $order_by = "ORDER BY `date` desc";
    }

    $music_num = $database->query('select count(id) from music');
    foreach ($music_num as $music_nums) {
        $music_num = $music_nums['count(id)'];
    }
    if (isset($_GET['limit'])) {
        $limit = $music_num;
    } else {
        $limit = 10;
    }

    $admin_ = $database->query('select * from admin_ where email = :email', ['email' => $_SESSION['admin']])->fetchAll();

    foreach ($admin_ as $admin) {
    }

    $musics = $database->query("select * from music $order_by limit $limit")->fetchAll();

    $activeMusic = 'active bg-gradient-primary';
    $back = '<a href="admin"> Home </a>';
    $title = 'Music table';
    include views("admin/pages/music_table.php");
} else {
    header("location:admin_login");
}
