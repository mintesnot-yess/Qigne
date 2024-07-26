<?php if (isset($followings[0])): ?>


<div class="d-flex jc-space-between ai-center content_title">


    <span>
        you favorite songs
    </span>

    <button><i class="fa fa-angle-right"></i></button>
</div>

<div class="card_container">
    <?php foreach ($followings as $following): ?>
    <?php
$followId = $following['follower'];
$follow_song = $database->query("select * from music where user_id = '$followId' order by rand()  LIMIT 1")->fetchAll();

foreach ($follow_song as $follow_songs):

?>




    <button
        style="background-image: linear-gradient(#00000053,#00000053), url('assets/albem_arts/<?=$follow_songs['image']?>');"
        class="card">

        <span class="music_btn">


            <i onclick="play_up(this)" title="click to open " data-artistname="<?=$follow_songs['artist']?>"
                data-title="<?=$follow_songs['title']?>" data-music_sours="<?=$follow_songs['music']?>"
                data-image="<?=$follow_songs['image']?>" data-artist="<?=$follow_songs['artist']?>"
                data-title="<?=$follow_songs['title']?>" data-user_id="<?=$follow_songs['user_id']?>"
                data-id="<?=$follow_songs['id']?>" class="fa fa-play player_btn" aria-hidden="true"></i>


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