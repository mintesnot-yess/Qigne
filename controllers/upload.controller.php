<?php

$database = new Database;
$email = $_SESSION['email'];
$query = "select * from user where email = '$email'";
$myProfiles = $database->query($query)->fetchAll();

foreach ($myProfiles as $myProfile) {
    $my_id = $myProfile['id'];
    $my_name = $myProfile['name'];

}

if (isset($_POST['uploadFile'])) {

    if (empty($_POST['artist'])) {
        $error['error'] = 'Artist name is required';
        $error['artist'] = 'artist error';
    } else {
        if (empty($_POST['title'])) {
        
            $error['error'] = 'Title is required ';
            $error['title'] = 'title error';
        } else {
            if ($_FILES['albem_art']['size'] == 0) {
                $error['error'] = 'check albem art ';
                $error['albem_art'] = 'albem_art error';
            } else {
                if (($_FILES['music']['size'] == 0)) {

                    $error['error'] = 'check music file ';
                    $error['music'] = 'music error';

                } else {
                    if (empty($_POST['description'])) {
                        $description = '';
                    } else {
                        $description = $_POST['description'];
                    }
                    if (empty($_FILES['albem_art']['name'])) {
                        $imageName = 'music_albem_art.png';
                    } else {
                        $imageName = $_FILES['albem_art']['name'];
                        $imageTmpName = $_FILES['albem_art']['tmp_name'];

                        move_uploaded_file($imageTmpName, "assets/albem_arts/" . $imageName);
                    }

                    $artist = $_POST['artist'];
                    $title = $_POST['title'];
                    $musicName = $_FILES['music']['name'];
                    $musicTmpName = $_FILES['music']['tmp_name'];
                    $date = date('y-m-d');

                    $query = "INSERT INTO `music` ( `artist`, `title`, `music`, `image`, `description`, `date`, `user_id`)
                   VALUES ( '$artist', ' $title', '$musicName', '$imageName', '$description', '$date', '$my_id')";

                    $database->query($query);

                    if (move_uploaded_file($musicTmpName, "assets/musics/" . $musicName)) {

                        $update = "UPDATE `user` SET `active` = '1' WHERE `user`.`id` = $my_id;";
                        $database->query($update);
                        echo "<script> close() </script>";
                        echo "<script> document.location.href = '/' </script>";
                    } else {
                        $error['error'] = 'check your music file ';
                        $error['upload_error'] = 'upoad error ';
                    }
                }
            }
        }
    }
}

include views("upload.view.php");
