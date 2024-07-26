<?php

//search page
if (isset($_GET['search'])):

    $search = $_GET['search'];
    $artists = $database->query("SELECT * FROM `user` WHERE `name` REGEXP  :id and `active` = '1'", ['id' => $search])->fetchAll();
    $musics = $database->query("SELECT * FROM music WHERE `artist` REGEXP  :id or `title` REGEXP :id", ['id' => $search]);

    ?>

<div class="searching_page_container">
    <div class="searching_page_content">


        <div class="d-flex jc-space-between ai-center content_title">
            <span>
                <?=$search?> search result
            </span>

        </div>

        <?php if ($artists): ?>


        <div class="card_container " style="margin:20px 0 0 0;">
            <?php foreach ($artists as $artist): ?>

            <?php if ($artist['id'] == $my_id && $artist[0] == false): ?>

            <?php else: ?>



            <button value="<?=$artist['id']?>" onclick="artistPage(this.value,'<?=$artist['name']?>')"
                style="background-image: linear-gradient(#00000053,#00000053), url('assets/avatars/<?=$artist['image']?>');flex:1 200px; "
                class="card ">
                <span> <?=$artist['name']?> </span>
            </button>

            <?php endif;?>
            <?php endforeach;?>
            <?php endif?>


            <?php if ($musics): ?>
            <div class="music_list_container">
                <?php foreach ($musics as $music): ?>

                <div class="music_list">
                    <span class="left">
                        <button onclick="play_up(this)" title="click to open " data-artistname="<?=$music['artist']?>"
                            data-title="<?=$music['title']?>" data-music_sours="<?=$music['music']?>"
                            data-image="<?=$music['image']?>" data-artist="<?=$music['artist']?>"
                            data-title="<?=$music['title']?>" data-id="<?=$music['id']?>"
                            data-user_id="<?=$music['user_id']?>">
                            <i class="fa fa-play " aria-hidden="true"></i>
                        </button>
                        <img src='assets/albem_arts/<?=$music['image']?>'>


                        <div class="music_detail">
                            <p class="title"> <?=$music['title']?></p>
                            <p onclick="artistPage('<?=$music['user_id']?>','<?=$music['artist']?>')" class="artist">
                                <?=$music['artist']?> </p>
                        </div>
                    </span>

                    <span>
                        <button>
                            <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                        <button>
                            <i class="fa  fa-heart" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
                <?php endforeach?>

            </div>

            <div class="mb-3"></div>


            <?php endif?>

        </div>
    </div>
</div>
<!-------------------->

<?php endif?>