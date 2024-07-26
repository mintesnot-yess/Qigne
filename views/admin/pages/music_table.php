 <?php include views("admin/partials/header.php");?>
 <?php include views("admin/partials/nav.php");?>






 <div class="table_container user_table">
     <header>
         <h1>music table</h1>
         <h6 class="text-white ps-3"> total <?=$music_num?> musics</h6>
     </header>



     <table>


         <thead>
             <div class="d-flex gap-5 align-center margin-left-10">
                 <h5 class="m-2">order by</h5>
                 <a class="link btn <?php if ($_GET === []) {
    echo 'bsilid-1';
}?>" href="music_table">
                     date
                 </a>

                 <a class="link btn <?php if ($_GET['order_by'] === 'ORDER BY user_id asc') {
    echo 'bsilid-1';
}?>" href="music_table?order_by=ORDER BY user_id asc">
                     users
                 </a>
                 <a class="link btn <?php if ($_GET['order_by'] === 'order by rand()') {
    echo 'bsilid-1';
}?>" href="music_table?order_by=order by rand()">
                     random
                 </a>
             </div>
             <tr>
                 <th>music</th>
                 <th> user </th>
                 <th> uploaded date </th>
             </tr>
         </thead>

         <tbody>

             <?php foreach ($musics as $music): ?>

             <tr id="<?=$music['id']?>">
                 <td>
                     <div class="contents">
                         <img class="user-img" src="assets/albem_arts/<?=$music['image']?>" alt="user1">
                         <span>
                             <a href="music_detail?music_id=<?=$music['id']?> "><?=$music['title']?> </a>
                             <p><?=$music['artist']?></p>
                         </span>
                     </div>
                 </td>


                 <td>
                     <div class="contents">
                         <?php
$users = $database->query('select * from user where id = :id', ['id' => $music['user_id']])->fetchAll();
foreach ($users as $user):
?>
                         <a class="link d-flex gap-5" title="<?=$user['name']?>"
                             href="user_detail?user_id= <?=$music['user_id']?>">
                             <img src="assets/avatars/<?=$user['image']?>" class="user-img" alt="">
                             <span><?=$user['name']?></span>
                         </a>

                         <?php endforeach?>
                     </div>
                 </td>
                 <td>
                     <div class="contents">
                         <?=$music['date']?> </div>
                 </td>
                 <td>
                     <button  onclick="play_up(this)" 
                         data-music_sours="<?=$music['music']?>"
                         data-artistname="<?=$music['artist']?>"
			 data-title="<?=$music['title']?>" 
			 data-image="<?=$music['image']?>" 
			 data-artist="<?=$music['artist']?>"
			 ata-title="<?=$music['title']?>" 
			 data-id="<?=$music['id']?>" class="btn" >
			                  <i class="fa fa-play " aria-hidden="true"></i>
			 </button>
                 </td>
                 <td>
                     <a title='delete "<?=$music['title']?>" music' class="btn"
                         href="active?music_delete=<?=$music['id']?>">
                                          <i class="fa fa-trash " aria-hidden="true"></i>
                     </a>
                 </td>
             </tr>
             <?php endforeach?>




             <?php if (isset($_GET['limit'])): ?>
             <tr>
                 <td class="text-align-center">
                     <a class="link" href="/music_table<?php if (isset($_GET['order_by'])) {
    echo '?order_by=' . $_GET['order_by'];
}?>">
                         show less
                     </a>
                 </td>
             </tr>
             <?php else: ?>
             <tr>
                 <td class="text-align-center">
                     <a class="link" href="music_table?<?php if (isset($_GET['order_by'])) {
    echo 'order_by=' . $_GET['order_by'] . '&' . 'limit ';
} else {
    echo 'limit';
}?>">
                         show <?=$music_num?> music
                     </a>
                 </td>
             </tr>
             <?php endif?>

         </tbody>
     </table>
 </div>





 <?php include views("admin/partials/footer.php");?>
