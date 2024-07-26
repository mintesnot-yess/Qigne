<?php

$my_id = $myProfile['id'];

$musics = $database->query("select * from music where user_id = '$my_id'");
$musics_counts = $database->query("SELECT COUNT(id) from music where user_id = '$my_id'");

$followers = $database->query("SELECT COUNT(following) FROM `follow` WHERE follower = :id", ['id' => $my_id]);

?>

<div class="user_page_container">



    <div class="user_page" style="

    background: linear-gradient(transparent, var(--black_50)),
    url('assets/avatars/<?=$myProfile["image"]?>');
                ; background-position: center;
                background-size: cover;
                background-repeat: no-repeat;">

        <span>
            <h1> <?=$myProfile['name']?></h1>


            <button onclick="profile_editor()">

                <i class="fas fa-user-edit"> edit</i>

            </button>

        </span>

    </div>


    <div class="d-flex jc-space-between ai-center content_title">
        <span>
            <i class="fa fa-music" aria-hidden="true"></i>
            <?php foreach ($musics_counts as $musics_count) {
    echo $musics_count['COUNT(id)'];

}?> Songs

        </span>

        <span>
            <i class="fa fa-user" aria-hidden="true"> </i>
            <?php foreach ($followers as $follower) {echo $follower['COUNT(following)'];}?> followers
        </span>

    </div>




    <div class="music_list_container">




        <?php foreach ($musics as $music):
    $id = $music['id'];
    ?>

        <div class="music_list">
            <span class="left">
                <button onclick="play_up(this)" title="Open " data-artistname="<?=$music['artist']?>"
                    data-title="<?=$music['title']?>" data-music_sours="<?=$music['music']?>"
                    data-image="<?=$music['image']?>" data-artist="<?=$music['artist']?>"
                    data-title="<?=$music['title']?>" data-id="<?=$music['id']?>">
                    <i class="fa fa-play " aria-hidden="true"></i>
                </button>
                <img src="assets/albem_arts/<?=$music['image']?>" alt="">
                <div class="music_detail">
                    <p class="title"><?=$music['title']?></p>
                    <p class="artist"><?=$music['artist']?> </p>
                </div>
            </span>

            <span>

                <button onclick="music_editor(this)" data-music_artist="<?=$music['artist']?>"
                    data-music_image="<?=$music['image']?>" data-music_title="<?=$music['title']?>"
                    data-music_id="<?=$music['id']?>">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                </button>

                <button onclick="delete_music(this)" data-music_name="<?=$music['artist']?>"
                    data-music_title="<?=$music['title']?>" data-music_image="<?=$music['image']?>"
                    data-music_id="<?=$music['id']?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </span>
        </div>



        <?php endforeach?>





    </div>





    <div class="music_editor_container">


        <div class="music_editor">

            <form method="post" enctype="multipart/form-data" action="update">

                <label class="profile_pics" for="albem_pic">
                    <img src="" class="edit_music_image">
                    <span>
                        <p> <i class="fa fa-camera" aria-hidden="true"> change</i>
                        </p>
                    </span>

                    <input name="albem_art" oninput="checked_albem_art(this)" id="albem_pic" type="file">
                </label>

                <label for="artist">
                    <input oninput="if(this.value == null || this.value == ''){this.style.border = 'solid 1px red'}"
                        type="text" name="artist" placeholder="artist name" class="edit_artist_name" value="">
                    <input type="hidden" name="music_id" placeholder="user name" class="edit_music_id" value="">
                    <input type="hidden" name="pre_albem_art" placeholder="user name" class="edit_pre_albem_art"
                        value="">
                </label>
                <label for="title">
                    <input oninput="if(this.value == null || this.value == ''){this.style.border = 'solid 1px red'}"
                        type="text" name="title" placeholder="title" class="edit_music_title" value="">
                </label>
                <div class="btn">
                    <button onclick="close_music_editor()" type="button"> Cancel</button>
                    <button name="music_update" type="submit"> Applay</button>
                </div>
            </form>
        </div>
    </div>



    <!------  music delete dialoag      ------------>

    <div style="display: none;" class="delete_container">
        <div>
            <span> Are you sure you want to delete</span>

            <div class="delete_music_detail">
                <img class="delete_music_image" id="artist_images" src='assets/albem_arts/<?=$music['image']?>'>
                <h1 class="delete_music_name"></h1>
                <h1 style="font-size: 16px;" class="delete_music_title"></h1>

            </div>

            <form method="post" action="update">
                <button onclick="close_delete_dialog()" type="button"> cancel</button>
                <input value="" name="delete_music_id" class="delete_music_id" type="hidden">
                <button name="music_delete_btn" type="submit"> delete</button>
            </form>
        </div>
    </div>



</div>