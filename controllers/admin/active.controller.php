<?php

$database = new Database;


if (isset($_GET['desactive'])) {
    $user_id = $_GET['desactive'];
    if ($database->query('UPDATE `user` SET `active`= 1 WHERE `id`= :user_id;', ['user_id' => $user_id])) {
        header('location:user_table#' . $user_id . '');
    }
}


if (isset($_GET['active'])) {

    $user_id = $_GET['active'];
    if ($database->query('UPDATE `user` SET `active`= 0 WHERE `id`= :user_id;', ['user_id' => $user_id])) {
        header('location:user_table#' . $user_id . '');
    }
}

if (isset($_GET['delete'])) {

    $user_id = $_GET['delete'];
    if ($database->query('delete from user where id = :user_id', ['user_id' => $user_id])) {
        header('location:user_table');
    }
}

if (isset($_GET['music_delete'])) {

    $music_id = $_GET['music_delete'];
    if ($database->query('delete from music where id = :music_id', ['music_id' => $music_id])) {
        header('location:music_table');
    }
}

if (isset($_GET['logout'])) {
    $_SESSION['admin'] = null;
    header("location:/");
}
