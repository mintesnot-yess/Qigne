<?php

$database = new Database;

$email = $_SESSION['email'];
$query = "select * from user where email = :email";
$myProfiles = $database->query($query, ['email' => $email])->fetchAll();

foreach ($myProfiles as $myProfile) {
}

$my_id = $myProfile['id'];

if (isset($_POST['follow'])) {
    $artistId = $_POST['artist_id'];
    $select = "SELECT * FROM `follow` WHERE  `follower` =  '$artistId' AND `following` = '$my_id' ";
    $check = $database->query($select);
    foreach ($check as $checked) {
    }
    if ($checked) {
        $artistId = $_POST['artist_id'];
        $delete = "DELETE FROM `follow` WHERE follower = '$artistId' AND following = '$my_id'";
        $followind = $database->query($delete);
        header('location:/');
    } else {
        $insert = "INSERT INTO `follow` (`follower`, `following`) VALUES ('$artistId', '$my_id')";
        $inserted = $database->query($insert);
        header('location:/');
    }
}

if (isset($_POST['image_update'])) {

    echo $file = $_FILES['artist_image']['tmp_name'];
    echo '<br>' . $name = $_FILES['artist_image']['name'];
    echo '<br>' . $userId = $_POST['user_id'];

    if (move_uploaded_file($_FILES['artist_image']['tmp_name'], "assets/avatars/" . $_FILES['artist_image']['name'])) {

        $query = "UPDATE `user` SET `image` = '$name' WHERE `user`.`id` = '$userId'";
        $database->query($query);
        header('location:/');
    } else {
        header('location:/');
        echo 'file error';
    }
}

if (isset($_POST['profile_update'])) {

    if (empty($_POST['user_name'])) {
        header("location:/");
    } else {
        if (empty($_POST['email'])) {
            header("location:/");
        } else {
            $user_name = $_POST['user_name'];
            $id = $_POST['id'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $description = $_POST['description'];
            if (empty($_FILES['pro_file']['name'])) {
                $image_name = $_POST['pre_image'];
            } else {
                $image_name = $_FILES['pro_file']['name'];
                $file = $_FILES['pro_file']['tmp_name'];
                move_uploaded_file($file, "assets/avatars/" . $image_name);
            }

            $query = "UPDATE `user` SET `name` = :user_name,`email` = :email, `description` = :description, `image` = :image_name WHERE `user`.`id` = :id";

            $checked = $database->query($query, [
                'user_name' => $user_name,
                'email' => $email,
                'description' => $description,
                'image_name' => $image_name,
                'id' => $my_id,

            ]);

            if ($checked) {
                $_SESSION['email'] = $email;
                session_regenerate_id(true);
                header("location:/");
            }
        }
    }
}

if (isset($_POST['music_delete_btn'])) {
    $music_id = $_POST['delete_music_id'];
    $query = "DELETE FROM `music` WHERE `id`='$music_id'";
    if ($database->query($query)) {
        header("location:/");
    }
}

if (isset($_POST['music_update'])) {

    if (empty($_POST['artist'])) {
        header("location:/");
    } else {
        if (empty($_POST['title'])) {
            header("location:/");
        } else {
            if (empty($_FILES['albem_art']['name'])) {
                $albemArt = $_POST['pre_albem_art'];
            } else {
                $albemArt = $_FILES['albem_art']['name'];
                move_uploaded_file($_FILES['albem_art']['tmp_name'], "assets/albem_arts/" . $albemArt);
            }

            $artist_name = $_POST['artist'];
            $music_title = $_POST['title'];
            $music_id = $_POST['music_id'];
            $query = "UPDATE `music` SET `artist` = :artist_name,`title` = :music_title,`image` = :albemArt  WHERE `music`.`id` = :music_id";

            if ($database->query($query, [
                'artist_name' => $artist_name,
                'music_title' => $music_title,
                'albemArt' => $albemArt,
                'music_id' => $music_id,
            ])) {

                header('location:/');
            }
        }
    }
}

if (isset($_POST['playlist_btn'])) {

    $playlist_name = $_POST['playlist_name'];

    if (empty($_POST['playlist_name'])) {
    } else {
        $select = "select * from playlist_name where playlist_name = '$playlist_name' and user_id = $my_id";
        $chekd = $database->query($select)->fetchAll();
        foreach ($chekd as $cheked) {
        }
        if ($cheked) {
        } else {
            $query = "INSERT INTO `playlist_name` ( `playlist_name`, `user_id`) VALUES (:playlist_name, :my_id);";
            $test = $database->query($query, [
                'playlist_name' => $playlist_name,
                'my_id' => $my_id,
            ]);
            header("location:/");
        }
    }
}

if (isset($_POST['playList_btn'])) {
    $playlist_id = $_POST['playList_btn'];
    $music_id = $_POST['music_id'];

    if ($database->query("insert into playlist (playlist_id,music_id) values(:playlist_id,:music_id)", ['playlist_id' => $playlist_id, 'music_id' => $music_id])) {
        header("location:/");
    }
}
