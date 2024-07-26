<?php
//artist page
if (isset($_GET['artistId'])):

    $artistId = $_GET['artistId'];

    $query = "SELECT * FROM `user` WHERE id = :id";

    $users = $database->query($query, ['id' => $artistId]);

    $query = "SELECT COUNT(following) FROM `follow` WHERE follower = :id";
    $followers = $database->query($query, ['id' => $artistId]);
    foreach ($users as $user) {
    }

    ?>
<div class="artist_page_container">


    <div class="artist_page" style=" background: linear-gradient(transparent, var(--black_50)), url('assets/avatars/<?=$user["image"]?>');
						background-position: center; background-size: cover; background-repeat: no-repeat;">
        <span>
            <h1> <?=$user['name']?></h1>

            <?php if (isset($_SESSION['email'])): ?>


            <?php

    $query = "select * from follow where follower = :id";
    $selected = $database->query($query, ['id' => $artistId]);
    foreach ($selected as $select) {

    }
    if (isset($select['following']) && $select['following'] == $my_id):

    ?>
            <input type="hidden" name="artist_id">

            <button type="submit" value="<?=$artistId?>" onclick="follow(this.value)" name="unfollow">
                <p>
                    <?php foreach ($followers as $follower) {echo $follower['COUNT(following)'] . ' Follower';}?>
                </p>
                <i class="fa fa-user-check" aria-hidden="true"> following</i>

            </button>



            <?php else: ?>

            <button type="submit" value="<?=$artistId?>" onclick="follow(this.value)">

                <p>
                    <?php foreach ($followers as $follower) {echo $follower['COUNT(following)'] . ' Follower';}?>
                </p>


                <i class="fa-solid fa-user-plus"> follow</i>

            </button>


            <?php endif;?>

            <?php endif?>



        </span>







    </div>
    <div class="flex_list_container">
        <h1> </h1>

        <button title="play all song" onclick="musics_sour(<?=$artistId?>)">
            <i class="fa fa-play"> </i>
        </button>

    </div>


    <div class="music_list_container">





        <?php

$query = "select * from music where user_id = :id ";

$user_musics = $database->query($query, ['id' => $artistId]);
foreach ($user_musics as $user_music):
?>

        <div class="music_list">
            <span class="left">
                <button onclick="play_up(this)" title="click to open " data-artistname="<?=$user_music['artist']?>"
                    data-title="<?=$user_music['title']?>" data-music_sours="<?=$user_music['music']?>"
                    data-image="<?=$user_music['image']?>" data-artist="<?=$user_music['artist']?>"
                    data-title="<?=$user_music['title']?>" data-id="<?=$user_music['id']?>"
                    data-user_id="<?=$user_music['user_id']?>">

                    <i class="fa fa-play " aria-hidden="true"></i>
                </button>
                <img src="assets/albem_arts/<?=$user_music['image']?>" alt="">


                <div class="music_detail">
                    <p class="title"><?=$user_music['title']?></p>
                    <p class="artist"><?=$user_music['artist']?> </p>
                </div>
            </span>

            <span>
                <button>
                    <i class="fa fa-download" aria-hidden="true"></i>
                </button>
                <?php if (isset($_SESSION["email"])): ?>

                <button value="<?=$user_music['id']?>" onclick="add_like_song(this.value)">
                    <i class="fa  fa-heart" aria-hidden="true"></i><span
                        style="font-size: 10px;position: absolute;margin: -10px 5px;">120</span>
                </button>

                <?php endif?>
            </span>
        </div>
        <?php endforeach?>

    </div>

</div>
<!-------------------->



<?php endif?>