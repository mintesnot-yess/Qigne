<?php include views("admin/partials/header.php");?>
<?php include views("admin/partials/nav.php");?>



<div class="table_container  ">
    <div class="details">
        <div class="bg_image" style="background-image: url('assets/avatars/<?=$artist['image']?>');"> </div>
        <div class="img">
            <img src="assets/avatars/<?=$artist['image']?>" alt="profile_image">
        </div>
        <div class="detail_cont"></div>
        <h1 class="pro_text">profile detais</h1>
        <div class="pro_info">
            <h1>name: <span> <?=$artist['name']?>
                </span></h1>
            <h1>email: <span> <?=$artist['email']?>
                </span></h1>
            <h1>registered date: <span><?=$artist['date']?></span></h1>
            <h1>total tracks: <span> <?php

$usemusic_nums = $database->query('SELECT COUNT(id) FROM music WHERE user_id = :user_id', ['user_id' => $artist['id']]);

foreach ($usemusic_nums as $music_nums): ?>
                    <?php if ($music_nums['COUNT(id)'] == 0): ?>

                    <?php else: ?>
                    <?=$music_nums['COUNT(id)'] . ' Tracks';?>

                    <?php endif?>

                    <?php endforeach?></span></h1>
        </div>
        <span class="description">
            <h1 class="pro_text">description</h1>

            <p>
                <?=$artist['description']?>
            </p>
        </span>
    </div>

    <div class="table_container user_table">
        <table>
            <header>
                <h3><?=$artist['name']?> music table</h3>
            </header>
            <thead>

                <tr>
                    <th>music</th>
                    <th>uploaded date</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($musics as $music): ?>

                <tr>
                    <td>
                        <div class="contents">
                            <img class="user-img" src="assets/albem_arts/<?=$music['image']?>" alt="user1"> <span>
                                <a href="music_detail?music_id=<?=$music['id']?> ">
                                    <?=$music['title']?>

                                </a>
                                <p>
                                    <?=$music['artist']?>

                                </p>
                            </span>
                        </div>
                    </td>


                    <td>
                        <div class="contents">
                            <?=$music['date']?>
                        </div>
                    </td>
                    <td>
                        <button onclick="play_up(this)" data-music_sours="<?=$music['music']?>"
                            data-artistname="<?=$music['artist']?>" data-title="<?=$music['title']?>"
                            data-image="<?=$music['image']?>" data-artist="<?=$music['artist']?>"
                            ata-title="<?=$music['title']?>" data-id="<?=$music['id']?>" class="btn" href="">
                            <i class="fa fa-play"></i>
                        </button>
                    </td>
                    <td>
                        <a title="delete this music" class="link btn" href="active?music_delete=<?=$music['id']?>">

                            <i class="fa fa-trash"></i>

                        </a>
                    </td>
                </tr>
                <?php endforeach?>

            </tbody>
        </table>

    </div>
</div>

<?php include views("admin/partials/footer.php");?>