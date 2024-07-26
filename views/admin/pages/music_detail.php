<?php include views("admin/partials/header.php");?>
<?php include views("admin/partials/nav.php");?>



<div class="table_container  ">
    <div class="details">
        <div class="bg_image" style="background-image: url('assets/albem_arts/<?=$music['image']?>');"> </div>
        <div class="img">
            <img src="assets/albem_arts/<?=$music['image']?>" alt="profile_image">
        </div>
        <div class="detail_cont"></div>
        <h1 class="pro_text">music detais</h1>
        <div class="pro_info">
            <h1>Artist: <span> <a href="user_detail?user_id=<?=$music['user_id']?>"><?=$title = $music['artist'];?></a>
                </span></h1>
            <h1>Title: <span> <?=$title = $music['title'];?>
                </span></h1>
            <h1>upload date: <span> <?=$title = $music['date'];?> </span></h1>

            <span class="description">
                <h1 class="pro_text">description</h1>

                <p>
                    <?=$title = $music['description'];?>
                </p>
            </span>
        </div>


    </div>

    <?php include views("admin/partials/footer.php");?>