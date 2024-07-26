<?php

$database = new Database;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "select * from user where email = :id";

    $myProfiles = $database->query($query, ['id' => $email])->fetchAll();

    foreach ($myProfiles as $myProfile) {
    }
    $my_id = $myProfile['id'];
    $my_name = $myProfile['name'];
    $my_email = $myProfile['email'];
//foo

    $followings = $database->query("select * from follow where following = '$my_id' order by RAND()")->fetchAll();

}

include views("pages.php");
