<?php include "partials/header.php";?>
<?php include "partials/nav.php";?>



<div class="cards_contaier">


    <a href="/user_table" class="card user">
        <i class="fa fa-users" aria-hidden="true"></i>
        <div class="card_text">
            <h1>user</h1>
            <small><?php
foreach ($user_num as $user_nums) {
    echo $user_nums['count(id)'];
}
?> user</small>
        </div>
    </a>

    <a href="/music_table" class="card musics">


        <i class="fa fa-music" aria-hidden="true"></i>

        <div class="card_text">
            <h1>Musics</h1>
            <small><?php
foreach ($music_num as $music_nums) {
    echo $music_nums['count(id)'];
}
?> Musics</small>
        </div>
    </a>


    <?php if ($admin['admin'] === 1): ?>
    <a href="/admin_profile" class="card admins">
        <i class="fa fa-user-tie" aria-hidden="true"></i>
        <div class="card_text">
            <h1>admin</h1>
            <small><?php foreach ($all_admins as $all_admin) {
    echo $all_admin['count(id)'];
}
?> admin</small>
        </div>
    </a>



    <?php endif?>





</div>

<div class="cards_contaier">

    <div class="table_container user_table">

        <header>
            <h1>New users </h1>
        </header>

        <table>
            <thead>
                <tr>
                    <th>author</th>
                    <th>musics</th>

                    <th> status </th>
                </tr>
            </thead>

            <tbody>




                <?php foreach ($new_artists as $new_artist): ?>
                <tr id="<?=$new_artist['id']?> ">
                    <td>
                        <div class=" contents ">
                            <img class=" user-img-border-10 " src="assets/avatars/<?=$new_artist['image']?>">
                            <span>
                                <a href="user_detail?user_id= <?=$new_artist['id']?> ">
                                    <?=$new_artist['name']?></a>
                                <p><?=$new_artist['email']?></p>

                            </span>
                        </div>
                    </td>

                    <td>
                        <div class=" contents ">
                            <?php $usemusic_nums = $database->query('SELECT COUNT(id) FROM music WHERE user_id = :user_id', ['user_id' => $new_artist['id']]);
foreach ($usemusic_nums as $music_nums): ?>
                            <?php if ($music_nums['COUNT(id)'] == 0): ?>
                            _
                            <?php else: ?>
                            <?=$music_nums['COUNT(id)'] . ' tracks';?>
                            <?php endif?>
                            <?php endforeach?>
                        </div>
                    </td>

                    <td>
                        <?php if ($new_artist['active'] == 0): ?>
                        <a title="<?=$new_artist['name']?> is Desactive" href="active?desactive=<?=$new_artist['id']?>"
                            class="danger_btn">Deactivate</a>
                        <?php else: ?>
                        <a title="<?=$new_artist['name']?> is Active" href="active?active=<?=$new_artist['id']?>"
                            class="success_btn">
                            Activated
                        </a>
                        <?php endif?>
                    </td>

                </tr>

                <?php endforeach?>

                <td>
                    <a class="link" href="user_table">
                        show more

                    </a>

                </td>
            </tbody>
        </table>
    </div>


    <div class="table_container user_table">

        <header>
            <h1>New Music </h1>
        </header>

        <table>

            <thead>
                <tr>
                    <th>music</th>
                    <th>user</th>
                    <th> date </th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>


            <tbody>



                <?php foreach ($new_musics as $music): ?>

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
                            </a>

                            <?php endforeach?>
                        </div>
                    </td>
                    <td>
                        <div class="contents">
                            <?=$music['date']?> </div>
                    </td>

                    <td>
                        <button onclick="play_up(this)" data-music_sours="<?=$music['music']?>"
                            data-artistname="<?=$music['artist']?>" data-title="<?=$music['title']?>"
                            data-image="<?=$music['image']?>" data-artist="<?=$music['artist']?>"
                            ata-title="<?=$music['title']?>" data-id="<?=$music['id']?>" class="btn"> <i
                                class="fa fa-play " aria-hidden="true"></i>
                        </button>
                    </td>


                </tr>
                <?php endforeach?>









                <td>


                    <a class="link" href="music_table">
                        show more

                    </a>

                </td>






            </tbody>




        </table>
    </div>



</div>




</div>


</main>


<?php include "partials/footer.php";?>