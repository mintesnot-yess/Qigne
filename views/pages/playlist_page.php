<?php
//playlist page
if (isset($_GET['playlist_id'])) : ?>
    <?php
    $playlistId = $_GET['playlist_id'];

    $query = "SELECT * FROM `playlist_name` WHERE id = :id";

    $playlist_name = $database->query($query, ['id' => $playlistId]);

    foreach ($playlist_name as $playlist_names) {
    }

    $playlist = $database->query("SELECT * FROM `playlist` WHERE playlist_id = :id", ['id' => $playlistId])->fetchAll();

    ?>

    <div class="aritst_profile_container">

        <div class="artist_profile_container" style=" height:200px; background:linear-gradient(to right,var(--backgroundColor),silver,transparent);">
            <div style="margin: auto; font-size:40px; text-transform: capitalize;">
                <h1 style="-webkit-text-stroke: 1px black;color: transparent;">
                    <?= $playlist_names['playlist_name'] ?></h1>
            </div>
        </div>

        <button name="delete_playlist" onclick="delete_playlist(this.value)" value="<?= $playlistId ?>" style="background-color: #e0e0e0;" title="delete this play list" class="playbtn "> <img class="cont_img" style="width: 40px;" src="../assets/ControlersIcon/trash-can.svg" alt="">
        </button>

        <div class="artist_playlist_container">

            <p>
                <?php
                $query = "select count(music_id) from playlist where playlist_id = :id";
                $music_counter = $database->query($query, ['id' => $playlistId]);

                foreach ($music_counter as $counter) {
                    echo $musicCount =  $counter['count(music_id)'];
                }
                ?> Songs</p>

            <?php
            foreach ($playlist as $playlists) :

                $music_id = $playlists['music_id'];

                $query = "select * from music where id = :id";

                $user_musics = $database->query($query, ['id' => $music_id])->fetchAll();

                foreach ($user_musics as $user_music) :
            ?>

                    <li class="play_list">
                        <div class="song_contain">
                            <img src='assets/albem_arts/<?= $user_music['image'] ?>'>
                            <div class="song_detail">
                                <span class="artist_name"> <?= $user_music['artist'] ?> </span>
                                <span class="song_name"><?= $user_music['title'] ?></span>
                            </div>
                        </div>

                        <div class="options">
                            <button style="background-color: #fff;opacity: 1;" onclick="play_up(this)" title="open " data-music_sours="<?= $user_music['music'] ?>" data-image="<?= $user_music['image'] ?>" data-artist="<?= $user_music['artist'] ?>" data-title="<?= $user_music['title'] ?>">
                                <img class="cont_img" style="opacity: 1;" src="/assets/ControlersIcon/play-svgrepo-com.svg" alt=""></button>

                            <input type="hidden" id="delete_playlist_id" value="<?= $playlist_names['id'] ?>" name="play_list_id">
                            <button name="remove_play_list" type="button" style="background-color: #fff;opacity: 1;" value="<?= $user_music['id'] ?>" onclick="delete_playlist_music(this.value)" title="remove from <?= $playlist_names['playlist_name'] ?> playlist">
                                <img class="cont_img" style="opacity: 1;" src="/assets/ControlersIcon/xmark.svg" alt=""></button>

                        </div>
                    </li>

                <?php endforeach ?>
            <?php endforeach ?>


        </div>
    </div>
<?php endif ?>