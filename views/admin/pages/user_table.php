<?php include views("admin/partials/header.php");?>
<?php include views("admin/partials/nav.php");?>





<div class="table_container user_table">

    <header>
        <h1>users table</h1>
    </header>
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
            <?php foreach ($users as $user): ?>

            <tr id="<?=$user['id']?>">
                <td>
                    <div class="contents">
                        <img class="user-img-border-10" src="assets/avatars/<?=$user['image']?>">
                        <span>
                            <a href="user_detail?user_id= <?=$user['id']?>">
                                <?=$user['name']?>
                            </a>
                            <p><?=$user['email']?></p>

                        </span>
                    </div>
                </td>

                <td>
                    <div class="contents">
                        <?php

$usemusic_nums = $database->query('SELECT COUNT(id) FROM music WHERE user_id = :user_id', ['user_id' => $user['id']]);

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
                    <div class="contents">
                        <?=$user['date']?> </div>
                </td>

                <td>
                    <?php if ($user['active'] == 0): ?>
                    <a title="<?=$user['name']?> is Desactive" href="active?desactive=<?=$user['id']?>"
                        class="danger_btn">Deactivate</a>
                    <?php else: ?>
                    <a title="<?=$user['name']?> is Active" href="active?active=<?=$user['id']?>" class="success_btn">
                        Activated
                    </a>
                    <?php endif?>
                </td>

                <td>
                    <a title="delete <?=$user['name']?>" class="danger_btn"
                        href="active?delete=<?=$user['id']?>">delete</a>
                </td>
            </tr>


            <?php endforeach?>

        </tbody>
    </table>
</div>





<?php include views("admin/partials/footer.php");?>