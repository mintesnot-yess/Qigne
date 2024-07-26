<?php

$database = new Database;

if (isset($_SESSION['admin'])) {

if(empty($_GET['search'])){
    header("location:admin");
}
 else{   $admin_ = $database->query('select * from admin_ where email = :email', ['email' => $_SESSION['admin']])->fetchAll();

    foreach ($admin_ as $admin) {
    }
    $users = $database->query('select * from user where name REGEXP :search or email REGEXP :search', ['search' => $_GET['search']])->fetchAll();
    $musics = $database->query('select * from music where artist REGEXP :search or title REGEXP :search', ['search' => $_GET['search']])->fetchAll();
    $back = '<a class="m-2" href="admin"> back </a>';

    include views("admin/pages/search.php");}
    
} else {
    header("location:admin_login");
}
