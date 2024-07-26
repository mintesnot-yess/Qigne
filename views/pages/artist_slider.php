<div class="d-flex jc-space-between ai-center content_title">
    <span>
        artists
    </span>

    <button onclick="all_artists()"> <i class="fa fa-angle-right"></i></button>
</div>

<div class="card_container">
    <?php
$query = "select * from user where active = 1 order by rand() limit 4 ";
$artists = $database->query($query);
foreach ($artists as $artist):
?>
    <button value="<?=$artist['id']?>" onclick="artistPage(this.value,'<?=$artist['name']?>') "
        style="background-image: linear-gradient(#00000053,#00000053), url('assets/avatars/<?=$artist['image']?>');"
        class="card">

        <span>
            <p class="artist"><?=$artist['name']?></p>
        </span>
    </button>

    <?php endforeach;?>

</div>