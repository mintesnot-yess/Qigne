<div class="d-flex jc-space-between ai-center mt-10 content_title">
    <span>
        for you
    </span>
</div>

<div class="card_container ">

    <?php

$query = "select * from music   order by RAND()  LIMIT 3  ";
$musics = $database->query($query);

foreach ($musics as $music): ?>


    <button
        style="background-image: linear-gradient(#00000053,#00000053), url('assets/albem_arts/<?=$music['image']?>');"
        class="card">

        <span class="music_btn">


            <i onclick="play_up(this)" title="click to open " data-artistname="<?=$music['artist']?>"
                data-title="<?=$music['title']?>" data-music_sours="<?=$music['music']?>"
                data-image="<?=$music['image']?>" data-artist="<?=$music['artist']?>" data-title="<?=$music['title']?>"
                data-id="<?=$music['id']?>" data-user_id="<?=$music['user_id']?>" class="fa fa-play player_btn"
                aria-hidden="true"></i>
            <p><?=$music['title']?></p>

            <p onclick="artistPage('<?=$music['user_id']?>','<?=$music['artist']?>')" class="artist">
                <?=$music['artist']?></p>

        </span>

    </button>

    <?php endforeach;?>









</div>