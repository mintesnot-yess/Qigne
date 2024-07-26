 <?php
    $query = "select * from playlist_name where user_id = '$my_id' order by RAND()  ";
    $playlists = $database->query($query); ?>

 <?php foreach ($playlists as $playlist) :
        $playlist_id = $playlist['id'];
    ?>

 <?php endforeach; ?>
 <?php if($playlist):?>
 <div class="filterable_cards">
     <span style="position: absolute;margin: -30px 0 0 0;font-size: 20px;text-transform: capitalize;">
         <?= $playlist['playlist_name'] ?>
         musics</span> </span>
     <?php
        $playlist = $database->query("SELECT * FROM `playlist` WHERE playlist_id = '$playlist_id'")->fetchAll();

        foreach ($playlist as $playlists) :

            $music_id = $playlists['music_id'];

            $query = "select * from music where id = '$music_id'";

            $user_musics = $database->query($query)->fetchAll();
            foreach ($user_musics as $user_music) :
        ?>

     <div onclick="play_up(this)" title="click to open " data-music_sours="<?= $user_music['music'] ?>"
         data-image="<?= $user_music['image'] ?>" data-artist="<?= $user_music['artist'] ?>"
         data-title="<?= $user_music['title'] ?>" data-id="<?= $user_music['id'] ?>" class='card'>
         <img class="music_image_loader" src='assets/albem_arts/<?= $user_music['image'] ?>'>
         <p>
             <?= $user_music['artist'] ?>
             <br>
             <span> <?= $user_music['title'] ?></span>
         </p>
     </div>
     <?php endforeach; ?>
     <?php endforeach; ?>

 </div>
 <?php endif?>