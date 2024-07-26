<?php if (isset($followings[0])): ?>





<div class="all_music_page" style="
				 background: linear-gradient(transparent, var(--black_50)),

				 url('assets/avatars/<?=$myProfile["image"]?>');
				; background-position: center;
				background-size: cover;

				background-repeat: no-repeat;">


    <span>
        <h1> like songs </h1>
        <button>
            <i class="fa fa-play"> </i>
        </button>

    </span>

</div>

<div class="card_container">
    <?php foreach ($followings as $following): ?>
    <?php
$followId = $following['follower'];
$follow_song = $database->query("select * from music where user_id = '$followId'")->fetchAll();

foreach ($follow_song as $follow_songs):

?>



    <button
        style="background-image: linear-gradient(#00000053,#00000053), url('assets/albem_arts/<?=$follow_songs['image']?>');"
        class="card">

        <span class="music_btn">


            <i onclick="play_up(this)" title="click to open" data-artistname="<?=$follow_songs['artist']?>"
                data-title="<?=$follow_songs['title']?>" data-music_sours="<?=$follow_songs['music']?>"
                data-image="<?=$follow_songs['image']?>" data-artist="<?=$follow_songs['artist']?>"
                data-title="<?=$follow_songs['title']?>" data-id="<?=$follow_songs['id']?>"
                data-user_id="<?=$follow_songs['user_id']?>" class="fa fa-play player_btn" aria-hidden="true"></i>


            <p><?=$follow_songs['title']?></p>


            <p onclick="artistPage('<?=$follow_songs['user_id']?>','<?=$follow_songs['artist']?>')" class="artist">

                <?=$follow_songs['artist']?></p>
        </span>
        </span>
    </button>


    <?php endforeach;?>
    <?php endforeach;?>



</div>
<?php endif;?>