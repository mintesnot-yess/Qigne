<?php include views("admin/partials/header.php") ?>
<?php include views("admin/partials/nav.php"); ?>

<div class="table_container user_table">
 <header>
        <h1>search <?= $_GET['search'] ?></h1>
    </header>
    
                    <?php if ($users[0]) : ?>
                    
                    
                     <table>
        <thead>
            <tr>
                <th>author</th>
                <th>musics</th>
                <th>registered date</th>
                <th> status </th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user) : ?>

                <tr id="<?= $user['id'] ?>">
                    <td>
                        <div class="contents">
                            <img class="user-img-border-10" src="assets/avatars/<?= $user['image'] ?>">
                            <span>
                                <a href="user_detail?user_id= <?= $user['id'] ?>">
                                    <?= $user['name'] ?>
                                </a>
                                <p><?= $user['email'] ?></p>

                            </span>
                        </div>
                    </td>

                    <td>
                        <div class="contents">
                            <?php

                            $usemusic_nums = $database->query('SELECT COUNT(id) FROM music WHERE user_id = :user_id', ['user_id' => $user['id']]);

                            foreach ($usemusic_nums as $music_nums) : ?>
                                <?php if ($music_nums['COUNT(id)'] == 0) : ?>
                                    _
                                <?php else : ?>
                                    <?= $music_nums['COUNT(id)'] . ' tracks'; ?>

                                <?php endif ?>

                            <?php endforeach ?> 
                            </div>
                    </td>
                    <td>
                        <div class="contents">
                            <?= $user['date'] ?> </div>
                    </td>
                    <td>
                        <?php if ($user['active'] == 0) : ?>
                            <a title="<?= $user['name'] ?> is Desactive" href="active?desactive=<?= $user['id'] ?>" class="danger_btn">Desactive</a>
                        <?php else : ?>
                            <a title="<?= $user['name'] ?> is Active" href="active?active=<?= $user['id'] ?>" class="success_btn">
                                Active
                            </a>
                        <?php endif ?>
                    </td>
                    <td>
                        <a title="delete <?= $user['name'] ?>" class="danger_btn" href="active?delete=<?= $user['id'] ?>"">delete</a>
                        </td>
                    </tr>


                <?php endforeach ?>

            </tbody>
        </table>
        
          <?php else: ?>
                            <center>
                                <h5>you search <?= $_GET['search'] ?> Did not match any users </p>
                            </center>
              <?php endif ?>
            <!-------            musics           ------ ------------->

          <?php if ($musics[0]) : ?>         
                    
                   
                   
                    <table>


         <thead>
            
             
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





         </tbody>
     </table>
     
        <?php else : ?>
                            <center>
                                <h5>you search <?= $_GET['search'] ?> Did not match any music artist or title </p>
                            </center>
                        <?php endif ?>

                        </div>
                        
                            <?php include views("admin/partials/footer.php"); ?>
