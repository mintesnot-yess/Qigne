<?php
//all song page
if (isset($_GET['all_songs'])):

    echo $limt = $_GET['all_songs'];

    if ($limit == 5) {
        $query = "select * from  music  order by rand() LIMIT  $limt";

    } else {
        $query = "select * from  music order by date desc LIMIT $limt";

    }

    $musics = $database->query($query)->fetchAll();
    ?>


<div>

    <div class="all_music_page_container">


        <div class="all_music_page" style=" background: linear-gradient(transparent, var(--black_50)),
				url('assets/albem_arts/<?=$musics[0]['image']?>');
																														; background-position: center;
																														background-size: cover;

																														background-repeat: no-repeat;">

            <span>
                <h1> Latest </h1>

                <button onclick="play_up(this)" title="click to open " data-artistname="<?=$musics[0]['artist']?>"
                    data-title="<?=$musics[0]['title']?>" data-music_sours="<?=$musics[0]['music']?>"
                    data-image="<?=$musics[0]['image']?>" data-artist="<?=$musics[0]['artist']?>"
                    data-title="<?=$musics[0]['title']?>" data-id="<?=$musics[0]['id']?>">
                    <i class="fa fa-play"> </i> </i>
                </button>
            </span>

        </div>


        <div class="music_list_container">
            <div class="d-flex jc-space-between ai-center content_title">
                <span>
                </span>

                <button>

                    <i class="fa fa-list-ul" aria-hidden="true"></i>

                </button>
            </div>
            <?php
    foreach ($musics as $music):
    ?>

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
                        <p class="title"><?=$music['title']?></p>


                        <p onclick="artistPage('<?=$music['user_id']?>','<?=$music['artist']?>')" class="artist">

                            <?=$music['artist']?> </p>
                    </div>
                </span>

                <span>
                    <button>
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </button>

                    <?php if (isset($_SESSION["email"])): ?>

                    <button value="<?=$music['id']?>" onclick="add_like_song(this.value)">
                        <i class="fa  fa-heart" aria-hidden="true"></i>



                    </button>
                    <?php endif;?>


                </span>
            </div>

            <?php endforeach?>

            <button onclick="all_songs_limit()" class="show_more">
                show more
                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </button>







        </div>


    </div>





    <?php endif?>