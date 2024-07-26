<?php

include "pages/playlist_page.php";
include "pages/search_page.php";
include "pages/artist_page.php";
include "pages/like_song_page.php";
include "pages/all_songs_page.php";
include "pages/all_artists.php";

// music source
if (isset($_GET['list_music'])) {

    $id_list = $_GET['list_music'];
    if ($_GET['list_music'] === 'null') {
        $query = "SELECT * FROM music order by rand() ";
        $result = $database->query($query)->fetchAll();
        $json_data = json_encode($result);
        echo $json_data;

    } else {
        $query = "SELECT * FROM music where user_id = $id_list";
        $result = $database->query($query)->fetchAll();
        $json_data = json_encode($result);
        echo $json_data;

    }

}

if (isset($_GET['artist_id'])) {

    $id = $_GET['artist_id'];

    $query = "SELECT * FROM music where user_id = '$id'";
    $result = $database->query($query)->fetchAll();
    $json_data = json_encode($result);
    echo $json_data;

}

// musci add to play list
if (isset($_POST['music_id']) && isset($_POST['playlist_id'])) {
    $music_id = $_POST['music_id'];
    $playlist_id = $_POST['playlist_id'];
    $query = "INSERT INTO `playlist` ( `playlist_id`, `music_id`) VALUES ( :playlist_id, :music_id)";
    if ($database->query($query, ['playlist_id' => $playlist_id, 'music_id' => $music_id])) {
        echo ("add sucsuss full");
    } else {
        echo 'unknown error';
        die();
    }
}

// delete play list music
if (isset($_POST['delete_playlist_music']) && isset($_POST['playlist_id'])) {
    $playlist_id = $_POST['playlist_id'];
    $music_id = $_POST['delete_playlist_music'];
    if ($database->query("DELETE FROM playlist WHERE playlist_id = $playlist_id AND music_id = $music_id")) {
        echo 'deleted sucsusfull';
    } else {
        echo 'error';
    }
}

// delete play list
if (isset($_POST['delete_playlist_id'])) {

    $playlist_id = $_POST['delete_playlist_id'];

    if ($database->query("DELETE FROM `playlist_name` WHERE `id`= '$playlist_id'")) {
        echo "deleted sucssusfull";
    } else {
        echo 'error';
    }
}

// add like music
if (isset($_POST['like_music_id'])) {

    $music_id = $_POST['like_music_id'];

    $already_added = $database->query("SELECT * FROM `like_song` WHERE user_id = :user_id AND music_id = :music_id",
        ['user_id' => $my_id, 'music_id' => $music_id])->fetchAll();
    if ($already_added) {
        echo 'already added this song';
    } else {
        if ($database->query("insert into like_song (user_id,music_id) values(:user_id,:music_id )", ['user_id' => $my_id,
            'music_id' => $music_id])) {
            echo 'added succsus';
        } else {
            echo 'unknown error';
        }
    }
}

// remove from like music

if (isset($_POST['remove_like_music_id'])) {
    $music_id = $_POST['remove_like_music_id'];
    if ($database->query("DELETE FROM like_song WHERE user_id = :user_id AND music_id = :music_id", ['user_id' => $my_id,
        'music_id' => $music_id])) {
        echo 'delee succsus';
    } else {
        echo 'unknown error';
    }
}

// change user name or email

if (isset($_POST['change_account'])) {

    $user_name = $_POST['user_name'];
    $email = $_POST['user_email'];

    $select_name = $database->query("SELECT * FROM `user` WHERE name = '$user_name'");
    foreach ($select_name as $name) {

    }
    $select_email = $database->query("SELECT * FROM `user` WHERE email = '$email'");
    foreach ($select_email as $email_user) {

    }

    if ($name) {
        echo " <span class='text_error'> This user name is already taken </span>";
    } else {
        if ($email_user) {
            echo "<span class='text_error'> This email is already taken </span>";

        } else {
            if (empty($_POST['user_name']) and empty($_POST['user_email'])) {

                echo " <span class='text_error'> there is no change</span>";
            } else {

                if (empty($_POST['user_name'])) {
                    $user_name = $my_name;

                } else {
                    $user_name = $_POST['user_name'];
                    echo "<span class='text_success'> user name changed</span>";

                }

                if (empty($_POST['user_email'])) {
                    $email = $my_email;

                } else {
                    if (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
                        $email = $_POST['user_email'];
                        echo "<span class='text_success'> Email changed</span>";

                    } else {
                        $email = $my_email;
                        echo "<span class='text_error'>Email is invalid</span>";
                    }

                }

                $query = "UPDATE `user` SET `name` = :user_name,`email` = :email WHERE `user`.`id` = :id";
                $checked = $database->query($query, [
                    'user_name' => $user_name,
                    'email' => $email,
                    'id' => $my_id,

                ]);

                if ($checked) {
                    $_SESSION['email'] = $email;
                    session_regenerate_id(true);

                } else {
                    echo "<span class='text_error'> check email or user name</span>";

                }

            }
        }

    }

}

// change password
if (isset($_POST['old_password']) and $_POST['new_password']) {

    if (strlen($_POST['new_password']) <= 6) {
        echo "<span class='text_error'> password number of charachter atleast 6    </span>";
    } else {
        $my_password = $myProfile['password'];if (password_verify($_POST['old_password'], $my_password)) {$database->
                query("UPDATE `user` SET `password`= :new_pass WHERE `id`=:id", [
                'new_pass' => password_hash($_POST['new_password'], PASSWORD_BCRYPT),
                'id' => $my_id,
            ]);
            echo "<span class='text_success'>password changes </span>";} else {
            echo "<span class='text_error'>password is not correct</span>";
        }

    }
}

// add to folloe
if (isset($_POST['follow'])) {

    $artistId = $_POST['artist_id'];
    $select = "SELECT * FROM `follow` WHERE `follower` = '$artistId' AND `following` = '$my_id' ";
    $check = $database->query($select);
    foreach ($check as $checked) {
    }
    if (isset($checked)) {
        $artistId = $_POST['artist_id'];
        $delete = "DELETE FROM `follow` WHERE follower = '$artistId' AND following = '$my_id'";
        $followind = $database->query($delete);

    } else {
        $insert = "INSERT INTO `follow` (`follower`, `following`) VALUES ('$artistId', '$my_id')";
        $inserted = $database->query($insert);
    }
}
