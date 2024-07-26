<div class="loading_page"></div>


<div class="container">


    <aside>


        <ul class="un_aside">

            <a href="/" class="logo">
                <img src="assets/logo_1.png" alt="">
                <span><?=$web_title?></span>
            </a>


        </ul>



        <ul>




            <button title="Home" class="side_nav active " onclick="home()">

                <i class="fa fa-home " aria-hidden="true"></i>
                <span>
                    home
                </span>
            </button>

            <button title="search" class="side_nav" value="-" onclick="searching(this.value)">
                <i class="fa fa-search" aria-hidden="true"></i>
                <span>
                    search
                </span>
            </button>



            <button title="Musics" class="side_nav" onclick="all_songs()">
                <i class="fa fa-music" aria-hidden="true"></i>
                <span>
                    musics
                </span>
            </button>


            <?php if (isset($_SESSION["email"])): ?>
            <button title="Like songs" class="side_nav" value="<?php isset($my_id) ? $my_id : ''?>"
                onclick="like_song(this.value)">
                <i class="fa  fa-heart"></i> <span> </i> like song
                </span>
            </button>




        </ul>
        <?php if (isset($followings[0])): ?>

        <ul class="un_aside folloing_cont">
            <?php
foreach ($followings as $following): ?>


            <?php

$followId = $following['follower'];

$followUsers = $database->query("select * from user where id = '$followId'");
?>


            <?php foreach ($followUsers as $followUser): ?>

            <button title="<?=$followUser['name']?>" class="side_nav follow_btn" value="<?=$followUser['id']?>"
                onclick="artistPage(this.value,'<?=$followUser['name']?>')">
                <i>
                    <img src="assets/avatars/<?=$followUser['image']?>" alt="sdsd">

                </i>
                <span>
                    <?=$followUser['name']?>
                </span>
            </button>


            <?php endforeach;?>
            <?php endforeach;?>






        </ul>
        <?php endif;?>
        <?php endif;?>



    </aside>

    <div class="player_controll_container">

        <button onclick="controll_resize()" class="music_cont_resize"> <i class=" fa fa-angle-down"
                aria-hidden="true"></i> </button>

        <div class="player_controll">

            <div class="img">
                <img class="current_music_image" src="" alt="">

            </div>
            <span class="detail">

                <button onclick="artistPage(this.value,this.value)" class="current_music_artist btn w-fit"></button>

                <div class="current_music_title"></div>

            </span>


            <div class="controll">



                <button title="Previous" id="previous_play">
                    <i class="fa-solid fa-backward-step"></i> </button>

                <button title="Play" onclick="play_music()" class="play_pause_btn">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </button>

                <button title="next" id="next_play">
                    <i class="fa-solid fa-forward-step"></i> </button>
            </div>

            <div class="time_slider">
                <input oninput="changeDuration()" class="time_changer" max="100" type="range" value="0">

            </div>

            <div class="volumes">
                <span class="vol_changer">

                    <button class="muted_btn">
                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                    </button>

                    <input oninput="volumeChange(this.value)" class="volume_slider" value="50" type="range" max="100">



                </span>


                <span>
                    <button onclick="add_like_song(this.value)" title="like this song " class="current_music_like_btn">
                        <i class="fa  fa-heart" aria-hidden="true"></i>

                    </button>
                </span>

            </div>

        </div>

    </div>