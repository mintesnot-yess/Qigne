<?php

//like song page
if (isset($_GET['like_song'])):

    $playlist = $database->query("SELECT * FROM `like_song` WHERE user_id = :id", ['id' => $my_id])->fetchAll();

    ?>





<div class="all_music_page_container">


    <div class="all_music_page" style="
									 background: linear-gradient(transparent, var(--black_50)),

									 url('assets/avatars/<?=$myProfile["image"]?>');
									; background-position: center;
									background-size: cover;

									background-repeat: no-repeat;">


        <span>
            <h1> like songs </h1>

            <button onclick="all_songs()" title="add music">
                <i class="fs-1 fa fa-plus" aria-hidden="true"></i>
            </button>


        </span>

    </div>


    <div class="music_list_container">
        <div class="d-flex jc-space-between ai-center content_title">
            <span>
            </span>


        </div>
        <?php
    foreach ($playlist as $playlists):
        $music_id = $playlists['music_id'];

        $query = "select * from music where id = :id";

        $user_musics = $database->query($query, ['id' => $music_id])->fetchAll();
        foreach ($user_musics as $user_music):
        ?>

        <div class="music_list">
            <span class="left">
                <button onclick="play_up(this)" title="click to open " data-artistname="<?=$user_music['artist']?>"
                    data-title="<?=$user_music['title']?>" data-music_sours="<?=$user_music['music']?>"
                    data-image="<?=$user_music['image']?>" data-artist="<?=$user_music['artist']?>"
                    data-title="<?=$user_music['title']?>" data-id="<?=$user_music['id']?>"
                    duser_musicata-user_id="<?=$user_music['user_id']?>">
                    <i class="fa fa-play " aria-hidden="true"></i>
                </button>
                <img src='assets/albem_arts/<?=$user_music['image']?>'>


                <div class="music_detail">
                    <p class="title"><?=$user_music['title']?></p>
                    <p onclick="artistPage('<?=$user_music['user_id']?>','<?=$user_music['artist']?>')" class="artist">
                        <?=$user_music['artist']?> </p>
                </div>
            </span>

            <span>
                <button>
                    <i class="fa fa-download" aria-hidden="true"></i>
                </button>
                <button onclick="remove_like_song(<?=$user_music['id']?>),<?=$my_id?> ">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </span>
        </div>

        <?php endforeach?>
        <?php endforeach?>








    </div>


</div>

<?php endif?>