<?php

$database = new Database;

if (isset($_SESSION['admin'])) {

    $musics = $database->query("select * from music where id = :user_id", ['user_id' => $_GET['music_id']])->fetchAll();

    $back = '<a  href="admin"> Home  </a> | <a href="music_table"> music table </a>';

    foreach ($musics as $music) {
        $title = $music['artist'];
    }
    include views("admin/pages/music_detail.php");
} else {
    header("location:admin_login");
}
