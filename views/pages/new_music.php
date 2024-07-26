 <div class="d-flex jc-space-between ai-center mt-10 content_title">
     <span>
         new release
     </span>
     <button onclick="all_songs()"><i class="fa fa-angle-right"></i></button>
 </div>
 <div class="music_list_container">
     <?php

$query = "select * from music order by date desc   LIMIT 10 ";
$musics = $database->query($query);

foreach ($musics as $music):
?>
     <div class="music_list">
         <span class="left">
             <button onclick="play_up(this)" title="click to open " data-artistname="<?=$music['artist']?>"
                 data-title="<?=$music['title']?>" data-music_sours="<?=$music['music']?>"
                 data-image="<?=$music['image']?>" data-artist="<?=$music['artist']?>" data-title="<?=$music['title']?>"
                 data-id="<?=$music['id']?>" data-user_id="<?=$music['user_id']?>">
                 <i class="fa fa-play " aria-hidden="true"></i>
             </button>
             <img src="assets/albem_arts/<?=$music['image']?>" alt="">


             <div class="music_detail">
                 <p class="title"><?=$music['title']?></p>

                 <p onclick="artistPage('<?=$music['user_id']?>','<?=$music['artist']?>')" class="artist">
                     <?=$music['artist']?></p>
             </div>
         </span>

         <span>

             <a href="assets/musics/<?=$music['music']?>"
                 download="qignet_music-<?=$music['artist']?>_<?=$music['title']?>">

                 <button> <i class="fa fa-download" aria-hidden="true"></i> </button>
             </a>

             <?php if (isset($_SESSION["email"])): ?>

             <button class="like_btn" value="<?=$music['id']?>" onclick="add_like_song(this.value)">
                 <i class="fa fa-heart" aria-hidden="true"></i>
                 <span class="like_num">

                     <?php $music_id = $music['id'];
$like_songs = $database->query("select count(id) from like_song where  music_id = $music_id");
foreach ($like_songs as $like_song) {
    echo $like_song['count(id)'];
}

?>


                 </span>
             </button>
             <?php endif?>

         </span>
     </div>

     <?php
endforeach;
?>



 </div>