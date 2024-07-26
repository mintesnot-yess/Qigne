<?php

$database = new Database;
$web_title = "QIGNET";
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "select * from user where email = :email";
    $myProfiles = $database->query($query, ['email' => $email])->fetchAll();
    foreach ($myProfiles as $myProfile) {
        $my_id = $myProfile['id'];
    }

}

// $quary = "select * from  music order by RAND()  LIMIT 6";
$query = "select * from  music order by RAND()  LIMIT 9";
$musics = $database->query($query)->fetchAll();





if (isset($_SESSION['email'])) {
    $follow = "select * from follow where following = '$my_id' order by RAND()";
    $followings = $database->query($follow)->fetchAll();
}

if (isset($_GET['logout'])) {
    $_SESSION['email'] = null;
    session_destroy();
    header("location:/");
}

include views("index.view.php");
