<?php

$database = new Database;

if (isset($_SESSION['admin'])) {

    $user_num = $database->query('select count(id) from user');
    $music_num = $database->query('select count(id) from music');
    $new_artists = $database->query("SELECT * FROM `user` ORDER BY `date` DESC limit 3")->fetchAll();
   $new_musics = $database->query("SELECT * FROM `music` ORDER BY `music`.`date` DESC limit 3")->fetchAll();
    $admin_ = $database->query('select * from admin_ where email = :email', ['email' => $_SESSION['admin']])->fetchAll();
    foreach ($admin_ as $admin) {
    
    }
    $all_admins = $database->query('select count(id) from admin_')->fetchAll();
    $activHome = 'active';
    include views("admin/index.view.php");

} else {
    header("location:admin_login");
}
