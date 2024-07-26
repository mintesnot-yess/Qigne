<?php
//all song page
if (isset($_GET['all_artists'])): ?>

<div class="d-flex jc-space-between ai-center content_title">
    <span>
        Artists </span>

    <button value="-" onclick="searching(this.value)">

        <i class="fa fa-search" aria-hidden="true"></i> </button>
</div>

<div class="card_container">
    <?php
$query = "select * from user where active = 1 ";
$artists = $database->query($query);
foreach ($artists as $artist):
?>
    <button value="<?=$artist['id']?>" onclick="artistPage(this.value,'<?=$artist['name']?>') "
        style="background-image: linear-gradient(#00000053,#00000053), url('assets/avatars/<?=$artist['image']?>');"
        class="card">

        <span> <?=$artist['name']?>
        </span>
    </button>

    <?php endforeach;?>



</div>


<?php endif?>